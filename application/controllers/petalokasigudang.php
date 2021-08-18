<?php
defined('BASEPATH') or exit('No direct script access allowed');

class petalokasigudang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_petalokasigudang');
    }

    public function index()
    {
        $data['plg'] = $this->M_petalokasigudang->tampillokasigudang();
        $judul['page_title'] = 'Peta Lokasi Gudang';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_petalokasigudang', $data);
        $this->load->view('templates/footer');
    }

    public function tambahlokasi()
    {
        $this->form_validation->set_rules(
            'line_gudang',
            'Line_gudang',
            'trim|required|is_unique[peta_lokasi_gudang.line_gudang]',
            array(
                'is_unique' => 'Lokasi sudah terdaftar'
            )
        );

        if ($this->form_validation->run() == false) {
            $judul['page_title'] = 'Gagal Menambahkan';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_error_lokasigudang');
            $this->load->view('templates/footer');
        } else {
            //insert ke database
            $this->M_petalokasigudang->tambahlokasi();

            $this->session->set_flashdata('message_berhasil', '<div class="alert alert-success" role="alert">
                </div>');
            redirect('petalokasigudang');
        }
    }

    public function hapuslokasi($id)
    {
        $this->M_petalokasigudang->hapuslokasi($id);

        $this->session->set_flashdata('message_hapus', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('petalokasigudang');
    }

    public function editlokasi($id)
    {
        $data['plg'] = $this->M_petalokasigudang->ambildata1lokasi($id);

        $this->form_validation->set_rules(
            'line_gudang',
            'Line_gudang',
            'trim|required'
        );

        if ($this->form_validation->run() == false) {
            //load tampilannya
            $judul['page_title'] = 'Ganti password';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_editlokasi', $data);
            $this->load->view('templates/footer');
        } else {

            $this->M_petalokasigudang->editlokasi();

            $this->session->set_flashdata('message_edit', '<div class="alert alert-success" role="alert">
                </div>');
            redirect('petalokasigudang');
        }
    }
}
