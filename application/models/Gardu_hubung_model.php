<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_hubung_model extends CI_Model
{
    private $table = 'gh'; // Nama tabel di database

    // Ambil semua data Gardu Hubung
    public function get_all_gardu_hubung()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_gardu_hubung($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result_array();
    }

    public function count_all_gardu_hubung()
    {
        return $this->db->count_all($this->table);
    }

    // Ambil data Gardu Hubung berdasarkan SSOTNUMBER_GH
    public function get_gardu_hubung_by_id($id)
    {
        return $this->db->get_where($this->table, ['SSOTNUMBER_GH' => $id])->row_array();
    }

    // Tambah data baru
    public function insert_gardu_hubung($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Update data berdasarkan SSOTNUMBER_GH
    public function update_gardu_hubung($id, $data)
    {
        $this->db->where('SSOTNUMBER_GH', $id);
        return $this->db->update($this->table, $data);
    }

    // Hapus data berdasarkan SSOTNUMBER_GH
    public function delete_gardu_hubung($id)
    {
        $this->db->where('SSOTNUMBER_GH', $id);
        return $this->db->delete($this->table);
    }
}
