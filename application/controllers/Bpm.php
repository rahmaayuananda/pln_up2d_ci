<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bpm extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Bpm_model', 'bpmModel');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination', 'upload']);
    }

    // =======================
    // LIST DATA (READ)
    // =======================
    public function index()
    {
        $data['judul'] = 'Data BPM';

        // Konfigurasi pagination
        $config['base_url'] = site_url('bpm/index');
        $config['total_rows'] = $this->bpmModel->count_all_bpm();
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

        $page_segment = $this->uri->segment(3);
        $page = (is_numeric($page_segment) && $page_segment > 0) ? (int)$page_segment : 1;
        $offset = ($page - 1) * $config['per_page'];

        $this->pagination->initialize($config);

        $data['bpm'] = $this->bpmModel->get_bpm($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;

        $this->load->view('layout/header', $data);
        $this->load->view('bpm/vw_bpm', $data);
        $this->load->view('layout/footer');
    }

    // =======================
    // TAMBAH DATA (CREATE)
    // =======================
    public function tambah()
    {
        $data['judul'] = 'Tambah BPM';

        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('bpm/vw_tambah_bpm', $data);
            $this->load->view('layout/footer');
            return;
        }

        // Konfigurasi upload
        $config['upload_path']   = './uploads/bpm/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']      = 0; // 5MB
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = '';

        if (!empty($_FILES['FILE_BPM']['name'])) {
            if ($this->upload->do_upload('FILE_BPM')) {
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('bpm/tambah');
                return;
            }
        }

        $dataInput = [
            'NAMA_FILE'  => $this->input->post('NAMA_FILE', TRUE),
            'CREATED_BY' => $this->input->post('CREATED_BY', TRUE),
            'FILE_BPM'   => $file_name,
            'CREATED_AT' => date('Y-m-d H:i:s')
        ];

        if ($this->bpmModel->insert_bpm($dataInput)) {
            $this->session->set_flashdata('success', 'Data BPM berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data BPM.');
        }

        redirect('bpm');
    }

    // =======================
    // EDIT DATA (UPDATE)
    // =======================
    public function edit($id)
    {
        $data['judul'] = 'Edit BPM';
        $data['bpm'] = $this->bpmModel->get_bpm_by_id($id);

        if (!$data['bpm']) {
            show_404();
        }

        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('bpm/vw_edit_bpm', $data);
            $this->load->view('layout/footer');
            return;
        }

        $config['upload_path']   = './uploads/bpm/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']      = 0;
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = $data['bpm']['FILE_BPM'];

        if (!empty($_FILES['FILE_BPM']['name'])) {
            if ($this->upload->do_upload('FILE_BPM')) {
                if ($file_name && file_exists('./uploads/bpm/' . $file_name)) {
                    unlink('./uploads/bpm/' . $file_name);
                }
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('bpm/edit/' . $id);
                return;
            }
        }

        $dataUpdate = [
            'NAMA_FILE'  => $this->input->post('NAMA_FILE', TRUE),
            'CREATED_BY' => $this->input->post('CREATED_BY', TRUE),
            'FILE_BPM'   => $file_name
        ];

        $this->bpmModel->update_bpm($id, $dataUpdate);
        $this->session->set_flashdata('success', 'Data BPM berhasil diperbarui.');
        redirect('bpm');
    }

    // =======================
    // HAPUS DATA (DELETE)
    // =======================
    public function hapus($id)
    {
        $bpm = $this->bpmModel->get_bpm_by_id($id);
        if (!$bpm) {
            show_404();
        }

        if (!empty($bpm['FILE_BPM']) && file_exists('./uploads/bpm/' . $bpm['FILE_BPM'])) {
            unlink('./uploads/bpm/' . $bpm['FILE_BPM']);
        }

        $this->bpmModel->delete_bpm($id);
        $this->session->set_flashdata('success', 'Data BPM berhasil dihapus.');
        redirect('bpm');
    }
}
