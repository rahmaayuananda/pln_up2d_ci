<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Up3_model extends CI_Model
{
    private $table = 'up3';

    public function getAll()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ['UP3_2D' => $id])->row_array();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data)
    {
        $this->db->where('UP3_2D', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('UP3_2D', $id);
        return $this->db->delete($this->table);
    }
}
