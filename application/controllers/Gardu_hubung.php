<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_hubung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gardu_hubung_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Data Gardu Hubung';
        $data['gardu_hubung'] = $this->Gardu_hubung_model->get_all_gardu_hubung();

        $this->load->view('layout/header');
        $this->load->view('gardu_hubung/vw_gardu_hubung', $data);
        $this->load->view('layout/footer');
    }
}
