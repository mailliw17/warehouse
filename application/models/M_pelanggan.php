<?php

class M_pelanggan extends CI_Model
{
    public function tampilpelanggan()
    {
        $query = $this->db->query("SELECT * FROM pelanggan");
        return $query->result_array();
    }

    public function tambahpelanggan()
    {
        $data = [
            "nama_pelanggan" => $this->input->post('nama_pelanggan', true)
        ];

        $this->db->insert('pelanggan', $data);
    }

    public function hapuspelanggan($id_pelanggan)
    {
        $this->db->query("DELETE FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
    }
}
