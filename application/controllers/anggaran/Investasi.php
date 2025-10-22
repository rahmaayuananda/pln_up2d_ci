<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/** @property Progress_kontrak_inv_model $progress_kontrak_model */
/** @property Rekomposisi_inv_model $rekomposisi_model */
/** @property Monitoring_inv_model $monitoring_model */
class Investasi extends CI_Controller {
    /** @var Progress_kontrak_inv_model */
    public $progress_kontrak_model;
    /** @var Rekomposisi_inv_model */
    public $rekomposisi_model;
    /** @var Monitoring_inv_model */
    public $monitoring_model;

    public function __construct()
    {
        parent::__construct();
        // load models with aliases to satisfy static analysis and make runtime property explicit
        $this->load->model('Progress_kontrak_inv_model', 'progress_kontrak_model');
        $this->load->model('Rekomposisi_inv_model', 'rekomposisi_model');
        $this->load->model('Monitoring_inv_model', 'monitoring_model');
        $this->load->helper('url');
    }

    public function progress_kontrak()
    {
        $data['title'] = 'Progress Kontrak';
        $data['icon'] = 'fa-building text-success';

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
        $this->load->view('anggaran/investasi/progress_kontrak', $data);
        $this->load->view('layout/footer');
    }

    public function rekomposisi()
    {
        $data['title'] = 'Rekomposisi';
        $data['icon'] = 'fa-building text-success';
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
        $this->load->view('anggaran/investasi/rekomposisi', $data);
        $this->load->view('layout/footer');
    }

    public function monitoring()
    {
        $data['title'] = 'Monitoring';
        $data['icon'] = 'fa-building text-success';
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
        $this->load->view('anggaran/investasi/monitoring', $data);
        $this->load->view('layout/footer');
    }

}
