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

    public function login_user($username, $password)
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
