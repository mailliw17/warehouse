<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kodepakan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_kodepakan');
    }

    public function index()
    {
        $data['pakan'] = $this->M_kodepakan->tampilkodepakan();
        $judul['page_title'] = 'Kode Pakan';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_kodepakan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahkodepakan()
    {
        $this->form_validation->set_rules(
            'nama_pakan',
            'Nama_pakan',
            'trim|required|is_unique[kode_pakan.nama_pakan]',
            array(
                'is_unique' => 'Nama pakan sudah terdaftar'
            )
        );

        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Gagal Menambahkan';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_error_kodepakan');
            $this->load->view('templates/footer');
        } else {
            //insert ke database
            $this->M_kodepakan->tambahkodepakan();

            $this->session->set_flashdata('message_berhasil', '<div class="alert alert-success" role="alert">
                </div>');
            redirect('kodepakan');
        }
    }

    public function hapuskodepakan($id_pakan)
    {
        $this->M_kodepakan->hapuskodepakan($id_pakan);

        $this->session->set_flashdata('message_hapus', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('kodepakan');
    }
}
