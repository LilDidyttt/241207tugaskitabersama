<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom404 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // Set header status code 404
        $this->output->set_status_header('404');
        // Load custom view for 404 error
        $this->load->view('errors/html/404error');
    }
}
