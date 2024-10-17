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
        $this->load->library('form_validation');    // Load library upload
        $this->load->library('session');   // Load session
    }

    public function daftar_petugas()
    {
        $this->load->view('daftar-petugas');
    }

    public function addNewPetugas()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('konfir-password', 'Confirm Password', 'matches[password]');

        $username = $this->input->post('username');

        if ($this->form_validation->run() === FALSE) {
            // Jika validasi gagal, tampilkan kembali form register
            $this->load->view('daftar-petugas');
        } elseif ($this->User_Model->cek_username($username)) {
            // Jika username sudah ada, beri pesan error
            $this->session->set_flashdata('error', 'Username sudah dipakai, silakan pilih yang lain');
            redirect('auth/register'); // Kembali ke halaman registrasi
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);

            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $password
            );

            // Panggil model untuk mendaftarkan user
            $this->User_Model->insert_petugas($data);

            // Redirect ke halaman login setelah register berhasil
            redirect('SiswaController/');
        }
    }
}
