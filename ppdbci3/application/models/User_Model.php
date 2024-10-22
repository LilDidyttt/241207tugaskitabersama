<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function insert_petugas($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    public function check_username_exists($username)
    {
        $query = $this->db->get_where('tb_user', ['username' => $username]);
        return $query->num_rows() > 0 ? true : false;
    }

    public function get_petugas()
    {
        $this->db->where('level', 'petugas');
        $query = $this->db->get('tb_user');
        $total_rows = $query->num_rows();
        $row = $query->result_array();
        return array($row, $total_rows); // Mengembalikan data dalam bentuk array asosiatif
    }

    public function getPetugasByID($no_daftar)
    {
        return $this->db->get_where('tb_user', ['id_user' => $no_daftar, 'level' => 'petugas'])->row_array();
    }

    public function updatePetugas($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);
    }


    public function login_petugas($username, $password)
    {
        // Ambil user berdasarkan username
        $this->db->where('username', $username);
        $query = $this->db->get('tb_user');

        if ($query->num_rows() == 1) {
            $user = $query->row();

            // Verifikasi password
            if (password_verify($password, $user->password)) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
