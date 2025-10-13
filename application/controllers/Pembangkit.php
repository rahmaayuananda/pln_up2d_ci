<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembangkit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Pembangkit_model');
        // Load helper dan library
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    // Halaman utama - tampilkan semua data pembangkit
    public function index()
    {
        $data['title'] = 'Data Pembangkit';
        $data['pembangkit'] = $this->Pembangkit_model->get_all_pembangkit();

        $this->load->view('layout/header');
        $this->load->view('pembangkit/vw_pembangkit', $data);
        $this->load->view('layout/footer');
    }

    // Tambah data baru
    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'PEMBANGKIT'     => $this->input->post('PEMBANGKIT'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'INC'            => $this->input->post('INC'),
                'OGF'            => $this->input->post('OGF'),
                'SPARE'          => $this->input->post('SPARE'),
                'COUPLE'         => $this->input->post('COUPLE'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'SN_RTU'         => $this->input->post('SN_RTU'),
                'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
            ];

            $this->Pembangkit_model->insert_pembangkit($insertData);
            $this->session->set_flashdata('success', 'Data pembangkit berhasil ditambahkan!');
            redirect('Pembangkit');
        } else {
            $data['title'] = 'Tambah Data Pembangkit';
            $this->load->view('layout/header');
            $this->load->view('pembangkit/vw_tambah_pembangkit', $data);
            $this->load->view('layout/footer');
        }
    }

    // Edit data pembangkit
    public function edit($id)
    {
        $data['pembangkit'] = $this->Pembangkit_model->get_pembangkit_by_id($id);
        if (empty($data['pembangkit'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'PEMBANGKIT'     => $this->input->post('PEMBANGKIT'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'INC'            => $this->input->post('INC'),
                'OGF'            => $this->input->post('OGF'),
                'SPARE'          => $this->input->post('SPARE'),
                'COUPLE'         => $this->input->post('COUPLE'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'SN_RTU'         => $this->input->post('SN_RTU'),
                'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
            ];

            $this->Pembangkit_model->update_pembangkit($id, $updateData);
            $this->session->set_flashdata('success', 'Data pembangkit berhasil diperbarui!');
            redirect('Pembangkit');
        } else {
            $data['title'] = 'Edit Data Pembangkit';
            $this->load->view('layout/header');
            $this->load->view('pembangkit/vw_edit_pembangkit', $data);
            $this->load->view('layout/footer');
        }
    }

    // Detail data pembangkit
    public function detail($id)
    {
        $data['pembangkit'] = $this->Pembangkit_model->get_pembangkit_by_id($id);
        if (empty($data['pembangkit'])) {
            show_404();
        }

        $data['title'] = 'Detail Data Pembangkit';
        $this->load->view('layout/header');
        $this->load->view('pembangkit/vw_detail_pembangkit', $data);
        $this->load->view('layout/footer');
    }

    // Hapus data pembangkit
    public function hapus($id)
    {
        $this->Pembangkit_model->delete_pembangkit($id);
        $this->session->set_flashdata('success', 'Data pembangkit berhasil dihapus!');
        redirect('Pembangkit');
    }
}
