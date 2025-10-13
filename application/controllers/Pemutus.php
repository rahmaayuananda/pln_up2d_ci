<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemutus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model Pemutus_model
        $this->load->model('Pemutus_model');
        // Load helper dan library
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    // 🔹 Halaman utama - tampilkan semua data Pemutus (LBS Recloser)
    public function index()
    {
        $data['title'] = 'Data Pemutus (LBS Recloser)';
        $data['pemutus'] = $this->Pemutus_model->get_all_pemutus();

        $this->load->view('layout/header');
        $this->load->view('pemutus/vw_pemutus', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Tambah data baru
    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'SSOTNUMBER_LBSREC' => $this->input->post('SSOTNUMBER_LBSREC'),
                'UNIT_LAYANAN'      => $this->input->post('UNIT_LAYANAN'),
                'PENYULANG'         => $this->input->post('PENYULANG'),
                'KEYPOINT'          => $this->input->post('KEYPOINT'),
                'FUNGSI_KP'         => $this->input->post('FUNGSI_KP'),
                'STATUS_SCADA'      => $this->input->post('STATUS_SCADA'),
                'MEDIA_KOMDAT'      => $this->input->post('MEDIA_KOMDAT'),
                'MERK_KOMDAT'       => $this->input->post('MERK_KOMDAT')
            ];

            $this->Pemutus_model->insert_pemutus($insertData);
            $this->session->set_flashdata('success', 'Data Pemutus berhasil ditambahkan!');
            redirect('Pemutus');
        } else {
            $data['title'] = 'Tambah Data Pemutus';
            $this->load->view('layout/header');
            $this->load->view('pemutus/vw_tambah_pemutus', $data);
            $this->load->view('layout/footer');
        }
    }

    // 🔹 Edit data
    public function edit($ssotnumber)
    {
        $data['pemutus'] = $this->Pemutus_model->get_pemutus_by_id($ssotnumber);
        if (empty($data['pemutus'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'UNIT_LAYANAN' => $this->input->post('UNIT_LAYANAN'),
                'PENYULANG'    => $this->input->post('PENYULANG'),
                'KEYPOINT'     => $this->input->post('KEYPOINT'),
                'FUNGSI_KP'    => $this->input->post('FUNGSI_KP'),
                'STATUS_SCADA' => $this->input->post('STATUS_SCADA'),
                'MEDIA_KOMDAT' => $this->input->post('MEDIA_KOMDAT'),
                'MERK_KOMDAT'  => $this->input->post('MERK_KOMDAT')
            ];

            $this->Pemutus_model->update_pemutus($ssotnumber, $updateData);
            $this->session->set_flashdata('success', 'Data Pemutus berhasil diperbarui!');
            redirect('Pemutus');
        } else {
            $data['title'] = 'Edit Data Pemutus';
            $this->load->view('layout/header');
            $this->load->view('pemutus/vw_edit_pemutus', $data);
            $this->load->view('layout/footer');
        }
    }

    // 🔹 Detail data
    public function detail($ssotnumber)
    {
        $data['pemutus'] = $this->Pemutus_model->get_pemutus_by_id($ssotnumber);
        if (empty($data['pemutus'])) {
            show_404();
        }

        $data['title'] = 'Detail Data Pemutus';
        $this->load->view('layout/header');
        $this->load->view('pemutus/vw_detail_pemutus', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Hapus data
    public function hapus($ssotnumber)
    {
        $this->Pemutus_model->delete_pemutus($ssotnumber);
        $this->session->set_flashdata('success', 'Data Pemutus berhasil dihapus!');
        redirect('Pemutus');
    }
}
