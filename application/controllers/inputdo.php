<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inputdo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') != true) {
            $this->session->set_flashdata('penyusup', 'penyusup');
            redirect('auth');
        }
        $this->load->model('M_inputdo');
        $this->load->model('M_historydo');
    }

    // public function index()
    // {
    //     $data['pelanggan'] = $this->M_inputdo->getPelanggan();

    //     $judul['page_title'] = 'Barang Keluar (DO)';
    //     $this->load->view('templates/header', $judul);
    //     $this->load->view('V_inputdo copy', $data);
    //     $this->load->view('templates/footer');
    // }

    public function index()
    {
        // untuk kirim datalist nomor PO
        $data['nomor_do'] = $this->M_inputdo->getNomorDO();

        // untuk kirim datalist nama pelanggan
        $data['pelanggan'] = $this->M_inputdo->getPelanggan();

        $judul['page_title'] = 'Input Nomor DO';
        $this->load->view('templates/header', $judul);
        $this->load->view('V_inputdo', $data);
        $this->load->view('templates/footer');
    }

    public function get_data_barang()
    {
        $nama_barang = $this->input->post('nama_barang');
        $data = $this->M_transaksi->getNamaBarang1($nama_barang);
        echo json_encode($data);
    }

    public function before_lastcheck()
    {
        $nomor_do = $this->input->post('nomor_do');
        $pelanggan = $this->input->post('pelanggan');
        $plat_nomor = $this->input->post('plat_nomor');

        redirect("inputdo/lastcheck/" . $nomor_do);
    }

    public function lastcheck($nomor_do)
    {

        $data['nomor_do'] = $nomor_do;
        // $data['pelanggan'] = $pelanggan;
        // $data['plat_nomor'] = $plat_nomor;

        // $nomor_do = $this->input->post('nomor_do');
        // $nama_pelanggan = $this->input->post('nama_pelanggan');
        // $plat_nomor = $this->input->post('plat_nomor');

        // untuk cek ada / gak nomor DO
        $data['cek'] = $this->M_inputdo->getPalletFromDO($nomor_do)->num_rows();

        if ($data['cek'] == 0) {
            $this->session->set_flashdata('nomordo_gaada', 'gagal');
            redirect('inputdo');
        } else {
            $data['data_do'] = $this->M_inputdo->getPalletFromDO($nomor_do)->result_array();
            // echo json_encode($data);

            $judul['page_title'] = 'Muat Truk';
            $this->load->view('templates/header', $judul);
            $this->load->view('V_checkout', $data);
            $this->load->view('templates/footer');
        }
    }

    public function updateQtyMuat()
    {
        $nomor_do = $this->input->post('nomor_do');
        $id_pallet = $this->input->post('id_pallet');
        $qty_muat = $this->input->post('qty_muat');
        $this->M_inputdo->updateQtyMuat($id_pallet, $qty_muat, $nomor_do);
        redirect("inputdo/lastcheck/" . $nomor_do);
    }

    public function historyDo()
    {
        $nomor_do = $this->input->post('nomor_do');
        $nama_pelanggan = $this->input->post('nama_pelanggan');
        $plat_nomor = $this->input->post('plat_nomor');
        $data_do = $this->M_inputdo->getPalletFromDO($nomor_do)->result_array();

        foreach ($data_do as $db) {
            $this->M_historydo->insertHistory($nama_pelanggan, $plat_nomor, $db['nomor_do'], $db['id_pallet'], $db['kode_pakan'], $db['lokasi_gudang'], $db['waktu_pembuatan'], $db['expired_date'], $db['waktu_checker'], $db['qty'], $db['qty_muat']);

            $data_pallet = $this->M_historydo->getDataPallet($db['id_pallet'])->row_array();
            if ($data_pallet['qty'] == 0) {
                //update pallet bro
                $this->M_historydo->updatePallet($db['id_pallet']);
            }
            if ($db['qty'] == $db['qty_muat']) {
                $this->M_historydo->deleteChecker($db['id_pallet'], $db['nomor_do']);
            }
        }
        $this->session->set_flashdata('berhasil-do', 'berhasil-do');
        redirect("dashboard");
    }

    // public function pakanterpilih_checkout()
    // {
    //     $data['nomor_do'] = $nomor_do;
    //     // untuk kirim data-data yang memiliki nomor DO tersebut
    //     $nomor_do = 1312;
    //     $data = $this->M_inputdo->getPalletFromDO($nomor_do)->result_array();
    //     echo json_encode($data);
    // }
}
