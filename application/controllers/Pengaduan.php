<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Jika nanti butuh model, bisa diload di sini
        // $this->load->model('Pengaduan_model');
    }

    public function index()
    {
        // Judul halaman
        $data['judul'] = 'Data Pengaduan';

        // Tampilkan view vw_pengaduan.php
        // Misal kamu pakai template dashboard (header, sidebar, footer)
        $this->load->view('layout/header', $data);
        $this->load->view('pengaduan/vw_pengaduan', $data);
        $this->load->view('layout/footer');
    }
}
