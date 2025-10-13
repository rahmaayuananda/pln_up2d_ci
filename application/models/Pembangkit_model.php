<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembangkit_model extends CI_Model
{
    private $table = 'pembangkit'; // Nama tabel di database

    // Mengambil semua data dari tabel pembangkit
    public function get_all_pembangkit()
    {
        return $this->db->get($this->table)->result_array();
    }

    // Mengambil data pembangkit berdasarkan ID
    public function get_pembangkit_by_id($id)
    {
        return $this->db->get_where($this->table, ['ID_PEMBANGKIT' => $id])->row_array();
    }

    // Menambahkan data baru ke tabel pembangkit
    public function insert_pembangkit($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Memperbarui data pembangkit berdasarkan ID
    public function update_pembangkit($id, $data)
    {
        $this->db->where('ID_PEMBANGKIT', $id);
        return $this->db->update($this->table, $data);
    }

    // Menghapus data pembangkit berdasarkan ID
    public function delete_pembangkit($id)
    {
        $this->db->where('ID_PEMBANGKIT', $id);
        return $this->db->delete($this->table);
    }
}
