<?php

class M_kodepakan extends CI_Model
{
    public function tampilkodepakan()
    {
        $query = $this->db->query("SELECT * FROM kode_pakan");
        return $query->result_array();
    }

    public function tambahkodepakan()
    {
        $data = [
            "nama_pakan" => $this->input->post('nama_pakan', true)
        ];

        $this->db->insert('kode_pakan', $data);
    }

    public function hapuskodepakan($id_pakan)
    {
        $this->db->query("DELETE FROM kode_pakan WHERE id_pakan='$id_pakan'");
    }
}
