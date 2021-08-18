<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inputpo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->library('form_validation');
        $this->load->model('M_inputpo');
    }

    public function scan()
    {
        $this->load->view('V_scan');
    }

    public function isidatapo()
    {
        // fungsi ini utk validasi qrcode, datalist, dan isi id_pallet dari QR
        $data['id_pallet'] = $this->input->post('id_pallet');

        $data['data_pallet'] = $this->M_inputpo->getPallet($data['id_pallet']);

        if ($data['data_pallet'] == 0) {
            $this->session->set_flashdata('gagal_barcode', 'gagal');
            redirect('inputpo/scan');
        } else if ($data['data_pallet']['nomor_po'] != 0) {
            $this->session->set_flashdata('sudah_isi', 'isi');
        } else {
            $this->session->set_flashdata('berhasil', 'Berhasil');
        }

        $data['no_po'] = $this->M_inputpo->getNoPO();

        $data['kode_pakan'] = $this->M_inputpo->getKodePakanManual();

        $judul['page_title'] = 'Isikan PO';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_inputpo.php', $data);
        $this->load->view('templates/footer');
    }

    public function handheld()
    {
        $judul['page_title'] = 'Scan Handheld';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_handheld');
        $this->load->view('templates/footer');
    }

    public function input_po_handheld()
    {
        // fungsi ini utk validasi qrcode, datalist, dan isi id_pallet dari QR
        $data['id_pallet'] = $this->input->post('id_pallet');

        $data['data_pallet'] = $this->M_inputpo->getPallet($data['id_pallet']);

        if ($data['data_pallet'] == 0) {
            // saat pallet tidak ada di DB, pake sweetalert
            $this->session->set_flashdata('gagal_barcode', 'gagal');
            redirect('inputpo/handheld');
        } else if ($data['data_pallet']['nomor_po'] != 0) {
            $this->session->set_flashdata('sudah_isi', 'isi');
        } else {
            $this->session->set_flashdata('berhasil', 'Berhasil');
        }
        $data['no_po'] = $this->M_inputpo->getNoPO();

        $data['kode_pakan'] = $this->M_inputpo->getKodePakanManual();

        $data['lokasi_gudang'] = $this->M_inputpo->getLokasiGudang();

        $judul['page_title'] = 'Isikan PO';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_inputpo', $data);
        $this->load->view('templates/footer');
    }

    public function sendpo()
    {
        $this->M_inputpo->sendpo();
        $this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('lampu');
    }

    public function getNoPO()
    {
        $nomor_po = $this->input->post('no_po');
        if ($this->M_inputpo->countNoPO1($nomor_po) > 0) {
            $data = $this->M_inputpo->getNoPO1($nomor_po);
        } else {
            $data = false;
        }
        echo json_encode($data);
    }

    public function getKodePakan()
    {
        $nomor_po = $this->input->post('nomor_po');
        $datas = $this->M_inputpo->getKodePakan($nomor_po); // jadiin row_array()
        $kodepakan = $datas['kode_pakan'];
        $no_pallet = $this->M_inputpo->hitungNoPallet($nomor_po) + 1;

        $data = array();
        array_push($data, $kodepakan, $no_pallet);
        echo json_encode($data);
    }
}
