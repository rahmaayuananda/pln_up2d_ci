<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ik_model', 'ikModel');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination', 'upload']);
    }

    // ==========================
    // LIST DATA (READ)
    // ==========================
    public function index()
    {
        $data['judul'] = 'Data IK';

        // Konfigurasi pagination
        $config['base_url'] = site_url('ik/index');
        $config['total_rows'] = $this->ikModel->count_all_ik();
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

        $data['ik'] = $this->ikModel->get_ik($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;

        $this->load->view('layout/header', $data);
        $this->load->view('ik/vw_ik', $data);
        $this->load->view('layout/footer');
    }

    // ==========================
    // TAMBAH DATA (CREATE)
    // ==========================
    public function tambah()
    {
        if (!can_create()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk menambah data');
            redirect($this->router->fetch_class());
        }

        $data['judul'] = 'Tambah IK';

        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('ik/vw_tambah_ik', $data);
            $this->load->view('layout/footer');
            return;
        }

        // Konfigurasi upload
        $config['upload_path']   = './uploads/ik/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']      = 0; // 0MB
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = '';

        if (!empty($_FILES['FILE_IK']['name'])) {
            if ($this->upload->do_upload('FILE_IK')) {
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('ik/tambah');
                return;
            }
        }

        $dataInput = [
            'NAMA_FILE'  => $this->input->post('NAMA_FILE', TRUE),
            'CREATED_BY' => $this->input->post('CREATED_BY', TRUE),
            'FILE_IK'    => $file_name,
            'CREATED_AT' => date('Y-m-d H:i:s')
        ];

        if ($this->ikModel->insert_ik($dataInput)) {
            $this->session->set_flashdata('success', 'Data IK berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data IK.');
        }

        redirect('ik');
    }

    // ==========================
    // EDIT DATA (UPDATE)
    // ==========================
    public function edit($id)
    {
        if (!can_edit()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk mengubah data');
            redirect($this->router->fetch_class());
        }

        $data['judul'] = 'Edit IK';
        $data['ik'] = $this->ikModel->get_ik_by_id($id);

        if (!$data['ik']) {
            show_404();
        }

        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('ik/vw_edit_ik', $data);
            $this->load->view('layout/footer');
            return;
        }

        $config['upload_path']   = './uploads/ik/';
        $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
        $config['max_size']      = 0;
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = $data['ik']['FILE_IK'];

        if (!empty($_FILES['FILE_IK']['name'])) {
            if ($this->upload->do_upload('FILE_IK')) {
                if ($file_name && file_exists('./uploads/ik/' . $file_name)) {
                    unlink('./uploads/ik/' . $file_name);
                }
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('ik/edit/' . $id);
                return;
            }
        }

        $dataUpdate = [
            'NAMA_FILE'  => $this->input->post('NAMA_FILE', TRUE),
            'CREATED_BY' => $this->input->post('CREATED_BY', TRUE),
            'FILE_IK'    => $file_name
        ];

        $this->ikModel->update_ik($id, $dataUpdate);
        $this->session->set_flashdata('success', 'Data IK berhasil diperbarui.');
        redirect('ik');
    }

    // ==========================
    // HAPUS DATA (DELETE)
    // ==========================
    public function hapus($id)
    {
        if (!can_delete()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk menghapus data');
            redirect($this->router->fetch_class());
        }

        $ik = $this->ikModel->get_ik_by_id($id);
        if (!$ik) {
            show_404();
        }

        if (!empty($ik['FILE_IK']) && file_exists('./uploads/ik/' . $ik['FILE_IK'])) {
            unlink('./uploads/ik/' . $ik['FILE_IK']);
        }

        $this->ikModel->delete_ik($id);
        $this->session->set_flashdata('success', 'Data IK berhasil dihapus.');
        redirect('ik');
    }
}
