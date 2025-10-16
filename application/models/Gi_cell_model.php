<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gi_cell_model extends CI_Model
{
    private $table = 'gi_cell'; // Nama tabel di database

    // Mengambil semua data dari tabel gi_cell
    public function get_all_gi_cell()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_gi_cell($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result_array();
    }

    public function count_all_gi_cell()
    {
        return $this->db->count_all($this->table);
    }

    // Mengambil data gi_cell berdasarkan SSOTNUMBER (primary key business)
    public function get_gi_cell_by_id($ssotnumber)
    {
        return $this->db->get_where($this->table, ['SSOTNUMBER' => $ssotnumber])->row_array();
    }

    // Menambahkan data baru ke tabel gi_cell
    public function insert_gi_cell($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Memperbarui data gi_cell berdasarkan SSOTNUMBER
    public function update_gi_cell($ssotnumber, $data)
    {
        $this->db->where('SSOTNUMBER', $ssotnumber);
        return $this->db->update($this->table, $data);
    }

    // Menghapus data gi_cell berdasarkan SSOTNUMBER
    public function delete_gi_cell($ssotnumber)
    {
        $this->db->where('SSOTNUMBER', $ssotnumber);
        return $this->db->delete($this->table);
    }
}
