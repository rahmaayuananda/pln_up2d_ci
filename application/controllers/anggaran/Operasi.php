<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** @property Progress_kontrak_op_model $progress_kontrak_model */
/** @property Rekomposisi_op_model $rekomposisi_model */
/** @property Monitoring_op_model $monitoring_model */
class Operasi extends CI_Controller {
    /** @var Progress_kontrak_op_model */
    public $progress_kontrak_model;
    /** @var Rekomposisi_op_model */
    public $rekomposisi_model;
    /** @var Monitoring_op_model */
    public $monitoring_model;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Progress_kontrak_op_model', 'progress_kontrak_model');
        $this->load->model('Rekomposisi_op_model', 'rekomposisi_model');
        $this->load->model('Monitoring_op_model', 'monitoring_model');
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
            $result = $this->progress_kontrak_model->get_table_data(200);
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

    public function rekomposisi()
    {
        // For now reuse the same layout as progress_kontrak but with a different title
        $data['title'] = 'Rekomposisi';
        $data['icon'] = 'fa-cogs text-success';
        try {
            $result = $this->rekomposisi_model->get_table_data(200);
            $data['fields'] = $result['fields'];
            $data['rows'] = $result['rows'];
        } catch (Exception $e) {
            $data['fields'] = [];
            $data['rows'] = [];
            $data['error'] = $e->getMessage();
        }
        $this->load->view('layout/header');
        $this->load->view('anggaran/operasi/rekomposisi', $data);
        $this->load->view('layout/footer');
    }

    public function monitoring()
    {
        $data['title'] = 'Monitoring';
        $data['icon'] = 'fa-cogs text-success';
        try {
            $result = $this->monitoring_model->get_table_data(500);
            $data['fields'] = $result['fields'];
            $data['rows'] = $result['rows'];
        } catch (Exception $e) {
            $data['fields'] = [];
            $data['rows'] = [];
            $data['error'] = $e->getMessage();
        }
        $this->load->view('layout/header');
        $this->load->view('anggaran/operasi/monitoring', $data);
        $this->load->view('layout/footer');
    }

}
