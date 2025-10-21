<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggaran_op_model');
        $this->load->helper('url');
    }

    /**
     * Show Progress Kontrak table for Anggaran Operasi
     */
    public function progress_kontrak()
    {
        $data['title'] = 'Progress Kontrak';
        $data['icon'] = 'fa-cogs text-success';

        try {
            $result = $this->Anggaran_op_model->get_table_data(200);
            $data['fields'] = $result['fields'];
            $data['rows'] = $result['rows'];
        } catch (Exception $e) {
            $data['fields'] = [];
            $data['rows'] = [];
            $data['error'] = $e->getMessage();
        }

        $this->load->view('layout/header');
        $this->load->view('anggaran/operasi/progress_kontrak', $data);
        $this->load->view('layout/footer');
    }

}
