<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gh_cell extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Gh_cell_model');
        // Load helper dan library
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    // Halaman utama - tampilkan semua data GH Cell
    public function index()
    {
        $data['title'] = 'Data GH Cell';
        $data['gh_cell'] = $this->Gh_cell_model->get_all_gh_cell();

        $this->load->view('layout/header');
        $this->load->view('gh_cell/vw_gh_cell', $data);
        $this->load->view('layout/footer');
    }

    // Tambah data baru
    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'SSOTNUMBER_GH_CELL' => $this->input->post('SSOTNUMBER_GH_CELL'),
                'GARDU_HUBUNG'       => $this->input->post('GARDU_HUBUNG'),
                'NAMA_CELL'          => $this->input->post('NAMA_CELL'),
                'JENIS_CELL'         => $this->input->post('JENIS_CELL'),
                'STATUS_OPERASI'     => $this->input->post('STATUS_OPERASI'),
                'MERK_CELL'          => $this->input->post('MERK_CELL'),
                'TYPE_CELL'          => $this->input->post('TYPE_CELL'),
                'THN_CELL'           => $this->input->post('THN_CELL'),
                'STATUS_SCADA'       => $this->input->post('STATUS_SCADA'),
                'MERK_RELAY'         => $this->input->post('MERK_RELAY'),
                'TYPE_RELAY'         => $this->input->post('TYPE_RELAY'),
                'THN_RELAY'          => $this->input->post('THN_RELAY'),
                'RATIO_CT'           => $this->input->post('RATIO_CT'),
            ];

            $this->Gh_cell_model->insert_gh_cell($insertData);
            $this->session->set_flashdata('success', 'Data GH Cell berhasil ditambahkan!');
            redirect('Gh_cell');
        } else {
            $data['title'] = 'Tambah Data GH Cell';
            $this->load->view('layout/header');
            $this->load->view('gh_cell/vw_tambah_gh_cell', $data);
            $this->load->view('layout/footer');
        }
    }

    // Edit data
    public function edit($id)
    {
        $data['gh_cell'] = $this->Gh_cell_model->get_gh_cell_by_id($id);
        if (empty($data['gh_cell'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'GARDU_HUBUNG'   => $this->input->post('GARDU_HUBUNG'),
                'NAMA_CELL'      => $this->input->post('NAMA_CELL'),
                'JENIS_CELL'     => $this->input->post('JENIS_CELL'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'MERK_CELL'      => $this->input->post('MERK_CELL'),
                'TYPE_CELL'      => $this->input->post('TYPE_CELL'),
                'THN_CELL'       => $this->input->post('THN_CELL'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'MERK_RELAY'     => $this->input->post('MERK_RELAY'),
                'TYPE_RELAY'     => $this->input->post('TYPE_RELAY'),
                'THN_RELAY'      => $this->input->post('THN_RELAY'),
                'RATIO_CT'       => $this->input->post('RATIO_CT'),
            ];

            $this->Gh_cell_model->update_gh_cell($id, $updateData);
            $this->session->set_flashdata('success', 'Data GH Cell berhasil diperbarui!');
            redirect('Gh_cell');
        } else {
            $data['title'] = 'Edit Data GH Cell';
            $this->load->view('layout/header');
            $this->load->view('gh_cell/vw_edit_gh_cell', $data);
            $this->load->view('layout/footer');
        }
    }

    // Detail data
    public function detail($id)
    {
        $data['gh_cell'] = $this->Gh_cell_model->get_gh_cell_by_id($id);
        if (empty($data['gh_cell'])) {
            show_404();
        }

        $data['title'] = 'Detail Data GH Cell';
        $this->load->view('layout/header');
        $this->load->view('gh_cell/vw_detail_gh_cell', $data);
        $this->load->view('layout/footer');
    }

    // Hapus data
    public function hapus($id)
    {
        $this->Gh_cell_model->delete_gh_cell($id);
        $this->session->set_flashdata('success', 'Data GH Cell berhasil dihapus!');
        redirect('Gh_cell');
    }
}
