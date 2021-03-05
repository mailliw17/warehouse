<?php
defined('BASEPATH') or exit('No direct script access allowed');

class historymuat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_historymuat');
    }

    public function index()
    {
        $data['history'] = $this->M_historymuat->tampilhistory();
        $judul['page_title'] = 'Form Perincian Muat';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_historymuat', $data);
        $this->load->view('templates/footer');
    }

    public function printpelanggan($nama)
    {
    }
}
