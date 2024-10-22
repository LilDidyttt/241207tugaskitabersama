<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . '../vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder|CI_DB_mysqli_driver $db
 * @property CI_Input $input
 * @property Siswa_Model $Siswa_Model
 * @property CI_Upload $upload
 * @property CI_Session $session
 */
class SiswaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_Model'); // Load model Siswa_Model
        $this->load->library('upload');    // Load library upload
        $this->load->library('session');   // Load session
    }

    public function tambah()
    {
        $this->load->view('admin/siswa/tambah_siswa');
    }

    public function store()
    {
        // Konfigurasi upload
        $config = [
            'upload_path'   => './assets/uploads/',     // Direktori upload
            'allowed_types' => 'jpg|jpeg|png|gif',      // Jenis file yang diizinkan
            'max_size'      => 4000                    // Ukuran maksimum file 4MB
        ];

        $this->upload->initialize($config);  // Inisialisasi konfigurasi upload

        // Proses upload file
        if ($this->upload->do_upload('foto')) {
            $upload_data = $this->upload->data(); // Ambil data file yang di-upload

            // Data siswa yang akan disimpan
            $data = [
                'no_daftar'    => $this->input->post('no_daftar'),
                'nisn'         => $this->input->post('nisn'),
                'nama'         => $this->input->post('nama'),
                'tgl_lahir'    => $this->input->post('tgl_lahir'),
                'jk'           => $this->input->post('jk'),
                'alamat'       => $this->input->post('alamat'),
                'sekolah_asal' => $this->input->post('sekolah_asal'),
                'nope'         => $this->input->post('nope'),
                'email'        => $this->input->post('email'),
                'foto'         => $upload_data['file_name']
            ];

            // Simpan data ke database
            if ($this->Siswa_Model->insert($data)) {
                $this->session->set_flashdata('success', 'Data siswa berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Data siswa gagal ditambahkan.');
            }

            // Redirect ke halaman daftar siswa
            redirect('/');
        } else {
            // Jika gagal upload, tampilkan pesan error
            $this->session->set_flashdata('error', $this->upload->display_errors());

            // Redirect kembali ke form tambah siswa
            redirect('admin/siswa/tambah');
        }
    }

    // Delete
    public function delete($no_daftar)
    {
        // Cek apakah siswa dengan no_daftar tersebut ada
        $siswa = $this->Siswa_Model->getByNoDaftar($no_daftar);

        if ($siswa) {
            // Hapus foto dari folder jika ada
            if ($siswa['foto']) {
                $fotoPath = './assets/uploads/' . $siswa['foto']; // Path foto
                if (file_exists($fotoPath)) {
                    unlink($fotoPath); // Hapus file foto
                }
            }

            // Hapus data siswa
            $result = $this->Siswa_Model->deleteByNoDaftar($no_daftar);
            $this->session->set_flashdata('success', 'Data siswa berhasil dihapus.');
        } else {
            // Jika siswa tidak ditemukan
            $this->session->set_flashdata('error', 'Data siswa tidak ditemukan.');
        }

        // Redirect ke halaman daftar siswa
        redirect('/');
    }


    // Edit
    public function edit($no_daftar)
    {
        // Fetch the student data based on 'no_daftar'
        $data['siswa'] = $this->Siswa_Model->getByNoDaftar($no_daftar);

        if (!$data['siswa']) {
            // Redirect if no student found
            $this->session->set_flashdata('error', 'Data siswa tidak ditemukan.');
            redirect('admin/siswa');
        } else {
            // Load the edit view with the student data
            $this->load->view('admin/siswa/edit_siswa', $data);
        }
    }

    public function update($no_daftar)
    {
        // Configure file upload if a new file is being uploaded
        $config = [
            'upload_path' => './assets/uploads/',
            'allowed_types' => 'jpg|jpeg|png|gif',
            'max_size' => 4000
        ];

        $this->upload->initialize($config);

        $data = [
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'sekolah_asal' => $this->input->post('sekolah_asal'),
            'nope' => $this->input->post('nope'),
            'email' => $this->input->post('email')
        ];

        if ($this->upload->do_upload('foto')) {
            // If a new photo is uploaded, add it to the update data
            $upload_data = $this->upload->data();
            $data['foto'] = $upload_data['file_name'];
        }

        // Update student record
        if ($this->Siswa_Model->update($no_daftar, $data)) {
            $this->session->set_flashdata('success', 'Data siswa berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate data siswa.');
        }

        redirect('/');
    }

    public function cetak_pdf()
    {
        $this->load->library('dompdf_gen'); // Load library dompdf

        $result = $this->Siswa_Model->get_siswa();
        $data['siswa'] = $result[0];
        $data['total_siswa'] = $result[1];
        $this->load->view('laporan_pdf', $data); // Panggil view untuk PDF

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render(); // Render PDF
        $this->dompdf->stream("Laporan_siswa_ppdb.pdf", array("Attachment" => 0)); // Tampilkan PDF
    }

    public function cetak_excel()
    {
        // Ambil data siswa dari model
        $result = $this->Siswa_Model->get_siswa();
        $data['siswa'] = $result[0];
        $data['total_siswa'] = $result[1];

        // Buat objek Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set judul untuk worksheet
        $sheet->setTitle('Data Siswa');

        // Set header kolom
        $headers = ['No', 'NISN', 'Nama', 'Jenis Kelamin', 'Alamat', 'Sekolah Asal'];
        $sheet->fromArray($headers, NULL, 'A1');

        // Mengatur gaya header
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['argb' => 'FFFFFFFF'], // Warna font putih
                'size' => 12,
                'name' => 'Arial'
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                'startColor' => ['argb' => 'FF0070C0'], // Warna latar belakang biru
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ]
        ];

        // Terapkan gaya ke header
        $sheet->getStyle('A1:F1')->applyFromArray($headerStyle);

        // Mengatur lebar kolom agar pas
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(15);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(15);
        $sheet->getColumnDimension('E')->setWidth(30);
        $sheet->getColumnDimension('F')->setWidth(20);

        // Mengisi data siswa
        $row = 2; // Mulai dari baris ke-2
        foreach ($data['siswa'] as $s) {
            $sheet->setCellValue('A' . $row, $row - 1); // Nomor urut
            $sheet->setCellValue('B' . $row, $s['nisn']);
            $sheet->setCellValue('C' . $row, $s['nama']);
            $sheet->setCellValue('D' . $row, $s['jk']);
            $sheet->setCellValue('E' . $row, $s['alamat']);
            $sheet->setCellValue('F' . $row, $s['sekolah_asal']);

            // Format baris data
            $sheet->getStyle('A' . $row . ':F' . $row)->applyFromArray([
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                ]
            ]);

            $row++;
        }

        // Set header untuk download file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="data_siswa.xlsx"');
        header('Cache-Control: max-age=0');

        // Buat writer dan simpan
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit; // Menghentikan eksekusi setelah mengirim file
    }


    public function detail($no_daftar)
    {
        // Ambil data siswa berdasarkan no_daftar
        $data['siswa'] = $this->Siswa_Model->getByNoDaftar($no_daftar);

        // Jika siswa tidak ditemukan, redirect dengan pesan error
        if (!$data['siswa']) {
            $this->session->set_flashdata('error', 'Data siswa tidak ditemukan.');
            redirect('siswa');
        } else {
            // Load view cetak_siswa.php dengan data siswa
            $this->load->view('detail', $data);
        }
    }
}
