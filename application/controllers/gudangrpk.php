<?php
defined('BASEPATH') or exit('No direct script access allowed');

class gudangrpk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_gudangrpk');
    }

    public function index()
    {
        $data['pallet'] = $this->M_gudangrpk->tampilrobek();
        $judul['page_title'] = 'Gudang REPK';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_gudangrpk', $data);
        $this->load->view('templates/footer');
    }

    public function tumpang($id_pallet)
    {
        $data['bag'] = $this->M_gudangrpk->tampilInfoRPK($id_pallet);
        $judul['page_title'] = 'Pallet Robek / Ecer';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_numpangbagrobek', $data);
        $this->load->view('templates/footer');
    }

    public function pindahkepallet()
    {
        $this->M_gudangrpk->pindahkepallet();
    }

    public function selesairepack()
    {
        $this->M_gudangrpk->selesairepack();
        redirect('gudangrpk');
    }
}
