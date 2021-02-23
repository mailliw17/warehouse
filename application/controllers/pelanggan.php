<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pelanggan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_pelanggan');
    }

    public function index()
    {
        $data['pelanggan'] = $this->M_pelanggan->tampilpelanggan();
        $judul['page_title'] = 'Daftar Pelanggan';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_pelanggan', $data);
        $this->load->view('templates/footer');
    }

    public function tambahpelanggan()
    {
        $this->form_validation->set_rules(
            'nama_pelanggan',
            'Nama_pelanggan',
            'trim|required|is_unique[pelanggan.nama_pelanggan]',
            array(
                'is_unique' => 'Nama pelanggan sudah terdaftar'
            )
        );

        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Gagal Menambahkan Pelanggan';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_error_pelanggan');
            $this->load->view('templates/footer');
        } else {
            //insert ke database
            $this->M_pelanggan->tambahpelanggan();

            $this->session->set_flashdata('message_berhasil', '<div class="alert alert-success" role="alert">
                </div>');
            redirect('pelanggan');
        }
    }

    public function hapuspelanggan($id_pelanggan)
    {
        $this->M_pelanggan->hapuspelanggan($id_pelanggan);

        $this->session->set_flashdata('message_hapus', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('pelanggan');
    }
}
