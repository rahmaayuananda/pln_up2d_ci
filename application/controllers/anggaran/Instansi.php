<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Anggaran_inv_model');
		$this->load->helper('url');
	}

	/**
	 * Show Progress Kontrak table for Anggaran Investasi -> Instansi
	 */
	public function progress_kontrak()
	{
		$data['title'] = 'Progress Kontrak';
		$data['icon'] = 'fa-building text-success';

		try {
			$result = $this->Anggaran_inv_model->get_table_data(200);
			$data['fields'] = $result['fields'];
			$data['rows'] = $result['rows'];
		} catch (Exception $e) {
			$data['fields'] = [];
			$data['rows'] = [];
			$data['error'] = $e->getMessage();
		}

		$this->load->view('layout/header');
		$this->load->view('anggaran/instansi/progress_kontrak', $data);
		$this->load->view('layout/footer');
	}

}
