<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_induk_model extends CI_Model
{
    private $table = 'gi'; // sesuaikan dengan nama tabel di database kamu

    public function get_all_gardu_induk()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function get_gardu_induk_by_id($id)
    {
        return $this->db->get_where($this->table, ['LOCATION' => $id])->row_array();
    }

    public function insert_gardu_induk($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_gardu_induk($id, $data)
    {
        $this->db->where('LOCATION', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_gardu_induk($id)
    {
        $this->db->where('LOCATION', $id);
        return $this->db->delete($this->table);
    }
}
