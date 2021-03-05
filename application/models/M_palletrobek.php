<?php

class M_palletrobek extends CI_Model
{
    public function tambah()
    {
        $data = [
            'id_pallet' => $this->input->post('id_pallet', true),
            'qty' => $this->input->post('qty', true),
        ];

        // cek pallet apakah NULL / tidak (kalau NULL gbisa timpa bag ecer)
        $cek = $this->db->query("SELECT * FROM pallet where id_pallet='" . $this->input->post('id_pallet') . "' AND qty IS NOT NULL");
        if ($cek->num_rows() >= 1) {
            return $this->db->query("UPDATE pallet  SET qty = qty + '" . $data['qty'] . "' WHERE id_pallet = '" . $data['id_pallet'] . "'");
        } else {
            $this->session->set_flashdata('gagal', '<div class="alert alert-success" role="alert">
            </div>');
            redirect('palletrobek');
        }
    }
}
