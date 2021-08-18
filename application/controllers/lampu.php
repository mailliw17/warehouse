<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lampu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_lampu');
    }

    public function index()
    {

        $this->load->view('V_countdown');
    }
}
