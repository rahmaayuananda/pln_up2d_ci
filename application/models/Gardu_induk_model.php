<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_induk_model extends CI_Model
{
    private $table = 'gi'; // sesuaikan dengan nama tabel di database kamu

    public function get_all_gardu_induk()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_gardu_induk($limit, $offset)
    {
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result_array();
    }

    public function count_all_gardu_induk()
    {
        return $this->db->count_all($this->table);
    }

    public function get_gardu_induk_by_id($ssotnumber)
    {
        return $this->db->get_where($this->table, ['SSOTNUMBER' => $ssotnumber])->row_array();
    }

    public function insert_gardu_induk($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_gardu_induk($ssotnumber, $data)
    {
        $this->db->where('SSOTNUMBER', $ssotnumber);
        return $this->db->update($this->table, $data);
    }

    public function delete_gardu_induk($ssotnumber)
    {
        $this->db->where('SSOTNUMBER', $ssotnumber);
        return $this->db->delete($this->table);
    }
}
