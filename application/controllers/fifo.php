<?php
defined('BASEPATH') or exit('No direct script access allowed');

class fifo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->model('M_fifo');
    }

    public function index()
    {
        $data['checker'] = $this->M_fifo->tampilChecker();
        $judul['page_title'] = 'FIFO Pallet';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_fifo', $data);
        $this->load->view('templates/footer');
    }

    public function before_checker()
    {
        $nomor_do = $this->input->post('nomor_do');
        redirect("fifo/checker/" . $nomor_do);
    }

    // fungsi untuk menampilkan halaman FIFO saja 
    public function checker($nomor_do)
    {
        $data['nomor_do'] = $nomor_do;

        // fungsi untuk pakan terpilih
        $data['data_checker'] = $this->M_fifo->pakanTerpilih($data['nomor_do']);
        if (count($data['data_checker']) == 0) {
            $data['data_checker'] = false;
        }

        $data['pallet'] = $this->M_fifo->tampilsemuapakan();

        $judul['page_title'] = 'FIFO Forklift';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_pilihpakan', $data);
        $this->load->view('templates/footer');
    }

    public function pakan_terpilih()
    {
        $nomor_do = $this->input->post('nomor_do');
        $data = $this->M_fifo->pakanTerpilih($nomor_do);
        if (count($data) == 0) {
            $data = false;
        }
        echo json_encode($data);
    }

    public function ambilBagIni()
    {
        // cara mencegah (nomor DO dan id_pallet) yang sama jadi double


        $this->M_fifo->ambilBagIni();

        $this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('fifo/checker/');
    }

    // untuk mengirim data json ke halaman fifo
    public function checker2()
    {
        $dataPallet = $this->M_fifo->tampilsemuapakan();
        echo json_encode($dataPallet);
    }

    public function ambilIDPallet()
    {
        $id_pallet = $this->input->post('id_pallet');
        $where = array('id_pallet' => $id_pallet);
        $id_pallets = $this->M_fifo->ambilIDPallet('pallet', $where)->result_array();
        echo json_encode($id_pallets);
    }

    public function checker_ok()
    {
        // untuk kurangin bag di tabel pallet
        // $this->M_fifo->updateBag($id_pallet, $qty);

        // untuk insert data baru di tabel checker
        $this->M_fifo->sendchecker();

        // echo json_encode($result)

        $this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('fifo/checker/');
    }
}
