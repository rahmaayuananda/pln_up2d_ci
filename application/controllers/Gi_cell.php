<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gi_cell extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Gi_cell_model');
        // Load helper dan library
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    // Halaman utama - tampilkan semua data GI Cell
    public function index()
    {
        $data['title'] = 'Data GI Cell';
        $data['gi_cell'] = $this->Gi_cell_model->get_all_gi_cell();

        $this->load->view('layout/header');
        $this->load->view('gi_cell/vw_gi_cell', $data);
        $this->load->view('layout/footer');
    }

    // Tambah data baru
    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'SSOTNUMBER_GI_CELL' => $this->input->post('SSOTNUMBER_GI_CELL'),
                'GARDU_INDUK'        => $this->input->post('GARDU_INDUK'),
                'TD'                 => $this->input->post('TD'),
                'KAP_TD_MVA'         => $this->input->post('KAP_TD_MVA'),
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
                'ID_GI'              => $this->input->post('ID_GI')
            ];

            $this->Gi_cell_model->insert_gi_cell($insertData);
            $this->session->set_flashdata('success', 'Data GI Cell berhasil ditambahkan!');
            redirect('Gi_cell');
        } else {
            $data['title'] = 'Tambah Data GI Cell';
            $this->load->view('layout/header');
            $this->load->view('gi_cell/vw_tambah_gi_cell', $data);
            $this->load->view('layout/footer');
        }
    }

    // Edit data
    public function edit($id)
    {
        $data['gi_cell'] = $this->Gi_cell_model->get_gi_cell_by_id($id);
        if (empty($data['gi_cell'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'GARDU_INDUK'    => $this->input->post('GARDU_INDUK'),
                'TD'             => $this->input->post('TD'),
                'KAP_TD_MVA'     => $this->input->post('KAP_TD_MVA'),
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
                'ID_GI'          => $this->input->post('ID_GI')
            ];

            $this->Gi_cell_model->update_gi_cell($id, $updateData);
            $this->session->set_flashdata('success', 'Data GI Cell berhasil diperbarui!');
            redirect('Gi_cell');
        } else {
            $data['title'] = 'Edit Data GI Cell';
            $this->load->view('layout/header');
            $this->load->view('gi_cell/vw_edit_gi_cell', $data);
            $this->load->view('layout/footer');
        }
    }

    // Detail data
    public function detail($id)
    {
        $data['gi_cell'] = $this->Gi_cell_model->get_gi_cell_by_id($id);
        if (empty($data['gi_cell'])) {
            show_404();
        }

        $data['title'] = 'Detail Data GI Cell';
        $this->load->view('layout/header');
        $this->load->view('gi_cell/vw_detail_gi_cell', $data);
        $this->load->view('layout/footer');
    }

    // Hapus data
    public function hapus($id)
    {
        $this->Gi_cell_model->delete_gi_cell($id);
        $this->session->set_flashdata('success', 'Data GI Cell berhasil dihapus!');
        redirect('Gi_cell');
    }
}
