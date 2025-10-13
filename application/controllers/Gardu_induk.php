<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_induk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gardu_induk_model', 'garduModel');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    // =======================
    // LIST DATA (READ)
    // =======================
    public function index()
    {
        $data['judul'] = 'Data Gardu Induk';
        $data['gardu_induk'] = $this->garduModel->get_all_gardu_induk();

        $this->load->view('layout/header', $data);
        $this->load->view('gardu_induk/vw_gardu_induk', $data);
        $this->load->view('layout/footer');
    }

    // =======================
    // TAMBAH DATA (CREATE)
    // =======================
    public function tambah()
    {
        $data['judul'] = 'Tambah Data Gardu Induk';

        if ($this->input->post()) {
            $dataInput = [
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'GARDU_INDUK'    => $this->input->post('GARDU_INDUK'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'JML_TD'         => $this->input->post('JML_TD'),
                'INC'            => $this->input->post('INC'),
                'OGF'            => $this->input->post('OGF'),
                'SPARE'          => $this->input->post('SPARE'),
                'COUPLE'         => $this->input->post('COUPLE'),
                'BUS_RISER'      => $this->input->post('BUS_RISER'),
                'BBVT'           => $this->input->post('BBVT'),
                'PS'             => $this->input->post('PS'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'SN_RTU'         => $this->input->post('SN_RTU'),
                'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
            ];

            $this->garduModel->insert_gardu_induk($dataInput);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('gardu_induk');
        }

        $this->load->view('layout/header', $data);
        $this->load->view('gardu_induk/vw_tambah_gardu_induk', $data);
        $this->load->view('layout/footer');
    }

    // =======================
    // DETAIL DATA
    // =======================
    public function detail($id)
    {
        $data['judul'] = 'Detail Gardu Induk';
        $data['gardu_induk'] = $this->garduModel->get_gardu_induk_by_id($id);

        if (!$data['gardu_induk']) {
            show_404();
        }

        $this->load->view('layout/header', $data);
        $this->load->view('gardu_induk/vw_detail_gardu_induk', $data);
        $this->load->view('layout/footer');
    }

    // =======================
    // HAPUS DATA (DELETE)
    // =======================
    public function hapus($id)
    {
        $gardu = $this->garduModel->get_gardu_induk_by_id($id);
        if (!$gardu) {
            show_404();
        }

        $this->garduModel->delete_gardu_induk($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus');
        redirect('gardu_induk');
    }

    // =======================
    // EDIT DATA (UPDATE)
    // =======================
    public function edit($id)
    {
        $data['judul'] = 'Edit Data Gardu Induk';
        $data['gardu_induk'] = $this->garduModel->get_gardu_induk_by_id($id);

        if (!$data['gardu_induk']) {
            show_404();
        }

        if ($this->input->post()) {
            $dataUpdate = [
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'GARDU_INDUK'    => $this->input->post('GARDU_INDUK'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'JML_TD'         => $this->input->post('JML_TD'),
                'INC'            => $this->input->post('INC'),
                'OGF'            => $this->input->post('OGF'),
                'SPARE'          => $this->input->post('SPARE'),
                'COUPLE'         => $this->input->post('COUPLE'),
                'BUS_RISER'      => $this->input->post('BUS_RISER'),
                'BBVT'           => $this->input->post('BBVT'),
                'PS'             => $this->input->post('PS'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'SN_RTU'         => $this->input->post('SN_RTU'),
                'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
            ];

            $this->garduModel->update_gardu_induk($id, $dataUpdate);
            $this->session->set_flashdata('success', 'Data berhasil diperbarui');
            redirect('gardu_induk');
        }

        $this->load->view('layout/header', $data);
        $this->load->view('gardu_induk/vw_edit_gardu_induk', $data);
        $this->load->view('layout/footer');
    }

    public function update()
    {
        $id = $this->input->post('ID_GI');
        $dataUpdate = [
            'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
            'GARDU_INDUK'    => $this->input->post('GARDU_INDUK'),
            'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
            'LATITUDEY'      => $this->input->post('LATITUDEY'),
            'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
            'JML_TD'         => $this->input->post('JML_TD'),
            'INC'            => $this->input->post('INC'),
            'OGF'            => $this->input->post('OGF'),
            'SPARE'          => $this->input->post('SPARE'),
            'COUPLE'         => $this->input->post('COUPLE'),
            'BUS_RISER'      => $this->input->post('BUS_RISER'),
            'BBVT'           => $this->input->post('BBVT'),
            'PS'             => $this->input->post('PS'),
            'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
            'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
            'IP_RTU'         => $this->input->post('IP_RTU'),
            'MERK_RTU'       => $this->input->post('MERK_RTU'),
            'SN_RTU'         => $this->input->post('SN_RTU'),
            'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
        ];

        $this->garduModel->update_gardu_induk($id, $dataUpdate);
        $this->session->set_flashdata('success', 'Data berhasil diperbarui');
        redirect('gardu_induk');
    }
}
