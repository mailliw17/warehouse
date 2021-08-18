<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lab extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_lab');
    }

    public function index()
    {
        $data['block'] = $this->M_lab->tampilblockfeed();
        $data['remix'] = $this->M_lab->tampilremixfeed();
        $judul['page_title'] = 'Gudang Repack';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_lab', $data);
        $this->load->view('templates/footer');
    }

    public function blockfeed()
    {
        $judul['page_title'] = 'Scan Block';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_blockfeed');
        $this->load->view('templates/footer');
    }

    public function store_blockfeed()
    {
        $id_pallet = $this->input->post("id_pallet");
        $this->M_lab->store_blockfeed($id_pallet);
        $this->session->set_flashdata('blockfeed', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('lab');
    }

    public function riliskembali()
    {
        $judul['page_title'] = 'Scan Rilis Kembali';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_riliskembali');
        $this->load->view('templates/footer');
    }

    public function store_riliskembali()
    {
        $id_pallet = $this->input->post("id_pallet");
        $this->M_lab->store_riliskembali($id_pallet);
        // $this->session->set_flashdata('riliskembali', '<div class="alert alert-success" role="alert">
        // </div>');
        redirect('lab');
    }

    public function remix()
    {
        $judul['page_title'] = 'Scan Remix';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_remix');
        $this->load->view('templates/footer');
    }

    public function store_remix()
    {
        $id_pallet = $this->input->post("id_pallet");
        $qty = $this->input->post("qty");

        $this->M_lab->store_remix($id_pallet, $qty);
        redirect('lab');
    }

    public function repackingdone($id_pallet)
    {
        $this->M_lab->repackingdone($id_pallet);
        redirect('lab');
    }
}
