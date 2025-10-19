<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kit_cell_model extends CI_Model
{
    private $table = 'kit_cell'; // Nama tabel di database

    // 🔹 Mengambil semua data dari tabel kit_cell
    public function get_all_kit_cell()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_kit_cell($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result_array();
    }

    public function count_all_kit_cell()
    {
        return $this->db->count_all($this->table);
    }

    // 🔹 Mengambil data kit_cell berdasarkan SSOTNUMBER_KIT_CELL (Primary Key)
        // Mengambil data kit_cell berdasarkan SSOTNUMBER (Primary Key)
        public function get_kit_cell_by_id($ssotnumber)
        {
            return $this->db->get_where($this->table, ['SSOTNUMBER' => $ssotnumber])->row_array();
        }

    // 🔹 Menambahkan data baru ke tabel kit_cell
    public function insert_kit_cell($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // 🔹 Memperbarui data kit_cell berdasarkan SSOTNUMBER_KIT_CELL
        // Memperbarui data kit_cell berdasarkan SSOTNUMBER
        public function update_kit_cell($ssotnumber, $data)
        {
            $this->db->where('SSOTNUMBER', $ssotnumber);
            return $this->db->update($this->table, $data);
        }

    // 🔹 Menghapus data kit_cell berdasarkan SSOTNUMBER_KIT_CELL
        // Menghapus data kit_cell berdasarkan SSOTNUMBER
        public function delete_kit_cell($ssotnumber)
        {
            $this->db->where('SSOTNUMBER', $ssotnumber);
            return $this->db->delete($this->table);
        }

    // 🔹 (Opsional) Mengambil data dengan join ke tabel pembangkit (Foreign Key)
    public function get_kit_cell_with_pembangkit()
    {
        $this->db->select('kit_cell.*, pembangkit.NAMA_PEMBANGKIT');
        $this->db->from($this->table);
        $this->db->join('pembangkit', 'pembangkit.ID_PEMBANGKIT = kit_cell.ID_PEMBANGKIT', 'left');
        return $this->db->get()->result_array();
    }

    // 🔹 (Opsional) Untuk pencarian berdasarkan nama cell
        public function search_kit_cell($keyword)
        {
            $this->db->like('NAMA_CELL', $keyword);
            $this->db->or_like('SSOTNUMBER', $keyword);
            $this->db->or_like('PEMBANGKIT', $keyword);
            return $this->db->get($this->table)->result_array();
        }
}
