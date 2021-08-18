<?php

class M_petalokasigudang extends CI_Model
{
    public function tampillokasigudang()
    {
        return $this->db->query("SELECT * FROM peta_lokasi_gudang")->result_array();
    }

    public function tambahlokasi()
    {
        $data = [
            "line_gudang" => $this->input->post('line_gudang', true),
            "kapasitas_pallet" => $this->input->post('kapasitas_pallet', true)
        ];

        $this->db->insert('peta_lokasi_gudang', $data);
    }

    public function hapuslokasi($id)
    {
        $this->db->query("DELETE FROM peta_lokasi_gudang WHERE id='$id'");
    }

    public function ambildata1lokasi($id)
    {
        return $this->db->query("SELECT * FROM peta_lokasi_gudang WHERE id = '$id'")->row_array();
    }

    public function editlokasi()
    {
        $data = [
            "line_gudang" => $this->input->post('line_gudang', true),
            "kapasitas_pallet" => $this->input->post('kapasitas_pallet', true),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('peta_lokasi_gudang', $data);
    }
}
