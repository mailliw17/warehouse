<?php

class M_cetak extends CI_Model
{

    public function checker1($nomor_do)
    {
        return $this->db->query("SELECT nomor_do, kode_pakan, qty_checker, lokasi_gudang, waktu_pembuatan FROM checker WHERE nomor_do = '$nomor_do' ORDER BY kode_pakan")->result_array();
    }

    public function checker2($nomor_do)
    {
        return $this->db->query("SELECT nomor_do FROM checker WHERE nomor_do = '$nomor_do'")->row();
    }

    public function pelanggan1($nomor_do)
    {
        return $this->db->query("SELECT nomor_do, nama_pelanggan, plat_nomor, operator FROM history_do WHERE nomor_do = '$nomor_do'")->row();
    }

    public function pelanggan2($nomor_do)
    {
        return $this->db->query("SELECT SUM(qty_muat) as qty, kode_pakan, nomor_do FROM history_do WHERE nomor_do = '$nomor_do'  GROUP BY kode_pakan")->result_array();
    }
}
