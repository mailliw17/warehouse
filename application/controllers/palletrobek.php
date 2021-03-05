<?php
defined('BASEPATH') or exit('No direct script access allowed');

class palletrobek extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_palletrobek');
    }

    public function index()
    {
        // $data['pelanggan'] = $this->M_pelanggan->tampilpelanggan();
        $judul['page_title'] = 'Pallet Robek / Ecer';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_palletrobek');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->M_palletrobek->tambah();

        $this->session->set_flashdata('berhasil-tambah', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('dashboard');
    }
}
