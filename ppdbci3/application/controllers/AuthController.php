<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder|CI_DB_mysqli_driver $db
 * @property CI_Input $input
 * @property Siswa_Model $Siswa_Model
 * @property CI_Session $session
 */
class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load model Siswa_Model
        $this->load->model('Siswa_Model');
        $this->load->model('User_Model');
    }

    public function index()
    {
        if (!$this->session->userdata('logged_in')) {
            // Jika belum login, redirect ke halaman login
            redirect('auth/login-siswa');
        }

        $result = $this->Siswa_Model->get_siswa();
        $data['siswa'] = $result[0];
        $data['total_siswa'] = $result[1];

        $resultPetugas = $this->User_Model->get_petugas();
        $data['petugas'] = $resultPetugas[0];
        $data['total_petugas'] = $resultPetugas[1];

        $data['level'] = $this->session->userdata('level');
        $data['username'] = $this->session->userdata('username');
        $data['nama'] = $this->session->userdata('nama');

        $this->load->view('index', $data);
    }

    // Fungsi untuk menampilkan halaman login
    public function view_login_siswa()
    {
        $this->load->view('login_siswa');
    }

    public function view_login_petugas()
    {
        $this->load->view('login_petugas');
    }

    // Login Petugas
    public function loginPetugas()
    {
        // Aturan validasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('login_petugas');
        } else {
            // Ambil data dari form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Panggil model untuk verifikasi login
            $user = $this->User_Model->login_petugas($username, $password);

            if ($user) {
                // Jika login berhasil, set session
                $session_data = [
                    'user_id' => $user->id,
                    'username' => $user->username,
                    'nama' => $user->nama,
                    'level' => $user->level,
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);

                // Redirect ke halaman yang diinginkan
                redirect('/');
            } else {
                // Jika login gagal
                $this->session->set_flashdata('error', 'Username atau password salah.');
                redirect('auth/login-petugas');
            }
        }
    }

    // Login Siswa
    public function loginSiswa()
    {
        // Aturan validasi
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            // Jika validasi gagal
            $this->load->view('login_siswa');
        } else {
            // Ambil input NISN dan tanggal lahir dari form
            $nisn = $this->input->post('nisn');
            $tanggal_lahir = $this->input->post('tanggal_lahir');

            // Memanggil fungsi login_siswa dari model
            $siswa = $this->Siswa_Model->login_siswa($nisn, $tanggal_lahir);

            if ($siswa) {
                // Jika siswa ditemukan, simpan informasi ke session
                $session_data = [
                    'user_id' => $siswa->id,
                    'username' => $siswa->username,
                    'nama' => $siswa->nama,
                    'level' => 'siswa',
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($session_data);

                // Redirect ke controller SiswaController method index
                redirect('/');
            } else {
                // Jika login gagal, tampilkan pesan error dan redirect ke halaman login
                $this->session->set_flashdata('error', 'NISN atau tanggal lahir salah.');
                redirect('auth/login-siswa');
            }
        }
    }

    // Fungsi untuk logout
    public function logout()
    {
        // Hapus session
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('nama');

        // Set pesan logout
        $this->session->set_flashdata('success', 'Anda telah logout.');
        redirect('auth/login-siswa');
    }
}
