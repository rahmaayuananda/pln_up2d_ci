<?php
defined('BASEPATH') or exit('No direct script acces allowed');

class Gardu_induk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['judul'] = "Halaman Gardu Induk";
        $this->load->view("layout/header");
        $this->load->view("gardu_induk/vw_gardu_induk.php", $data);
        $this->load->view("layout/footer");
    }
}