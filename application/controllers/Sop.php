<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sop_model', 'sopModel');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination', 'upload']);
    }

    // =======================
    // LIST DATA (READ)
    // =======================
    public function index()
    {
        $data['judul'] = 'Data SOP';

        // Konfigurasi pagination
        $config['base_url'] = site_url('sop/index');
        $config['total_rows'] = $this->sopModel->count_all_sop();
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;

        // Tampilan pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['next_link'] = '&raquo;';
        $config['prev_link'] = '&laquo;';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        // Hitung offset berdasarkan halaman
        $page_segment = $this->uri->segment(3);
        $page = (is_numeric($page_segment) && $page_segment > 0) ? (int)$page_segment : 1;
        $offset = ($page - 1) * $config['per_page'];

        $this->pagination->initialize($config);

        $data['sop'] = $this->sopModel->get_sop($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;

        $this->load->view('layout/header', $data);
        $this->load->view('sop/vw_sop', $data);
        $this->load->view('layout/footer');
    }

    // =======================
    // TAMBAH DATA (CREATE)
    // =======================
    public function tambah()
    {
        $data['judul'] = 'Tambah SOP';

        // Hanya tampilkan form tambah jika belum ada post
        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('sop/vw_tambah_sop', $data);
            $this->load->view('layout/footer');
            return;
        }

        // Konfigurasi upload file
        $config['upload_path']   = './uploads/sop/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']      = 0; // 0MB
        $config['encrypt_name']  = TRUE;

        // Buat folder jika belum ada
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = '';

        // Jika user mengunggah file
        if (!empty($_FILES['FILE_SOP']['name'])) {
            if ($this->upload->do_upload('FILE_SOP')) {
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('sop/tambah');
                return;
            }
        }

        // Siapkan data input (CREATED_AT otomatis)
        $dataInput = [
            'NAMA_FILE'  => $this->input->post('NAMA_FILE', TRUE),
            'CREATED_BY' => $this->input->post('CREATED_BY', TRUE),
            'FILE_SOP'   => $file_name,
            'CREATED_AT' => date('Y-m-d H:i:s')
        ];

        // Simpan ke database
        if ($this->sopModel->insert_sop($dataInput)) {
            $this->session->set_flashdata('success', 'Data SOP berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data SOP.');
        }

        redirect('sop');
    }

    // =======================
    // EDIT DATA (UPDATE)
    // =======================
    public function edit($id)
    {
        $data['judul'] = 'Edit SOP';
        $data['sop'] = $this->sopModel->get_sop_by_id($id);

        if (!$data['sop']) {
            show_404();
        }

        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('sop/vw_edit_sop', $data);
            $this->load->view('layout/footer');
            return;
        }

        // Konfigurasi upload
        $config['upload_path']   = './uploads/sop/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']      = 0;
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = $data['sop']['FILE_SOP'];

        // Jika upload file baru
        if (!empty($_FILES['FILE_SOP']['name'])) {
            if ($this->upload->do_upload('FILE_SOP')) {
                if ($file_name && file_exists('./uploads/sop/' . $file_name)) {
                    unlink('./uploads/sop/' . $file_name);
                }
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('sop/edit/' . $id);
                return;
            }
        }

        $dataUpdate = [
            'NAMA_FILE'  => $this->input->post('NAMA_FILE', TRUE),
            'CREATED_BY' => $this->input->post('CREATED_BY', TRUE),
            'FILE_SOP'   => $file_name
        ];

        $this->sopModel->update_sop($id, $dataUpdate);
        $this->session->set_flashdata('success', 'Data SOP berhasil diperbarui.');
        redirect('sop');
    }

    // =======================
    // HAPUS DATA (DELETE)
    // =======================
    public function hapus($id)
    {
        $sop = $this->sopModel->get_sop_by_id($id);
        if (!$sop) {
            show_404();
        }

        // Hapus file dari folder
        if (!empty($sop['FILE_SOP']) && file_exists('./uploads/sop/' . $sop['FILE_SOP'])) {
            unlink('./uploads/sop/' . $sop['FILE_SOP']);
        }

        // Hapus data dari database
        $this->sopModel->delete_sop($id);
        $this->session->set_flashdata('success', 'Data SOP berhasil dihapus.');
        redirect('sop');
    }
}
