<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaduan_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'upload', 'session', 'pagination']);
    }

    // 🔹 Halaman utama
    public function index()
    {
        $data['judul'] = 'Data Pengaduan';

        // Pagination setup
        $per_page = (int) $this->input->get('per_page') ?: 5;
        $page = (int) $this->input->get('page') ?: 0;

        $config = [
            'base_url'            => base_url('pengaduan/index'),
            'total_rows'          => $this->db->count_all('pengaduan'),
            'per_page'            => $per_page,
            'page_query_string'   => true,
            'query_string_segment' => 'page',
            'reuse_query_string'  => true,

            // Bootstrap 5 style
            'full_tag_open'   => '<nav><ul class="pagination justify-content-center">',
            'full_tag_close'  => '</ul></nav>',
            'first_link'      => '« First',
            'first_tag_open'  => '<li class="page-item">',
            'first_tag_close' => '</li>',
            'last_link'       => 'Last »',
            'last_tag_open'   => '<li class="page-item">',
            'last_tag_close'  => '</li>',
            'next_link'       => '›',
            'next_tag_open'   => '<li class="page-item">',
            'next_tag_close'  => '</li>',
            'prev_link'       => '‹',
            'prev_tag_open'   => '<li class="page-item">',
            'prev_tag_close'  => '</li>',
            'cur_tag_open'    => '<li class="page-item active"><a class="page-link" href="#">',
            'cur_tag_close'   => '</a></li>',
            'num_tag_open'    => '<li class="page-item">',
            'num_tag_close'   => '</li>',
            'attributes'      => ['class' => 'page-link']
        ];

        $this->pagination->initialize($config);

        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan_paginated($per_page, $page);
        $data['start_no'] = $page + 1;
        $data['pagination'] = $this->pagination->create_links();
        $data['total_rows'] = $config['total_rows'];
        $data['per_page'] = $per_page;

        $this->load->view('layout/header', $data);
        $this->load->view('pengaduan/vw_pengaduan', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Tambah Data Pengaduan
    public function tambah()
    {
        if (!can_create()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk menambah data');
            redirect($this->router->fetch_class());
        }

        $data['judul'] = 'Tambah Pengaduan';
        $this->_set_rules();

        if ($this->form_validation->run() === false) {
            $this->load->view('layout/header', $data);
            $this->load->view('pengaduan/vw_tambah_pengaduan', $data);
            $this->load->view('layout/footer');
            return;
        }

        // Upload foto
        $foto_pengaduan = $this->_upload_file('FOTO_PENGADUAN', './uploads/pengaduan/');
        $foto_proses = $this->_upload_file('FOTO_PROSES', './uploads/proses/');

        // Default status "Lapor" bila kosong
        $status = $this->input->post('STATUS', true);
        if (empty($status)) {
            $status = 'Lapor';
        }

        $insert_data = [
            'NAMA_UP3'          => $this->input->post('NAMA_UP3', true),
            'TANGGAL_PENGADUAN' => $this->input->post('TANGGAL_PENGADUAN', true),
            'JENIS_PENGADUAN'   => $this->input->post('JENIS_PENGADUAN', true),
            'ITEM_PENGADUAN'    => $this->input->post('ITEM_PENGADUAN', true),
            'LAPORAN'           => $this->input->post('LAPORAN', true),
            'FOTO_PENGADUAN'    => $foto_pengaduan,
            'TANGGAL_PROSES'    => $this->input->post('TANGGAL_PROSES', true),
            'FOTO_PROSES'       => $foto_proses,
            'STATUS'            => $status,
            'PIC'               => $this->input->post('PIC', true),
            'CATATAN'           => $this->input->post('CATATAN', true),
        ];

        $this->Pengaduan_model->insert_pengaduan($insert_data);
        $this->session->set_flashdata('success', 'Data pengaduan berhasil ditambahkan!');
        redirect('pengaduan');
    }

    // 🔹 Detail Pengaduan
    public function detail($id)
    {
        $data['judul'] = 'Detail Pengaduan';
        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan_by_id($id);

        if (!$data['pengaduan']) {
            show_404();
        }

        $this->load->view('layout/header', $data);
        $this->load->view('pengaduan/vw_detail_pengaduan', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Edit Pengaduan
    public function edit($id)
    {
        if (!can_edit()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk mengubah data');
            redirect($this->router->fetch_class());
        }

        $data['judul'] = 'Edit Pengaduan';
        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan_by_id($id);

        if (!$data['pengaduan']) {
            show_404();
        }

        $this->_set_rules();

        if ($this->form_validation->run() === false) {
            $this->load->view('layout/header', $data);
            $this->load->view('pengaduan/vw_edit_pengaduan', $data);
            $this->load->view('layout/footer');
            return;
        }

        // Upload ulang foto jika ada
        $foto_pengaduan = $this->_upload_file('FOTO_PENGADUAN', './uploads/pengaduan/', $data['pengaduan']['FOTO_PENGADUAN']);
        $foto_proses = $this->_upload_file('FOTO_PROSES', './uploads/proses/', $data['pengaduan']['FOTO_PROSES']);

        // Jika status kosong, tetap pertahankan atau set default "Lapor"
        $status = $this->input->post('STATUS', true);
        if (empty($status)) {
            $status = !empty($data['pengaduan']['STATUS']) ? $data['pengaduan']['STATUS'] : 'Lapor';
        }

        $update_data = [
            'NAMA_UP3'          => $this->input->post('NAMA_UP3', true),
            'TANGGAL_PENGADUAN' => $this->input->post('TANGGAL_PENGADUAN', true),
            'JENIS_PENGADUAN'   => $this->input->post('JENIS_PENGADUAN', true),
            'ITEM_PENGADUAN'    => $this->input->post('ITEM_PENGADUAN', true),
            'LAPORAN'           => $this->input->post('LAPORAN', true),
            'FOTO_PENGADUAN'    => $foto_pengaduan,
            'TANGGAL_PROSES'    => $this->input->post('TANGGAL_PROSES', true),
            'FOTO_PROSES'       => $foto_proses,
            'STATUS'            => $status,
            'PIC'               => $this->input->post('PIC', true),
            'CATATAN'           => $this->input->post('CATATAN', true),
        ];

        $this->Pengaduan_model->update_pengaduan($id, $update_data);
        $this->session->set_flashdata('success', 'Data pengaduan berhasil diperbarui!');
        redirect('pengaduan');
    }

    // 🔹 Hapus Pengaduan
    public function hapus($id)
    {
        if (!can_delete()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk menghapus data');
            redirect($this->router->fetch_class());
        }

        $pengaduan = $this->Pengaduan_model->get_pengaduan_by_id($id);
        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Data pengaduan tidak ditemukan!');
            redirect('pengaduan');
        }

        $this->_delete_file('./uploads/pengaduan/', $pengaduan['FOTO_PENGADUAN']);
        $this->_delete_file('./uploads/proses/', $pengaduan['FOTO_PROSES']);

        $this->Pengaduan_model->delete_pengaduan($id);
        $this->session->set_flashdata('success', 'Data pengaduan berhasil dihapus!');
        redirect('pengaduan');
    }

    // =======================================================
    // 🔧 Fungsi Bantu
    // =======================================================

    private function _set_rules()
    {
        $this->form_validation->set_rules('NAMA_UP3', 'Nama UP3', 'required');
        $this->form_validation->set_rules('TANGGAL_PENGADUAN', 'Tanggal Pengaduan', 'required');
        $this->form_validation->set_rules('JENIS_PENGADUAN', 'Jenis Pengaduan', 'required');
        $this->form_validation->set_rules('LAPORAN', 'Laporan', 'required');
    }

    private function _upload_file($field_name, $path, $old_file = null)
    {
        if (empty($_FILES[$field_name]['name'])) {
            return $old_file;
        }

        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $config = [
            'upload_path'   => $path,
            'allowed_types' => 'jpg|jpeg|png',
            'max_size'      => 2048,
            'encrypt_name'  => true,
        ];

        $this->upload->initialize($config);

        if ($this->upload->do_upload($field_name)) {
            if ($old_file && file_exists($path . $old_file)) {
                unlink($path . $old_file);
            }
            return $this->upload->data('file_name');
        }

        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect($this->uri->uri_string());
        exit;
    }

    private function _delete_file($path, $filename)
    {
        if (!empty($filename) && file_exists($path . $filename)) {
            unlink($path . $filename);
        }
    }
}