<?php

class M_fifo extends CI_Model
{
    public function tampilsemuapakan()
    {
        return $this->db->query("SELECT * FROM pallet WHERE kode_pakan IS NOT NULL AND qty != 0 ORDER BY waktu_pembuatan ASC")->result_array();
    }

    public function ambilIDPallet($tabel, $where)
    {
        return $this->db->get_where($tabel, $where);
    }

    public function tampilChecker()
    {
        return $this->db->query("SELECT nomor_do, kode_pakan, lokasi_gudang, qty FROM checker")->result_array();
    }
    public function pakanTerpilih($nomor_do)
    {
        return $this->db->query("SELECT * FROM checker WHERE nomor_do='$nomor_do' ORDER BY kode_pakan")->result_array();
    }

    // public function updateBag($id_pallet, $qty)
    // {
    //     return $this->db->query("UPDATE pallet SET qty = qty - '$qty' WHERE id_pallet='$id_pallet'");
    // }

    public function sendchecker()
    {
        $data = [
            'nomor_do' => $this->input->post('nomor_do', true),
            'id_pallet' => $this->input->post('id_pallet', true),
            'nomor_po' => $this->input->post('nomor_po', true),
            'kode_pakan' => $this->input->post('kode_pakan', true),
            'lokasi_gudang' => $this->input->post('lokasi_gudang', true),
            "waktu_pembuatan"  => date("Y-m-d H:i:s", strtotime($_POST['waktu_pembuatan'])),
            "waktu_checker" => date("Y-m-d H:i:s", strtotime($_POST['waktu_checker'])),
            'expired_date' => date("Y-m-d", strtotime($_POST['expired_date'])),
            'qty' => $this->input->post('qty', true),
        ];

        $this->db->insert('checker', $data);
    }

    public function ambilBagIni($data)
    {
        $this->db->insert('checker', $data);
    }
}
