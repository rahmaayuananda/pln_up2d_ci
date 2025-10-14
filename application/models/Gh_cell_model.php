<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gh_cell_model extends CI_Model
{
    private $table = 'gh_cell'; // Nama tabel di database

    // Mengambil semua data dari tabel gh_cell
    public function get_all_gh_cell()
    {
        return $this->db->get($this->table)->result_array();
    }

    // Mengambil data gh_cell berdasarkan SSOTNUMBER_GH_CELL
    public function get_gh_cell_by_id($ssotnumber)
    {
        return $this->db->get_where($this->table, ['SSOTNUMBER_GH_CELL' => $ssotnumber])->row_array();
    }

    // Menambahkan data baru ke tabel gh_cell
    public function insert_gh_cell($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Memperbarui data gh_cell berdasarkan SSOTNUMBER_GH_CELL
    public function update_gh_cell($ssotnumber, $data)
    {
        $this->db->where('SSOTNUMBER_GH_CELL', $ssotnumber);
        return $this->db->update($this->table, $data);
    }

    // Menghapus data gh_cell berdasarkan SSOTNUMBER_GH_CELL
    public function delete_gh_cell($ssotnumber)
    {
        $this->db->where('SSOTNUMBER_GH_CELL', $ssotnumber);
        return $this->db->delete($this->table);
    }
}
