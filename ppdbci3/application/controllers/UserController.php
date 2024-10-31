<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder|CI_DB_mysqli_driver $db
 * @property CI_Input $input
 * @property Siswa_Model $Siswa_Model
 * @property User_Model $User_Model
 * @property CI_Upload $upload
 * @property CI_Session $session
 */

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Model'); // Load model Siswa_Model
        $this->load->library('upload');    // Load library upload
        $this->load->library('form_validation');
        $this->load->library('session');   // Load session
    }

    public function daftar_petugas()
    {
        if ($this->session->userdata('level') != "admin") {
            redirect('/');
        }
        $this->load->view('admin/petugas/daftar-petugas');
    }

    public function addNewPetugas()
    {
        // Aturan validasi
        $this->form_validation->set_rules('nama', 'Username', 'required');
        $this->form_validation->set_rules('username', 'Email', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('konfir-password', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            // Set error ke dalam flashdata
            $this->session->set_flashdata('error', validation_errors());

            // Redirect kembali ke halaman register
            redirect('admin/daftarPetugas');
        } else {
            // Hashing password sebelum disimpan
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            // Data untuk disimpan
            $data = [
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'password' => $password
            ];

            // Panggil fungsi register dari model
            $this->User_Model->insert_petugas($data);

            // Set pesan sukses
            $this->session->set_flashdata('success', 'Registrasi Petugas Berhasil!');

            redirect('/');
        }
    }

    public function check_username_exists($username)
    {
        if ($this->User_Model->check_username_exists($username)) {
            $this->form_validation->set_message('check_username_exists', 'username sudah digunakan.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    // Edit
    public function editPetugas($id_user)
    {
        // Fetch the student data based on 'no_daftar'
        $data['petugas'] = $this->User_Model->getPetugasByID($id_user);

        if (!$data['petugas']) {
            // Redirect if no student found
            $this->session->set_flashdata('error', 'Data Petugas Tidak Ditemukan.');
            redirect('/');
        } else {
            // Load the edit view with the student data
            $this->load->view('admin/petugas/edit_petugas', $data);
        }
    }

    public function UpdatePetugas($id)
    {
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            // Set error ke dalam flashdata
            $this->session->set_flashdata('error', validation_errors());

            // Redirect kembali ke halaman register
            redirect('UserController/EditPetugas/' . $id);
        } else {

            // Ambil data dari form
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $konfirPassword = $this->input->post('konfir-password');

            // Siapkan array data untuk pembaruan
            $dataUpdate = [
                'nama' => $nama,
                'username' => $username
            ];

            // Logika jika password tidak kosong
            if (!empty($password) && !empty($konfirPassword)) {
                // Cek apakah password dan konfirmasi password sama
                if ($password === $konfirPassword) {
                    // Hash password baru
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    // Tambahkan password baru ke dalam array data
                    $dataUpdate['password'] = $hashedPassword;
                } else {
                    // Jika password tidak sama, beri pesan error
                    $this->session->set_flashdata('error', 'Password dan konfirmasi password tidak cocok!');
                    redirect('UserController/EditPetugas/' . $id);
                }
            }

            // Panggil model untuk update data
            $this->User_Model->updatePetugas($id, $dataUpdate);

            // Redirect dengan pesan sukses
            $this->session->set_flashdata('success', 'Update Petugas Berhasil!');

            redirect('/');
        }
    }

    public function deletePetugas($id_user)
    {
        // Cek apakah siswa dengan id_user tersebut ada
        $siswa = $this->User_Model->getPetugasByID($id_user);

        if ($siswa) {
            // Hapus data siswa
            $result = $this->Siswa_Model->deleteByNoDaftar($id_user);
            $this->session->set_flashdata('success', 'Data petugas berhasil di hapus!.');
        } else {
            // Jika siswa tidak ditemukan
            $this->session->set_flashdata('error', 'Data petugas tidak ditemukan.');
        }

        // Redirect ke halaman daftar siswa
        redirect('/');
    }

    //cetak petugas

}