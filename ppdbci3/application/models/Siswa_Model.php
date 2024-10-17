<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_Model extends CI_Model
{
    //Login Siswa
    public function login_siswa($nisn, $tanggal_lahir)
    {
        $this->db->where('nisn', $nisn);
        $this->db->where('tgl_lahir', $tanggal_lahir);
        $query = $this->db->get('tb_calonsiswa');
        return $query->row(); // Mengembalikan satu baris data
    }

    // Mendapatkan semua data siswa
    public function get_siswa()
    {
        $query = $this->db->get('tb_calonsiswa');
        $total_rows = $query->num_rows();
        $row = $query->result_array();
        return array($row, $total_rows); // Mengembalikan data dalam bentuk array asosiatif
    }

    // Menyimpan data siswa ke database
    public function insert($data)
    {
        return $this->db->insert('tb_calonsiswa', $data);
    }

    // Mendapatkan siswa berdasarkan no_daftar
    public function getByNoDaftar($no_daftar)
    {
        return $this->db->get_where('tb_calonsiswa', ['no_daftar' => $no_daftar])->row_array();
    }

    // Menghapus siswa berdasarkan no_daftar
    public function deleteByNoDaftar($no_daftar)
    {
        $this->db->where('no_daftar', $no_daftar);
        return $this->db->delete('tb_calonsiswa');
    }

    // Mengupdate data siswa berdasarkan no_daftar
    public function update($no_daftar, $data)
    {
        $this->db->where('no_daftar', $no_daftar);
        return $this->db->update('tb_calonsiswa', $data);
    }
}
