<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemutus_model extends CI_Model
{
    private $table = 'lbs_recloser'; // Nama tabel di database

    // 🔹 Mengambil semua data dari tabel lbs_recloser
    public function get_all_pemutus()
    {
        return $this->db->get($this->table)->result_array();
    }

    // 🔹 Mengambil data pemutus berdasarkan SSOTNUMBER_LBSREC (Primary Key)
    public function get_pemutus_by_id($ssotnumber)
    {
        return $this->db->get_where($this->table, ['SSOTNUMBER_LBSREC' => $ssotnumber])->row_array();
    }

    // 🔹 Menambahkan data baru ke tabel lbs_recloser
    public function insert_pemutus($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // 🔹 Memperbarui data pemutus berdasarkan SSOTNUMBER_LBSREC
    public function update_pemutus($ssotnumber, $data)
    {
        $this->db->where('SSOTNUMBER_LBSREC', $ssotnumber);
        return $this->db->update($this->table, $data);
    }

    // 🔹 Menghapus data pemutus berdasarkan SSOTNUMBER_LBSREC
    public function delete_pemutus($ssotnumber)
    {
        $this->db->where('SSOTNUMBER_LBSREC', $ssotnumber);
        return $this->db->delete($this->table);
    }

    // 🔹 (Opsional) Mengambil data dengan join ke tabel unit_layanan (jika ada relasi)
    public function get_pemutus_with_unit()
    {
        $this->db->select('lbs_recloser.*, ulp.NAMA_ULP');
        $this->db->from($this->table);
        $this->db->join('ulp', 'ulp.CXUNIT = lbs_recloser.UNIT_LAYANAN', 'left');
        return $this->db->get()->result_array();
    }

    // 🔹 (Opsional) Untuk pencarian berdasarkan nama keypoint atau penyulang
    public function search_pemutus($keyword)
    {
        $this->db->like('KEYPOINT', $keyword);
        $this->db->or_like('PENYULANG', $keyword);
        $this->db->or_like('SSOTNUMBER_LBSREC', $keyword);
        return $this->db->get($this->table)->result_array();
    }
}
