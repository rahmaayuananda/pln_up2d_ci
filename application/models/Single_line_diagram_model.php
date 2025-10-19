<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Single_line_diagram_model extends CI_Model
{
    private $table = 'single_line_diagram'; // huruf kecil sesuai database

    public function get_all_sld()
    {
        $this->db->order_by('CREATED_AT', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    public function get_sld($limit, $offset)
    {
        $this->db->order_by('CREATED_AT', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get($this->table)->result_array();
    }

    public function count_all_sld()
    {
        return $this->db->count_all($this->table);
    }

    public function get_sld_by_id($id)
    {
        return $this->db->get_where($this->table, ['ID_SLD' => $id])->row_array();
    }

    public function insert_sld($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_sld($id, $data)
    {
        $this->db->where('ID_SLD', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_sld($id)
    {
        $this->db->where('ID_SLD', $id);
        return $this->db->delete($this->table);
    }
}
