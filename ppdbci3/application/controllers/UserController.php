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
        $this->load->model('Siswa_Model'); // Load model Siswa_Model
        $this->load->model('User_Model'); // Load model Siswa_Model
        $this->load->library('upload');    // Load library upload
        $this->load->library('form_validation');
        $this->load->library('session');   // Load session
    }

    public function load_login_petugas()
    {
        $this->load->view('login-petugas');
    }

    public function daftar_petugas()
    {
        $this->load->view('daftar-petugas');
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
            $this->session->set_flashdata('errors', validation_errors());

            // Redirect kembali ke halaman register
            redirect('admin/daftarPetugas');
        } else {
            // Hashing password sebelum disimpan
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            // Data untuk disimpan
            $data = [
                'username' => $this->input->post('username'),
                'username' => $this->input->post('username'),
                'password' => $password
            ];

            // Panggil fungsi register dari model
            $this->User_Model->insert_petugas($data);

            // Set pesan sukses
            $this->session->set_flashdata('success', 'Registrasi Petugas Berhasil! <a href=' . base_url('') . '>Kembali</a>');

            redirect('admin/daftarPetugas');
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

    public function loginPetugas()
    {
        // Aturan validasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal
            $this->load->view('login-petugas');
        } else {
            // Ambil data dari form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Panggil model untuk verifikasi login
            $user = $this->User_Model->login_user($username, $password);

            if ($user) {
                // Jika login berhasil, set session
                $session_data = [
                    'user_id' => $user->id,
                    'username' => $user->username,
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

    // Fungsi logout
    public function logout()
    {
        // Hapus session
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        // Set pesan logout
        $this->session->set_flashdata('success', 'Anda telah logout.');
        redirect('auth/login');
    }
}
