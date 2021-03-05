<?php

class M_historymuat extends CI_Model
{
    public function tampilhistory()
    {
        return $this->db->query("SELECT nomor_do, nama_pelanggan, plat_nomor, SUM(qty_muat) AS qty, waktu_checker FROM history_do GROUP BY nomor_do, nama_pelanggan, plat_nomor ORDER BY waktu_checker DESC")->result_array();
    }
}
