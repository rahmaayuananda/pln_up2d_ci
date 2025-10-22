<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomposisi_inv_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_table_data($limit = 200)
    {
        $table = 'rekomposisi_inv';
        if (!$this->db->table_exists($table)) {
            throw new Exception('Table ' . $table . ' does not exist');
        }
        $fields = $this->db->list_fields($table);
        $query = $this->db->limit((int)$limit)->get($table);
        $rows = $query->result_array();
        return ['fields' => $fields, 'rows' => $rows];
    }
}
