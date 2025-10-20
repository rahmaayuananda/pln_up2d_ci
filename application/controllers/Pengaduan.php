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

        // Ambil nilai jumlah data per halaman dari dropdown atau default 5
        $per_page = $this->input->get('per_page');
        $per_page = (is_numeric($per_page) && $per_page > 0) ? $per_page : 5;

        // Hitung total data
        $config['base_url'] = base_url('pengaduan/index');
        $config['total_rows'] = $this->db->count_all('pengaduan');
        $config['per_page'] = $per_page;

        // Gunakan query string (?page=)
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['reuse_query_string'] = TRUE;

        // === 🎨 Styling Pagination Bootstrap 5 ===
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = '« First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last »';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '›';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '‹';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = ['class' => 'page-link'];

        // Inisialisasi pagination
        $this->pagination->initialize($config);

        // Tentukan halaman aktif (offset)
        $page = $this->input->get('page');
        $page = (is_numeric($page) && $page > 0) ? $page : 0;

        // Ambil data dari model dengan limit dan offset
        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan_paginated($config['per_page'], $page);

        // Nomor urut di tabel (misal: 1, 2, 3, ...)
        $data['start_no'] = $page + 1;

        // Pagination links
        $data['pagination'] = $this->pagination->create_links();

        // Info tambahan ke view
        $data['total_rows'] = $config['total_rows'];
        $data['per_page'] = $per_page;

        // Load view
        $this->load->view('layout/header', $data);
        $this->load->view('pengaduan/vw_pengaduan', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Tambah Data Pengaduan
    public function tambah()
    {
        $data['judul'] = 'Tambah Pengaduan';

        $this->_set_rules();

        if ($this->form_validation->run() === false) {
            $this->load->view('layout/header', $data);
            $this->load->view('pengaduan/vw_tambah_pengaduan', $data);
            $this->load->view('layout/footer');
            return;
        }

        $foto_pengaduan = $this->_upload_file('FOTO_PENGADUAN', './uploads/pengaduan/');
        $foto_proses = $this->_upload_file('FOTO_PROSES', './uploads/proses/');

        $insert_data = [
            'NAMA_UP3'          => $this->input->post('NAMA_UP3', true),
            'TANGGAL_PENGADUAN' => $this->input->post('TANGGAL_PENGADUAN', true),
            'JENIS_PENGADUAN'   => $this->input->post('JENIS_PENGADUAN', true),
            'ITEM_PENGADUAN'    => $this->input->post('ITEM_PENGADUAN', true),
            'LAPORAN'           => $this->input->post('LAPORAN', true),
            'FOTO_PENGADUAN'    => $foto_pengaduan,
            'TANGGAL_PROSES'    => $this->input->post('TANGGAL_PROSES', true),
            'FOTO_PROSES'       => $foto_proses,
            'STATUS'            => $this->input->post('STATUS', true),
            'PIC'               => $this->input->post('PIC', true),
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

        $foto_pengaduan = $this->_upload_file('FOTO_PENGADUAN', './uploads/pengaduan/', $data['pengaduan']['FOTO_PENGADUAN']);
        $foto_proses = $this->_upload_file('FOTO_PROSES', './uploads/proses/', $data['pengaduan']['FOTO_PROSES']);

        $update_data = [
            'NAMA_UP3'          => $this->input->post('NAMA_UP3', true),
            'TANGGAL_PENGADUAN' => $this->input->post('TANGGAL_PENGADUAN', true),
            'JENIS_PENGADUAN'   => $this->input->post('JENIS_PENGADUAN', true),
            'ITEM_PENGADUAN'    => $this->input->post('ITEM_PENGADUAN', true),
            'LAPORAN'           => $this->input->post('LAPORAN', true),
            'FOTO_PENGADUAN'    => $foto_pengaduan,
            'TANGGAL_PROSES'    => $this->input->post('TANGGAL_PROSES', true),
            'FOTO_PROSES'       => $foto_proses,
            'STATUS'            => $this->input->post('STATUS', true),
            'PIC'               => $this->input->post('PIC', true),
        ];

        $this->Pengaduan_model->update_pengaduan($id, $update_data);
        $this->session->set_flashdata('success', 'Data pengaduan berhasil diperbarui!');
        redirect('pengaduan');
    }

    // 🔹 Hapus Pengaduan
    public function hapus($id)
    {
        $pengaduan = $this->Pengaduan_model->get_pengaduan_by_id($id);

        if (!$pengaduan) {
            $this->session->set_flashdata('error', 'Data pengaduan tidak ditemukan!');
            redirect('pengaduan');
        }

        // Hapus file jika ada
        $this->_delete_file('./uploads/pengaduan/', $pengaduan['FOTO_PENGADUAN']);
        $this->_delete_file('./uploads/proses/', $pengaduan['FOTO_PROSES']);

        $this->Pengaduan_model->delete_pengaduan($id);
        $this->session->set_flashdata('success', 'Data pengaduan berhasil dihapus!');
        redirect('pengaduan');
    }

    // =======================================================
    // 🔧 Fungsi Bantu
    // =======================================================

    // ✅ Aturan validasi form
    private function _set_rules()
    {
        $this->form_validation->set_rules('NAMA_UP3', 'Nama UP3', 'required');
        $this->form_validation->set_rules('TANGGAL_PENGADUAN', 'Tanggal Pengaduan', 'required');
        $this->form_validation->set_rules('JENIS_PENGADUAN', 'Jenis Pengaduan', 'required');
        $this->form_validation->set_rules('LAPORAN', 'Laporan', 'required');
    }

    // ✅ Upload file + hapus lama jika update
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
            // Hapus file lama
            if ($old_file && file_exists($path . $old_file)) {
                unlink($path . $old_file);
            }
            return $this->upload->data('file_name');
        }

        // Jika gagal upload
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect($this->uri->uri_string());
        exit;
    }

    // ✅ Hapus file
    private function _delete_file($path, $filename)
    {
        if (!empty($filename) && file_exists($path . $filename)) {
            unlink($path . $filename);
        }
    }
}
