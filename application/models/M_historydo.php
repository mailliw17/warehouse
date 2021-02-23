<?php

class M_historydo extends CI_Model
{
    public function insertHistory($nama_pelanggan, $plat_nomor, $nomor_do, $id_pallet, $kode_pakan, $lokasi_gudang, $waktu_pembuatan, $expired_date, $waktu_checker, $qty, $qty_muat)
    {
        $this->db->query("INSERT INTO history_do (nama_pelanggan, plat_nomor, nomor_do, id_pallet, kode_pakan, lokasi_gudang, waktu_pembuatan, expired_date, waktu_checker, qty, qty_muat)
        VALUES ('$nama_pelanggan', '$plat_nomor', '$nomor_do', '$id_pallet', '$kode_pakan', '$lokasi_gudang', '$waktu_pembuatan', '$expired_date', '$waktu_checker', '$qty', '$qty_muat')");
    }

    public function getDataPallet($id_pallet)
    {
        return $this->db->query("SELECT * FROM pallet WHERE id_pallet = '$id_pallet'");
    }

    public function updatePallet($id_pallet)
    {
        $this->db->query("UPDATE pallet SET nomor_po = NULL, kode_pakan = NULL, line_packing = NULL, shift = NULL, waktu_pembuatan = NULL, nomor_pallet = NULL, lokasi_gudang = NULL, expired_date = NULL, qty= NULL WHERE id_pallet = '$id_pallet'");
    }

    public function deleteChecker($id_pallet, $nomor_do)
    {
        $this->db->query("DELETE FROM checker WHERE id_pallet = '$id_pallet' && nomor_do = '$nomor_do'");
    }
}
