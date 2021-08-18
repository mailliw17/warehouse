<?php

class M_fifo extends CI_Model
{
    public function tampilsemuapakan()
    {
        return $this->db->query("SELECT * FROM pallet WHERE kode_pakan IS NOT NULL 
        AND qty != 0 
        AND (SELECT min(waktu_pembuatan) FROM pallet)
        -- CEK STATUS DARI LAB 
        AND (status_lab IS NULL OR status_lab = 'REMIXED') 
        ORDER BY waktu_pembuatan, nomor_pallet asc")->result_array();
    }

    public function ambilIDPallet($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }

    public function tampilChecker()
    {
        return $this->db->query("SELECT nomor_do, kode_pakan, lokasi_gudang, qty_checker FROM checker")->result_array();
    }
    public function pakanTerpilih($nomor_do)
    {
        return $this->db->query("SELECT * FROM checker WHERE nomor_do='$nomor_do' ORDER BY kode_pakan")->result_array();
    }

    public function cekFIFO($kode_pakan)
    {
        return $this->db->query("SELECT MIN(waktu_pembuatan) as fifo FROM pallet WHERE kode_pakan = '$kode_pakan'")->row_array();
    }

    // public function updateBag($id_pallet, $qty)
    // {
    //     return $this->db->query("UPDATE pallet SET qty = qty - '$qty' WHERE id_pallet='$id_pallet'");
    // }

    // public function sendchecker()
    // {
    //     $data = [
    //         'nomor_do' => $this->input->post('nomor_do', true),
    //         'id_pallet' => $this->input->post('id_pallet', true),
    //         'nomor_po' => $this->input->post('nomor_po', true),
    //         'kode_pakan' => $this->input->post('kode_pakan', true),
    //         'lokasi_gudang' => $this->input->post('lokasi_gudang', true),
    //         "waktu_pembuatan"  => date("Y-m-d H:i:s", strtotime($_POST['waktu_pembuatan'])),
    //         "waktu_checker" => date("Y-m-d H:i:s", strtotime($_POST['waktu_checker'])),
    //         'expired_date' => date("Y-m-d", strtotime($_POST['expired_date'])),
    //         'qty' => $this->input->post('qty', true),
    //     ];

    //     $this->db->insert('checker', $data);
    // }

    public function ambilBagIni()
    {
        $data = [
            'nomor_do' => $this->input->post('nomor_do', true),
            'id_pallet' => $this->input->post('id_pallet', true),
            'kode_pakan' => $this->input->post('kode_pakan', true),
            'lokasi_gudang' => $this->input->post('lokasi_gudang', true),
            "waktu_checker" => $this->input->post('waktu_checker', true),
            "waktu_pembuatan" => $this->input->post('waktu_pembuatan', true),
            'expired_date' => $this->input->post('expired_date', true),
            'qty_checker' => $this->input->post('qty_checker', true),
        ];

        $cek = $this->db->query("SELECT * FROM checker where id_pallet='" . $this->input->post('id_pallet') . "' AND nomor_do='" . $this->input->post('nomor_do') . "'");

        // $tanggalpallet = $this->db->query("SELECT waktu_pembuatan FROM pallet where kode_pakan='" . $this->input->post('kode_pakan') . "'");

        // $tanggaltermuda = $this->db->query("SELECT MIN(waktu_pembuatan) FROM pallet WHERE kode_pakan='" . $this->input->post('kode_pakan') . "' ");
        // $check_ya = $this->db->query("SELECT * FROM pallet WHERE waktu_pembuatan <= '$waktu_pembuatan' AND kode_pakan = '$kode_pakan'")->num_rows();

        // $tanggalpallet = '2021 - 03 - 18';
        // $tanggaltermuda = '2021 - 03 - 17';

        // $tp =  strtotime($tanggalpallet);
        // $tt = strtotime($tanggaltermuda);

        if ($cek->num_rows() >= 1) {
            $this->session->set_flashdata('gagal', '<div class="alert alert-success" role="alert">
            </div>');
            redirect('fifo/checker/');
        }

        // if (strtotime($tanggaltermuda) >= strtotime($tanggalpallet)) {
        //     $this->session->set_flashdata('salahfifo', '<div class="alert alert-success" role="alert">
        //     </div>');
        //     redirect('fifo/checker/');
        // } else {
        //     $this->db->insert('checker', $data);
        // }

        $this->db->insert('checker', $data);

        $preventQtyMuat0 = $this->db->query("SELECT * FROM checker WHERE qty_checker = 0");
        $delete = $this->db->query("DELETE FROM checker WHERE qty_checker = 0");
        if ($preventQtyMuat0->num_rows() >= 1) {
            $delete;
            $this->session->set_flashdata('kosongan', '<div class="alert alert-success" role="alert">
            </div>');
            redirect('fifo/checker/');
        }

        // $this->db->insert('checker', $data);
    }

    public function getDetail($id_pallet)
    {
        return $this->db->get_where('pallet', ['id_pallet' => $id_pallet])->row_array();
    }

    public function updatePallet()
    {
        $data = [
            'id_pallet' => $this->input->post('id_pallet', true),
            'lokasi_gudang' => $this->input->post('lokasi_gudang', true),
            'qty' => $this->input->post('qty', true),
        ];

        $this->db->where('id_pallet', $this->input->post('id_pallet'));
        $this->db->update('pallet', $data);
    }

    public function checkTanggalPallet($kode_pakan)
    {
        return $this->db->query("SELECT * FROM pallet WHERE kode_pakan = '$kode_pakan' ORDER BY waktu_pembuatan ASC LIMIT 1");
    }

    public function checkPallet($id_pallet)
    {
        return $this->db->query("SELECT * FROM pallet WHERE id_pallet = '$id_pallet' ");
    }
}
