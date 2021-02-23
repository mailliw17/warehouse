<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kodeqr extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->model('M_qrcode');
        $this->load->library('form_validation');
        $this->load->library('Ciqrcode');
        $this->load->helper(array('url', 'string'));
    }

    public function index()
    {
        $data['pallet'] = $this->M_qrcode->tampilqrcode();
        $judul['page_title'] = 'Kode QR';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_qrcode', $data);
        $this->load->view('templates/footer');
    }

    public function tambahqrcode()
    {
        date_default_timezone_set("Asia/Jakarta");

        $data = [
            'id_pallet' => random_string('alnum', 10),
            'tanggal_pallet' => date("Y-m-d h:i:sa"),
        ];

        //insert ke database
        $this->M_qrcode->tambahqrcode($data);


        //pindah ke halaman landingpage
        $this->session->set_flashdata('message_berhasil', '<div class="alert alert-success" role="alert">
                </div>');
        redirect('kodeqr');
    }

    public function hapusqrcode($id_pallet)
    {
        $this->M_qrcode->hapusqrcode($id_pallet);

        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Pallet terhapus dari database !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('kodeqr');
    }

    public function printqrcode($id_pallet)
    {
        $this->M_qrcode->kirim($id_pallet);

        //render qrcode menjadi png
        QRcode::png(
            $id_pallet,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 15,
            $margin = 1
        );
    }

    // fungsi untuk menampilkan QR isi nomor DO di print FIFO
    public function generateqrfifo($nomor_do)
    {

        //render qrcode menjadi png
        QRcode::png(
            $nomor_do,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 15,
            $margin = 1
        );
    }

    // melihat detail QR di pallet dengan tombol
    public function detailqrcode($id_pallet)
    {
        $data['detail'] = $this->M_qrcode->getDetail($id_pallet);
        $judul['page_title'] = 'Detail Isi QR Code';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_detail_qrcode', $data);
        $this->load->view('templates/footer');
    }

    public function scandeteksi()
    {
        $this->load->view('V_scan_deteksi');
    }

    public function scandeteksi_handheld()
    {
        $judul['page_title'] = 'Scan Handheld';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_deteksi_handheld');
        $this->load->view('templates/footer');
    }

    public function hasil_scandeteksi_handheld()
    {
        $data['id_pallet'] = $this->input->post('id_pallet');

        $data['detail'] = $this->M_qrcode->getDetail($data['id_pallet']);

        $judul['page_title'] = 'Detail Isi QR Code';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_detail_qrcode', $data);
        $this->load->view('templates/footer');

        if ($data['detail'] == 0) {
            $this->session->set_flashdata('gagal_barcode', 'gagal');
            redirect('kodeqr/scandeteksi_handheld');
        }
    }

    // melihat detail QR di pallet dengan scan kamera
    public function detaildeteksi()
    {
        $data['id_pallet'] = $this->input->post('id_pallet');

        $data['detail'] = $this->M_qrcode->getDetail($data['id_pallet']);

        $judul['page_title'] = 'Detail Isi QR Code';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_detail_qrcode', $data);
        $this->load->view('templates/footer');

        if ($data['detail'] == 0) {
            $this->session->set_flashdata('gagal_barcode', 'gagal');
            redirect('kodeqr/scandeteksi');
        }
    }
}
