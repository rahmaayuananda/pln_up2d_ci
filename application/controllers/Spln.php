<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spln extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Spln_model', 'splnModel');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination', 'upload']);
    }

    // =======================
    // LIST DATA (READ)
    // =======================
    public function index()
    {
        $data['judul'] = 'Data SPLN';

        // Konfigurasi pagination
        $config['base_url'] = site_url('spln/index');
        $config['total_rows'] = $this->splnModel->count_all_spln();
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

        $data['spln'] = $this->splnModel->get_spln($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;

        $this->load->view('layout/header', $data);
        $this->load->view('spln/vw_spln', $data);
        $this->load->view('layout/footer');
    }

    // =======================
    // TAMBAH DATA (CREATE)
    // =======================
    public function tambah()
    {
        $data['judul'] = 'Tambah SPLN';

        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('spln/vw_tambah_spln', $data);
            $this->load->view('layout/footer');
            return;
        }

        // Konfigurasi upload file
        $config['upload_path']   = './uploads/spln/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']      = 0; // 0 MB
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = '';

        if (!empty($_FILES['FILE_SPLN']['name'])) {
            if ($this->upload->do_upload('FILE_SPLN')) {
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('spln/tambah');
                return;
            }
        }

        $dataInput = [
            'NAMA_FILE'  => $this->input->post('NAMA_FILE', TRUE),
            'CREATED_BY' => $this->input->post('CREATED_BY', TRUE),
            'FILE_SPLN'  => $file_name,
            'CREATED_AT' => date('Y-m-d H:i:s')
        ];

        if ($this->splnModel->insert_spln($dataInput)) {
            $this->session->set_flashdata('success', 'Data SPLN berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data SPLN.');
        }

        redirect('spln');
    }

    // =======================
    // EDIT DATA (UPDATE)
    // =======================
    public function edit($id)
    {
        $data['judul'] = 'Edit SPLN';
        $data['spln'] = $this->splnModel->get_spln_by_id($id);

        if (!$data['spln']) {
            show_404();
        }

        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('spln/vw_edit_spln', $data);
            $this->load->view('layout/footer');
            return;
        }

        // Konfigurasi upload file
        $config['upload_path']   = './uploads/spln/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']      = 0;
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = $data['spln']['FILE_SPLN'];

        if (!empty($_FILES['FILE_SPLN']['name'])) {
            if ($this->upload->do_upload('FILE_SPLN')) {
                // Hapus file lama
                if ($file_name && file_exists('./uploads/spln/' . $file_name)) {
                    unlink('./uploads/spln/' . $file_name);
                }
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('spln/edit/' . $id);
                return;
            }
        }

        $dataUpdate = [
            'NAMA_FILE'  => $this->input->post('NAMA_FILE', TRUE),
            'CREATED_BY' => $this->input->post('CREATED_BY', TRUE),
            'FILE_SPLN'  => $file_name
        ];

        $this->splnModel->update_spln($id, $dataUpdate);
        $this->session->set_flashdata('success', 'Data SPLN berhasil diperbarui.');
        redirect('spln');
    }

    // =======================
    // HAPUS DATA (DELETE)
    // =======================
    public function hapus($id)
    {
        $spln = $this->splnModel->get_spln_by_id($id);
        if (!$spln) {
            show_404();
        }

        if (!empty($spln['FILE_SPLN']) && file_exists('./uploads/spln/' . $spln['FILE_SPLN'])) {
            unlink('./uploads/spln/' . $spln['FILE_SPLN']);
        }

        $this->splnModel->delete_spln($id);
        $this->session->set_flashdata('success', 'Data SPLN berhasil dihapus.');
        redirect('spln');
    }
}
