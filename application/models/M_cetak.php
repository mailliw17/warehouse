<?php

class M_cetak extends CI_Model
{

    public function checker1($nomor_do)
    {
        return $this->db->query("SELECT nomor_do, kode_pakan, qty, lokasi_gudang, waktu_pembuatan FROM checker WHERE nomor_do = '$nomor_do' ORDER BY kode_pakan")->result_array();
    }

    public function checker2($nomor_do)
    {
        return $this->db->query("SELECT nomor_do FROM checker WHERE nomor_do = '$nomor_do'")->row();
    }
}
