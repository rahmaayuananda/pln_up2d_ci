<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    private $table = 'unit';

    // Ambil semua data
    public function get_all_unit()
    {
        return $this->db->get($this->table)->result_array();
    }

    // Ambil data berdasarkan ID
    public function get_unit_by_id($id)
    {
        return $this->db->get_where($this->table, ['ID_UNIT' => $id])->row_array();
    }

    // Tambah data baru
    public function insert_unit($data)
    {
        $this->db->insert($this->table, $data);
    }

    // Update data
    public function update_unit($id, $data)
    {
        $this->db->where('ID_UNIT', $id);
        $this->db->update($this->table, $data);
    }

    // Hapus data
    public function delete_unit($id)
    {
        $this->db->where('ID_UNIT', $id);
        $this->db->delete($this->table);
    }
}
