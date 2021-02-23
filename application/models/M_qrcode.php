<?php

class M_qrcode extends CI_Model
{
    public function tampilqrcode()
    {
        $query = $this->db->query("SELECT * FROM pallet ORDER BY tanggal_pallet DESC");
        return $query->result_array();
    }

    public function tambahqrcode($data)
    {
        $query = $this->db->insert('pallet', $data);
        return $query;
    }

    public function hapusqrcode($id_pallet)
    {
        $this->db->query("DELETE FROM pallet WHERE id_pallet='$id_pallet' ");
    }

    public function kirim($id_pallet)
    {
        $this->db->query("UPDATE pallet SET print = 1 WHERE id_pallet='$id_pallet'");
    }

    public function getDetail($id_pallet)
    {
        return $this->db->get_where('pallet', ['id_pallet' => $id_pallet])->row_array();
    }
}
