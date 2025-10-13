<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ulp_model extends CI_Model
{
    // Nama tabel di database
    private $table = 'ulp';

    // Ambil semua data ULP
    public function get_all_ulp()
    {
        if (!$this->db->table_exists($this->table)) {
            log_message('error', 'Tabel "' . $this->table . '" tidak ditemukan. Periksa skema database Anda.');
            return [];
        }
        return $this->db->get($this->table)->result_array();
    }

    // Ambil data ULP berdasarkan ID (misalnya CXUNIT)
    public function get_ulp_by_id($cxunit)
    {
        if (!$this->db->table_exists($this->table)) {
            return null;
        }
        return $this->db->get_where($this->table, ['CXUNIT' => $cxunit])->row_array();
    }

    // Tambah data baru
    public function insert_ulp($data)
    {
        if (!$this->db->table_exists($this->table)) {
            return false;
        }
        return $this->db->insert($this->table, $data);
    }

    // Update data
    public function update_ulp($cxunit, $data)
    {
        if (!$this->db->table_exists($this->table)) {
            return false;
        }
        $this->db->where('CXUNIT', $cxunit);
        return $this->db->update($this->table, $data);
    }

    // Hapus data
    public function delete_ulp($cxunit)
    {
        if (!$this->db->table_exists($this->table)) {
            return false;
        }
        $this->db->where('CXUNIT', $cxunit);
        return $this->db->delete($this->table);
    }
}
