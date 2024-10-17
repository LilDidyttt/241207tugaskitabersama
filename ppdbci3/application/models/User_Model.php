<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function insert_petugas($data)
    {
        return $this->db->insert('tb_user', $data);
    }

    public function cek_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('tb_user'); // ganti 'users' dengan nama tabel yang sesuai
        if ($query->num_rows() > 0) {
            return true; // Username sudah ada
        } else {
            return false; // Username belum digunakan
        }
    }
}
