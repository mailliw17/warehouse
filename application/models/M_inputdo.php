<?php

class M_inputdo extends CI_Model
{
    public function getPelanggan()
    {
        return $this->db->query("SELECT nama_pelanggan FROM pelanggan")->result();
    }

    public function getNomorDO()
    {
        return $this->db->query("SELECT nomor_do FROM checker GROUP BY nomor_do")->result();
    }

    public function getPalletFromDO($nomor_do)
    {
        return $this->db->query("SELECT * FROM checker WHERE nomor_do = '$nomor_do'");
    }

    public function updateQtyMuat($id_pallet, $qty_muat, $nomor_do)
    {
        $this->db->query("UPDATE checker SET qty_muat = qty_muat + $qty_muat WHERE id_pallet = '$id_pallet' && nomor_do = '$nomor_do'");
    }

    public function checkKodeQr($kode_qr)
    {
        return $this->db->query("SELECT * FROM checker WHERE id_pallet = '$kode_qr'");
    }
}
