<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['judul'] = "Halaman Dashboard";
        $this->load->view("layout/header");
        $this->load->view("dashboard/vw_dashboard.php", $data);
        $this->load->view("layout/footer");
    }
}