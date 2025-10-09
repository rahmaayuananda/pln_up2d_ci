<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Up3 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Jika nanti ada model, bisa load di sini:
        // $this->load->model('Up3_model');
    }

    public function index()
    {
        $data['judul'] = 'Data UP3';

        // 👉 Sementara ini buat data dummy (biar tidak error)
        $data['up3'] = [
            ['UP3_2D' => 'UP3_R1', 'NAMA_UP3' => 'Pekanbaru'],
            ['UP3_2D' => 'UP3_R2', 'NAMA_UP3' => 'Dumai'],
            ['UP3_2D' => 'UP3_R3', 'NAMA_UP3' => 'Bangkinang']
        ];

        $this->load->view('layout/header');
        $this->load->view('up3/vw_up3', $data); // ← kirim variabel ke view
        $this->load->view('layout/footer');
    }
}
