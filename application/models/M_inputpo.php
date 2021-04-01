<?php

class M_inputpo extends CI_Model
{

    public function getPallet($id_pallet)
    {
        return $this->db->get_where('pallet', ['id_pallet' => $id_pallet])->row_array();
    }

    public function getNoPO1($nomor_po)
    {
        return $this->db->query("SELECT * FROM pallet WHERE nomor_po = '$nomor_po' ORDER BY nomor_pallet DESC LIMIT 1")->result();
    }

    public function countNoPO1($nomor_po)
    {
        return $this->db->query("SELECT * FROM pallet WHERE nomor_po = '$nomor_po'")->num_rows();
    }

    public function getNoPO()
    {
        return $this->db->query("SELECT nomor_po FROM pallet GROUP BY nomor_po")->result();
    }

    public function getKodePakan($nomor_po)
    {
        return $this->db->query("SELECT * FROM pallet WHERE nomor_po = '$nomor_po'")->row_array();
    }

    public function hitungNoPallet($nomor_po)
    {
        return $this->db->query("SELECT * FROM pallet WHERE nomor_po = '$nomor_po'")->num_rows();
    }

    public function getKodePakanManual()
    {
        return $this->db->query("SELECT * FROM kode_pakan")->result();
    }

    public function sendpo()
    {
        $data = [
            'id_pallet' => $this->input->post('id_pallet', true),
            'nomor_po' => $this->input->post('nomor_po', true),
            'kode_pakan' => $this->input->post('kode_pakan', true),
            'qty' => $this->input->post('qty', true),
            'line_packing' => $this->input->post('line_packing', true),
            'lokasi_gudang' => $this->input->post('lokasi_gudang', true),
            'shift' => $this->input->post('shift', true),
            "waktu_pembuatan"  => date("Y-m-d", strtotime($_POST['waktu_pembuatan'])),
            'nomor_pallet' => $this->input->post('nomor_pallet', true),
            'expired_date' => date("Y-m-d", strtotime($_POST['expired_date'])),
            'operator' => $this->input->post('operator', true),
        ];

        $this->db->where('id_pallet', $this->input->post('id_pallet'));
        $this->db->update('pallet', $data);
    }
}
