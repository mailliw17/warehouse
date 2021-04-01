<?php

class M_gudangrpk extends CI_Model
{
    public function moveToRPK($id_pallet, $kode_pakan, $waktu_pembuatan, $expired_date, $qty)
    {
        $this->db->query("INSERT INTO gudang_rpk (id_pallet, kode_pakan, waktu_pembuatan, expired_date, qty) VALUES ('$id_pallet', '$kode_pakan', '$waktu_pembuatan', '$expired_date', '$qty') ");
    }

    public function tampilrobek()
    {
        return $this->db->query("SELECT * FROM gudang_rpk ORDER BY waktu_pembuatan ASC")->result_array();
    }

    public function pindahkepallet()
    {
        $data = [
            'id_pallet' => $this->input->post('id_pallet', true),
            'id_pallet_rpk' => $this->input->post('id_pallet_rpk', true),
            'qty_rpk' => $this->input->post('qty_rpk', true),
            'kode_pakan' => $this->input->post('kode_pakan', true),
        ];

        // query untuk mengecek
        $cek = $this->db->query("SELECT * FROM pallet where id_pallet='" . $data['id_pallet'] . "'");

        if (($cek->num_rows() == 1) && ($data['kode_pakan'] == $cek->row_array()['kode_pakan'])) {
            // kalau benar
            $this->db->query("UPDATE pallet  SET qty = qty + '" . $data['qty_rpk'] . "' WHERE id_pallet = '" . $data['id_pallet'] . "'");

            $this->db->query("DELETE FROM gudang_rpk  WHERE id_pallet = '" . $data['id_pallet_rpk'] . "'");

            $this->session->set_flashdata('selesaitimpa', '<div class="alert alert-success" role="alert">
            </div>');
            redirect('dashboard');
        } else if ($cek->num_rows() == 0) {
            // kalau pallet tidak terdaftar

            $this->session->set_flashdata('pallettidakada', '<div class="alert alert-success" role="alert">
            </div>');
            redirect('gudangrpk');
        } else  if ($cek->row_array()['qty'] == null) {
            // kalau pallet masih kosong dan tidak bisa ditimpa

            $this->session->set_flashdata('gagal', '<div class="alert alert-success" role="alert">
            </div>');
            redirect('gudangrpk');
        } else if ($data['kode_pakan'] != $cek->row_array()['kode_pakan']) {
            // kalau beda kodepakan
            $this->session->set_flashdata('bedakodepakan', '<div class="alert alert-success" role="alert">
            </div>');
            redirect('gudangrpk');
        }
    }

    public function selesairepack()
    {
        // $data = [
        //     'id_pallet' => $this->input->post('id_pallet', true),
        //     'qty_rpk' => $this->input->post('qty_rpk', true),
        // ];

        $id =  $this->input->post('id_pallet');
        $qty =  $this->input->post('qty_rpk');

        $this->db->query("UPDATE gudang_rpk SET qty_rpk = '$qty' WHERE id_pallet = '$id'");

        $this->session->set_flashdata('berhasil-repack', '<div class="alert alert-success" role="alert">
        </div>');
    }

    public function tampilInfoRPK($id_pallet)
    {
        return $this->db->query("SELECT id_pallet,qty_rpk, kode_pakan FROM gudang_rpk WHERE id_pallet = '$id_pallet'")->row_array();
    }
}
