<?php

class M_dashboard extends CI_Model
{
    public function pallet_aktif()
    {
        return $this->db->query("SELECT * FROM pallet WHERE nomor_po IS NOT NULL");
    }

    public function pallet_kosong()
    {
        return $this->db->query("SELECT * FROM pallet WHERE nomor_po IS NULL");
    }

    public function jumlah_po()
    {
        return $this->db->query("SELECT COUNT(temp.ct) AS result FROM
        (SELECT COUNT(id_pallet) AS ct FROM pallet WHERE id_pallet IN 
        (SELECT id_pallet FROM pallet WHERE nomor_po IS NOT NULL)
        GROUP BY nomor_po) temp");
    }

    public function jumlah_pakan()
    {
        return $this->db->query("SELECT kode_pakan, SUM(qty) as jumlah FROM pallet WHERE kode_pakan IS NOT NULL GROUP BY kode_pakan ORDER BY SUM(qty) DESC");
    }
}
