<?php

class M_lab extends CI_Model
{
    public function tampilblockfeed()
    {
        $query = $this->db->query("SELECT * FROM pallet WHERE status_lab = 'BLOCKED' ");
        return $query->result_array();
    }

    public function tampilremixfeed()
    {
        $query = $this->db->query("SELECT * FROM pallet_remix_area");
        return $query->result_array();
    }

    public function store_blockfeed($id_pallet)
    {
        $this->db->query("UPDATE pallet SET status_lab = 'BLOCKED' WHERE id_pallet = '$id_pallet'");
    }

    public function store_riliskembali($id_pallet)
    {
        $cekstatusremix = $this->db->query("SELECT * FROM pallet WHERE id_pallet = '$id_pallet'")->row_array();

        if ($cekstatusremix['status_lab'] == 'REMIXED') {
            $this->session->set_flashdata('riliskembali_gagal_no_block', '<div class="alert alert-danger" role="alert"> </div>');
        } else if (is_null($cekstatusremix['status_lab'])) {
            $this->session->set_flashdata('riliskembali_gagal_no_block', '<div class="alert alert-danger" role="alert">
            </div>');
        } else if ($cekstatusremix['status_lab'] == 'BLOCKED') {
            $this->db->query("UPDATE pallet SET status_lab = NULL WHERE id_pallet = '$id_pallet'");

            $this->session->set_flashdata('riliskembali_berhasil', '<div class="alert alert-success" role="alert">
             </div>');
        }
    }

    public function store_remix($id_pallet, $qty)
    {
        $cekstatusremix = $this->db->query("SELECT * FROM pallet WHERE id_pallet = '$id_pallet'")->row_array();
        if ($cekstatusremix['status_lab'] == 'REMIXED') {
            $this->session->set_flashdata('remix_gagal', '<div class="alert alert-danger" role="alert"></div>');
        } else if ($cekstatusremix['status_lab'] == 'BLOCKED') {
            $this->session->set_flashdata('remix_gagal_karena_blocked', '<div class="alert alert-danger" role="alert"></div>');
        } else {
            // SAAT BERHASIL

            // KURANGI DULU QTY DI PALLET ASLI
            $this->db->query("UPDATE pallet SET status_lab = 'REMIXED', qty = qty - $qty WHERE id_pallet = '$id_pallet' ");

            // MASUKAN DATA REMIX KE TABEL pallet_remix_area
            $this->db->query("INSERT INTO pallet_remix_area (id_pallet, kode_pakan, waktu_pembuatan, lokasi_gudang, expired_date) SELECT id_pallet, kode_pakan, waktu_pembuatan, lokasi_gudang, expired_date FROM pallet WHERE id_pallet = '$id_pallet' ");

            // UPDATE DATA YANG BARU DIMASUKKAN DENGAN qty_remix
            $this->db->query("UPDATE pallet_remix_area SET qty_remix = '$qty' WHERE id_pallet = '$id_pallet' ");

            $this->session->set_flashdata('remix', '<div class="alert alert-success" role="alert">
             </div>');
        }
    }

    public function repackingdone($id_pallet)
    {
        $this->db->query("DELETE FROM pallet_remix_area WHERE id_pallet = '$id_pallet'");
    }
}
