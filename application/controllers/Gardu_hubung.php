<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_hubung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gardu_hubung_model');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'Data Gardu Hubung';
        $data['gardu_hubung'] = $this->Gardu_hubung_model->get_all_gardu_hubung();

        $this->load->view('layout/header');
        $this->load->view('gardu_hubung/vw_gardu_hubung', $data);
        $this->load->view('layout/footer');
    }

    // Tambah data
    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'SSOTNUMBER_GH' => $this->input->post('SSOTNUMBER_GH'),
                'UNIT_LAYANAN'  => $this->input->post('UNIT_LAYANAN'),
                'GARDU_HUBUNG'  => $this->input->post('GARDU_HUBUNG'),
                'LONGITUDEX'    => $this->input->post('LONGITUDEX'),
                'LATITUDEY'     => $this->input->post('LATITUDEY'),
                'ADDRESS'       => $this->input->post('ADDRESS'),
                'STATUS_OPERASI'=> $this->input->post('STATUS_OPERASI'),
                'STATUS_SCADA'  => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'    => $this->input->post('IP_GATEWAY'),
                'IP_RTU'        => $this->input->post('IP_RTU'),
                'MERK_RTU'      => $this->input->post('MERK_RTU'),
                'KOMUNIKASI'    => $this->input->post('KOMUNIKASI'),
                'TGL_INTEGRASI' => $this->input->post('TGL_INTEGRASI'),
                'TGL_PASANG_BATT' => $this->input->post('TGL_PASANG_BATT'),
                'MERK_RECTI'    => $this->input->post('MERK_RECTI'),
                'THN_RECTI'     => $this->input->post('THN_RECTI'),
                'GROUNDING_OHM' => $this->input->post('GROUNDING_OHM'),
            ];

            $this->Gardu_hubung_model->insert_gardu_hubung($insertData);
            $this->session->set_flashdata('success', 'Data Gardu Hubung berhasil ditambahkan!');
            return redirect('Gardu_hubung');
        }

        $data['title'] = 'Tambah Data Gardu Hubung';
        $this->load->view('layout/header');
        $this->load->view('gardu_hubung/vw_tambah_gardu_hubung', $data);
        $this->load->view('layout/footer');
    }

    // Edit data
    public function edit($id)
    {
        $data['gardu_hubung'] = $this->Gardu_hubung_model->get_gardu_hubung_by_id($id);
        if (empty($data['gardu_hubung'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'UNIT_LAYANAN'  => $this->input->post('UNIT_LAYANAN'),
                'GARDU_HUBUNG'  => $this->input->post('GARDU_HUBUNG'),
                'LONGITUDEX'    => $this->input->post('LONGITUDEX'),
                'LATITUDEY'     => $this->input->post('LATITUDEY'),
                'ADDRESS'       => $this->input->post('ADDRESS'),
                'STATUS_OPERASI'=> $this->input->post('STATUS_OPERASI'),
                'STATUS_SCADA'  => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'    => $this->input->post('IP_GATEWAY'),
                'IP_RTU'        => $this->input->post('IP_RTU'),
                'MERK_RTU'      => $this->input->post('MERK_RTU'),
                'KOMUNIKASI'    => $this->input->post('KOMUNIKASI'),
                'TGL_INTEGRASI' => $this->input->post('TGL_INTEGRASI'),
                'TGL_PASANG_BATT' => $this->input->post('TGL_PASANG_BATT'),
                'MERK_RECTI'    => $this->input->post('MERK_RECTI'),
                'THN_RECTI'     => $this->input->post('THN_RECTI'),
                'GROUNDING_OHM' => $this->input->post('GROUNDING_OHM'),
            ];

            $this->Gardu_hubung_model->update_gardu_hubung($id, $updateData);
            $this->session->set_flashdata('success', 'Data Gardu Hubung berhasil diperbarui!');
            return redirect('Gardu_hubung');
        }

        $data['title'] = 'Edit Data Gardu Hubung';
        $this->load->view('layout/header');
        $this->load->view('gardu_hubung/vw_edit_gardu_hubung', $data);
        $this->load->view('layout/footer');
    }

    // Detail data
    public function detail($id)
    {
        $data['gardu_hubung'] = $this->Gardu_hubung_model->get_gardu_hubung_by_id($id);
        if (empty($data['gardu_hubung'])) {
            show_404();
        }
        $data['title'] = 'Detail Data Gardu Hubung';
        $this->load->view('layout/header');
        $this->load->view('gardu_hubung/vw_detail_gardu_hubung', $data);
        $this->load->view('layout/footer');
    }

    // Hapus data
    public function hapus($id)
    {
        $this->Gardu_hubung_model->delete_gardu_hubung($id);
        $this->session->set_flashdata('success', 'Data Gardu Hubung berhasil dihapus!');
        return redirect('Gardu_hubung');
    }
}
