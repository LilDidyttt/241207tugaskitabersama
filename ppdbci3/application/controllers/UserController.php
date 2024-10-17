<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Loader $load
 * @property CI_DB_query_builder|CI_DB_mysqli_driver $db
 * @property CI_Input $input
 * @property Siswa_Model $Siswa_Model
 * @property CI_Upload $upload
 * @property CI_Session $session
 */

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_Model'); // Load model Siswa_Model
        $this->load->library('upload');    // Load library upload
        $this->load->library('session');   // Load session
    }

    public function daftar_petugas()
    {
        $this->load->view('daftar-petugas');
    }

    public function addNewPetugas()
    {
        $data = array();
    }
}
