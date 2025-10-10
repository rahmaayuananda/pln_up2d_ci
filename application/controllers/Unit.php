<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Unit_model');
        // Load helper untuk URL
        $this->load->helper(['url', 'form']);
        // Load library session (untuk flashdata)
        $this->load->library('session');
    }

    // Halaman utama - tampilkan semua data
    public function index()
    {
        $data['title'] = 'Data Unit';
        $data['unit'] = $this->Unit_model->get_all_unit();

        $this->load->view('layout/header');
        $this->load->view('unit/vw_unit', $data);
        $this->load->view('layout/footer');
    }

    // Tambah data baru
    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'UNIT_PELAKSANA' => $this->input->post('UNIT_PELAKSANA'),
                'UNIT_LAYANAN' => $this->input->post('UNIT_LAYANAN'),
                'LONGITUDEX' => $this->input->post('LONGITUDEX'),
                'LATITUDEY' => $this->input->post('LATITUDEY'),
                'ADDRESS' => $this->input->post('ADDRESS')
            ];

            $this->Unit_model->insert_unit($insertData);
            $this->session->set_flashdata('success', 'Data Unit berhasil ditambahkan!');
            redirect('Unit');
        } else {
            $data['title'] = 'Tambah Data Unit';
            $this->load->view('layout/header');
            $this->load->view('unit/vw_tambah_unit', $data);
            $this->load->view('layout/footer');
        }
    }

    // Edit data
    public function edit($id)
    {
        $data['unit'] = $this->Unit_model->get_unit_by_id($id);
        if (empty($data['unit'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'UNIT_PELAKSANA' => $this->input->post('UNIT_PELAKSANA'),
                'UNIT_LAYANAN' => $this->input->post('UNIT_LAYANAN'),
                'LONGITUDEX' => $this->input->post('LONGITUDEX'),
                'LATITUDEY' => $this->input->post('LATITUDEY'),
                'ADDRESS' => $this->input->post('ADDRESS')
            ];

            $this->Unit_model->update_unit($id, $updateData);
            $this->session->set_flashdata('success', 'Data Unit berhasil diperbarui!');
            redirect('Unit');
        } else {
            $data['title'] = 'Edit Data Unit';
            $this->load->view('layout/header');
            $this->load->view('unit/vw_edit_unit', $data);
            $this->load->view('layout/footer');
        }
    }

    // Detail data
    public function detail($id)
    {
        $data['unit'] = $this->Unit_model->get_unit_by_id($id);
        if (empty($data['unit'])) {
            show_404();
        }

        $data['title'] = 'Detail Data Unit';
        $this->load->view('layout/header');
        $this->load->view('unit/vw_detail_unit', $data);
        $this->load->view('layout/footer');
    }

    // Hapus data
    public function hapus($id)
    {
        $this->Unit_model->delete_unit($id);
        $this->session->set_flashdata('success', 'Data Unit berhasil dihapus!');
        redirect('Unit');
    }
}