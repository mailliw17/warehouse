<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->model('M_auth');
    }

    public function index()
    {
        $data['pallet_aktif'] = $this->M_dashboard->pallet_aktif()->num_rows();
        $data['pallet_kosong'] = $this->M_dashboard->pallet_kosong()->num_rows();
        $data['jumlah_po'] = $this->M_dashboard->jumlah_po()->row_array();
        $data['jumlah_pakan'] = $this->M_dashboard->jumlah_pakan()->result_array();

        // $data = $this->M_dashboard->jumlah_pakan();
        // echo json_encode($data); 

        $judul['page_title'] = 'Dashboard';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function get_jumlah_pakan()
    {
        $data = $this->M_dashboard->jumlah_pakan()->result_array();
        echo json_encode($data);
    }
}
