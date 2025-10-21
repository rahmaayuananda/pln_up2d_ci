<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Single_Line_Diagram extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Single_line_diagram_model', 'sldModel');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination', 'upload']);
    }

    // =======================
    // LIST DATA (READ)
    // =======================
    public function index()
    {
        $data['judul'] = 'Data Single Line Diagram';

        // Konfigurasi pagination
        $config['base_url'] = site_url('Single_Line_Diagram/index');
        $config['total_rows'] = $this->sldModel->count_all_sld();
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

        $data['sld'] = $this->sldModel->get_sld($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;

        $this->load->view('layout/header', $data);
        $this->load->view('single_line_diagram/vw_single_line_diagram', $data);
        $this->load->view('layout/footer');
    }

    // =======================
    // TAMBAH DATA (CREATE)
    // =======================
    public function tambah()
    {
        $data['judul'] = 'Tambah Single Line Diagram';
    $this->load->model('Unit_model', 'unitModel');
    $data['unit'] = $this->unitModel->get_all_units(); // use existing model method

        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('single_line_diagram/vw_tambah_single_line_diagram', $data);
            $this->load->view('layout/footer');
            return;
        }

        // Konfigurasi upload file
        $config['upload_path']   = './uploads/sld/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 0;
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = '';

        if (!empty($_FILES['FILE_PDF']['name'])) {
            if ($this->upload->do_upload('FILE_PDF')) {
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Single_Line_Diagram/tambah');
                return;
            }
        }

        $dataInput = [
            'ID_UNIT'        => $this->input->post('ID_UNIT', TRUE), // ✅ tambahkan field unit
            'NAMA_GI'        => $this->input->post('NAMA_GI', TRUE),
            'NAMA_PENYULANG' => $this->input->post('NAMA_PENYULANG', TRUE),
            'FILE_PDF'       => $file_name,
            'CREATED_BY'     => $this->input->post('CREATED_BY', TRUE),
            'CREATED_AT'     => date('Y-m-d H:i:s')
        ];

        if ($this->sldModel->insert_sld($dataInput)) {
            $this->session->set_flashdata('success', 'Data Single Line Diagram berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan data Single Line Diagram.');
        }

        redirect('Single_Line_Diagram');
    }

    // =======================
    // EDIT DATA (UPDATE)
    // =======================
    public function edit($id)
    {
        $data['judul'] = 'Edit Single Line Diagram';
        $data['sld'] = $this->sldModel->get_sld_by_id($id);

        if (!$data['sld']) {
            show_404();
        }

        // load unit list for dropdown in edit form
        $this->load->model('Unit_model', 'unitModel');
        $data['unit'] = $this->unitModel->get_all_units();

        if (!$this->input->post()) {
            $this->load->view('layout/header', $data);
            $this->load->view('single_line_diagram/vw_edit_single_line_diagram', $data);
            $this->load->view('layout/footer');
            return;
        }

        $config['upload_path']   = './uploads/sld/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = 0;
        $config['encrypt_name']  = TRUE;

        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $this->upload->initialize($config);
        $file_name = $data['sld']['FILE_PDF'];

        if (!empty($_FILES['FILE_PDF']['name'])) {
            if ($this->upload->do_upload('FILE_PDF')) {
                if ($file_name && file_exists('./uploads/sld/' . $file_name)) {
                    unlink('./uploads/sld/' . $file_name);
                }
                $file_name = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('Single_Line_Diagram/edit/' . $id);
                return;
            }
        }

        $dataUpdate = [
            'ID_UNIT'        => $this->input->post('ID_UNIT', TRUE),
            'NAMA_GI'        => $this->input->post('NAMA_GI', TRUE),
            'NAMA_PENYULANG' => $this->input->post('NAMA_PENYULANG', TRUE),
            'FILE_PDF'       => $file_name,
            'CREATED_BY'     => $this->input->post('CREATED_BY', TRUE)
        ];

        $this->sldModel->update_sld($id, $dataUpdate);
        $this->session->set_flashdata('success', 'Data Single Line Diagram berhasil diperbarui.');
        redirect('Single_Line_Diagram');
    }

    // =======================
    // HAPUS DATA (DELETE)
    // =======================
    public function hapus($id)
    {
        $sld = $this->sldModel->get_sld_by_id($id);
        if (!$sld) {
            show_404();
        }

        if (!empty($sld['FILE_PDF']) && file_exists('./uploads/sld/' . $sld['FILE_PDF'])) {
            unlink('./uploads/sld/' . $sld['FILE_PDF']);
        }

        $this->sldModel->delete_sld($id);
        $this->session->set_flashdata('success', 'Data Single Line Diagram berhasil dihapus.');
        redirect('Single_Line_Diagram');
    }
}
