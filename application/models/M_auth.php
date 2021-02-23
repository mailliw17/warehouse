<?php

class M_auth extends CI_Model
{
    public function auth_user($username, $password)
    {
        $query = $this->db->query("SELECT * FROM user WHERE username='$username' AND password=MD5('$password') LIMIT 1");
        return $query;
    }

    public function register($data)
    {
        $query = $this->db->insert('user', $data);
        return $query;
    }

    public function kelolaakun()
    {
        $this->db->where('role', 'Operator Packing');
        $this->db->or_where('role', 'Juru Muat');
        return $this->db->get('user');
    }

    public function hapusakun($id_user)
    {
        $this->db->query("DELETE FROM user WHERE id_user='$id_user'");
    }

    public function ambildataoperator($id_user)
    {
        return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    }

    public function gantipasswordoperator()
    {
        $data = [
            'password' => md5($this->input->post('password', true)),
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }
}
