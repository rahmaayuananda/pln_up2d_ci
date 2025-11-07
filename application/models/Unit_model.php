<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit_model extends CI_Model
{
    private $table = 'unit';

    // Ambil semua data dengan paginasi
    public function get_unit($limit, $offset)
    {
        // Tambahkan order_by agar data terbaru (ID besar) tampil di atas
        $this->db->order_by('ID_UNIT', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result_array();
    }

    // Hitung semua data
    public function count_all_unit()
    {
        return $this->db->count_all($this->table);
    }

    // Ambil data berdasarkan ID
    public function get_unit_by_id($id)
    {
        return $this->db->get_where($this->table, ['ID_UNIT' => $id])->row_array();
    }

    // Tambah data baru
    public function insert_unit($data)
    {
        // Pastikan ID_UNIT tidak dikirim manual
        if (isset($data['ID_UNIT'])) {
            unset($data['ID_UNIT']);
        }

        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
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

    // Ambil semua data tanpa paginasi (untuk export/download)
    public function get_all_units()
    {
        // Tambahkan order_by agar urutan export sama (terbaru dulu)
        $this->db->order_by('ID_UNIT', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    // Return the underlying table name (useful for export filenames)
    public function get_table_name()
    {
        return $this->table;
    }
}
