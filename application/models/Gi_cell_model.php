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

    // Mengambil data gi_cell berdasarkan ID (misalnya kolom ID_CELL sebagai primary key)
    public function get_gi_cell_by_id($id)
    {
        return $this->db->get_where($this->table, ['ID_CELL' => $id])->row_array();
    }

    // Menambahkan data baru ke tabel gi_cell
    public function insert_gi_cell($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Memperbarui data gi_cell berdasarkan ID
    public function update_gi_cell($id, $data)
    {
        $this->db->where('ID_CELL', $id);
        return $this->db->update($this->table, $data);
    }

    // Menghapus data gi_cell berdasarkan ID
    public function delete_gi_cell($id)
    {
        $this->db->where('ID_CELL', $id);
        return $this->db->delete($this->table);
    }
}
