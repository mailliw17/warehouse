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

    // public function cekFIFO()
    // {
    //     $fifo = $this->M_fifo->cekFIFO();
    //     echo json_encode($fifo);
    // }

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

    public function scan_updatepallet()
    {
        $judul['page_title'] = 'Scan Pallet';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_scan_update_pallet');
        $this->load->view('templates/footer');
    }

    public function form_updatepallet()
    {
        $data['id_pallet'] = $this->input->post('id_pallet');

        $data['detail'] = $this->M_fifo->getDetail($data['id_pallet']);

        // $data = array(
        //     $a['detail'] => $this->M_fifo->getDetail($b['id_pallet']),
        //     $b['id_pallet']  => $this->input->post('id_pallet'),
        // );

        if ($data['detail'] == 0) {
            $this->session->set_flashdata('gagal_barcode', 'gagal');
            redirect('fifo/scan_updatepallet');
        }
        if ($data['detail']['qty'] == null) {
            $this->session->set_flashdata('pallet_kosong', 'info');
            redirect('fifo/scan_updatepallet');
        } else {
            $judul['page_title'] = 'Update Pallet';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_updatepallet', $data);
            $this->load->view('templates/footer');
        }
    }

    public function updatepallet()
    {
        $this->M_fifo->updatePallet();

        $this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('fifo/scan_updatepallet/');
    }

    // untuk cek pallet sesuai fifo atau tidak
    public function checkPallet()
    {
        $id_pallet = $this->input->post("id_pallet");
        $kode_pakan = $this->input->post("kode_pakan");

        // ambil tanggal pallet terpilih
        $data_pallet = $this->M_fifo->checkPallet($id_pallet)->row_array();
        $tanggal_pallet = $data_pallet['waktu_pembuatan'];

        // ambil tanggal tertua dari kodepakan pallet terpilih
        $tanggal_pallet_tertua = $this->M_fifo->checkTanggalPallet($kode_pakan)->row_array();
        $tanggal_pallet_tertua = $tanggal_pallet_tertua['waktu_pembuatan'];

        // ini waktu toleransi fifo boleh +2 hari
        $tanggal_pallet_tertua_plus2 = date('Y-m-d', strtotime('+2 days', strtotime($tanggal_pallet_tertua)));

        if ($tanggal_pallet > $tanggal_pallet_tertua) {
            if ($tanggal_pallet <= $tanggal_pallet_tertua_plus2) {
                // waktu toleransi fifo +2 hari
                $data = 2;
            } else {
                // tidak bisa terambil karena tidak sesuai fifo
                $data = 1;
            }
        } else {
            // boleh dipakai karena sesuai fifo
            $data = 3;
        }

        echo json_encode($data);
    }
}
