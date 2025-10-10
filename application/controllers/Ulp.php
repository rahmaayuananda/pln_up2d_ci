<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ulp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Jika sudah ada model untuk ULP nanti bisa diaktifkan
        // $this->load->model('Ulp_model');
    }

    public function index()
    {
        $data['judul'] = 'Data ULP';

        // 👉 Data dummy sesuai contoh Rahma
        $data['ulp'] = [
            ['UP3_2D' => 'UP2D.6456', 'CXUNIT' => 'ULP.18260', 'NAMA_ULP' => 'BAGAN BATU'],
            ['UP3_2D' => 'UP2D.6456', 'CXUNIT' => 'ULP.18250', 'NAMA_ULP' => 'DUMAI KOTA'],
            ['UP3_2D' => 'UP2D.6456', 'CXUNIT' => 'ULP.18210', 'NAMA_ULP' => 'DURI'],
            ['UP3_2D' => 'ULP.18170', 'CXUNIT' => 'ULP.18230', 'NAMA_ULP' => 'BENGKALIS'],
            ['UP3_2D' => 'UP3.6411', 'CXUNIT' => 'ULP.18240', 'NAMA_ULP' => 'SELATPANJANG'],
            ['UP3_2D' => 'UP3.6412', 'CXUNIT' => 'ULP.18430', 'NAMA_ULP' => 'KUALA ENOK'],
        ];

        // Panggil view
        $this->load->view('layout/header');
        $this->load->view('ulp/vw_ulp', $data);
        $this->load->view('layout/footer');
    }
}
