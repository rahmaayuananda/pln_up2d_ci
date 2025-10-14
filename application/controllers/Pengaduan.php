<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Pengaduan_model');
        // Load helper untuk form dan URL
        $this->load->helper(['form', 'url']);
        // Load library untuk upload dan validasi form
        $this->load->library(['form_validation', 'upload']);
    }

    // 🔹 Halaman utama - menampilkan semua data pengaduan
    public function index()
    {
        $data['judul'] = 'Data Pengaduan';
        $data['pengaduan'] = $this->Pengaduan_model->get_all_pengaduan();

        $this->load->view('layout/header', $data);
        $this->load->view('pengaduan/vw_pengaduan', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Fungsi untuk menampilkan form tambah pengaduan
    public function tambah()
    {
        $data['judul'] = 'Tambah Pengaduan';

        // Validasi form
        $this->form_validation->set_rules('NAMA_UP3', 'Nama UP3', 'required');
        $this->form_validation->set_rules('TANGGAL_PENGADUAN', 'Tanggal Pengaduan', 'required');
        $this->form_validation->set_rules('JENIS_PENGADUAN', 'Jenis Pengaduan', 'required');
        $this->form_validation->set_rules('LAPORAN', 'Laporan', 'required');

        if ($this->form_validation->run() == false) {
            // Jika form belum disubmit / validasi gagal
            $this->load->view('layout/header', $data);
            $this->load->view('pengaduan/vw_tambah_pengaduan', $data);
            $this->load->view('layout/footer');
        } else {
            // Konfigurasi upload foto pengaduan
            $config['upload_path']   = './uploads/pengaduan/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048; // maksimal 2 MB
            $config['encrypt_name']  = TRUE; // ubah nama file agar unik

            // Pastikan folder upload ada
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, TRUE);
            }

            $this->upload->initialize($config);
            $foto_pengaduan = null;
            $foto_proses = null;

            // Upload FOTO_PENGADUAN
            if (!empty($_FILES['FOTO_PENGADUAN']['name'])) {
                if ($this->upload->do_upload('FOTO_PENGADUAN')) {
                    $foto_data = $this->upload->data();
                    $foto_pengaduan = $foto_data['file_name'];
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('layout/header', $data);
                    $this->load->view('pengaduan/vw_tambah_pengaduan', $data);
                    $this->load->view('layout/footer');
                    return;
                }
            }

            // Upload FOTO_PROSES
            if (!empty($_FILES['FOTO_PROSES']['name'])) {
                if ($this->upload->do_upload('FOTO_PROSES')) {
                    $foto_data = $this->upload->data();
                    $foto_proses = $foto_data['file_name'];
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('layout/header', $data);
                    $this->load->view('pengaduan/vw_tambah_pengaduan', $data);
                    $this->load->view('layout/footer');
                    return;
                }
            }

            // Data yang akan disimpan
            $insert_data = [
                'NAMA_UP3'          => $this->input->post('NAMA_UP3', true),
                'TANGGAL_PENGADUAN' => $this->input->post('TANGGAL_PENGADUAN', true),
                'JENIS_PENGADUAN'   => $this->input->post('JENIS_PENGADUAN', true),
                'LAPORAN'           => $this->input->post('LAPORAN', true),
                'FOTO_PENGADUAN'    => $foto_pengaduan,
                'TANGGAL_PROSES'    => $this->input->post('TANGGAL_PROSES', true),
                'FOTO_PROSES'       => $foto_proses,
                'STATUS'            => $this->input->post('STATUS', true),
                'PIC'               => $this->input->post('PIC', true),
            ];

            // Simpan ke database
            $this->Pengaduan_model->insert_pengaduan($insert_data);

            // Redirect ke halaman utama
            $this->session->set_flashdata('success', 'Data pengaduan berhasil ditambahkan!');
            redirect('pengaduan');
        }
    }
}
