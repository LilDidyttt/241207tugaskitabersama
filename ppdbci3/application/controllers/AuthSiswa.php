<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder|CI_DB_mysqli_driver $db
 * @property CI_Input $input
 * @property Siswa_Model $Siswa_Model
 * @property CI_Session $session
 */
class AuthSiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model Siswa_Model
        $this->load->model('Siswa_Model');
    }

    // Fungsi untuk menampilkan halaman login
    public function login()
    {
        $this->load->view('login_siswa');
    }

    // Fungsi untuk memproses login siswa
    public function login_process()
    {
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
                'level' => 'siswa',
                'logged_in' => TRUE
            ];
            $this->session->set_userdata($session_data);

            // Redirect ke controller SiswaController method index
            redirect('/');
        } else {
            // Jika login gagal, tampilkan pesan error dan redirect ke halaman login
            $this->session->set_flashdata('error', 'NISN atau tanggal lahir salah.');
            redirect('authsiswa/login');
        }
    }
    public function list()
    {
        $result = $this->Siswa_Model->get_siswa();
        $data['siswa'] = $result[0];
        $data['total'] = $result[1];
        $data['level'] = $this->session->userdata('level');

        $this->load->view('index', $data);
    }
    // Fungsi untuk logout
    public function logout()
    {
        // Menghapus session siswa
        $this->session->unset_userdata('siswa_logged_in');
        redirect('authsiswa/login');
    }
}
