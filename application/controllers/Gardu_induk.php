<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_induk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gardu_induk_model', 'garduModel');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination']);
    }

    // =======================
    // LIST DATA (READ)
    // =======================
    public function index()
    {
        $data['judul'] = 'Data Gardu Induk';

        // Get per_page from query string or default to 5
        $per_page = $this->input->get('per_page');
        $allowed_per_page = [5, 10, 25, 50, 100, 500];
        if (!in_array($per_page, $allowed_per_page)) {
            $per_page = 5; // default
        }

        // Konfigurasi paginasi
        $config['base_url'] = site_url('gardu_induk/index');
        $config['total_rows'] = $this->garduModel->count_all_gardu_induk();
        $config['per_page'] = $per_page;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE; // Maintain per_page parameter

        // Customizing pagination links
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-end">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        // Ambil nomor halaman dari URI, pastikan itu numerik
        $page_segment = $this->uri->segment(3);
        $page = (is_numeric($page_segment) && $page_segment > 0) ? (int)$page_segment : 1;
        if ($page <= 0) {
            $page = 1;
        }

        // Hitung offset
        $offset = ($page - 1) * $config['per_page'];

        // Inisialisasi paginasi
        $this->pagination->initialize($config);

        // Ambil data untuk halaman saat ini
        $data['gardu_induk'] = $this->garduModel->get_gardu_induk($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;
        $data['per_page'] = $per_page;
        $data['total_rows'] = $config['total_rows'];

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
                'UP3_2D' => $this->input->post('UP3_2D'),
                'UNITNAME_UP3' => $this->input->post('UNITNAME_UP3'),
                'CXUNIT' => $this->input->post('CXUNIT'),
                'UNITNAME' => $this->input->post('UNITNAME'),
                'LOCATION' => $this->input->post('LOCATION'),
                'SSOTNUMBER' => $this->input->post('SSOTNUMBER'),
                'DESCRIPTION' => $this->input->post('DESCRIPTION'),
                'STATUS' => $this->input->post('STATUS'),
                'TUJDNUMBER' => $this->input->post('TUJDNUMBER'),
                'ASSETCLASSHI' => $this->input->post('ASSETCLASSHI'),
                'SADDRESSCODE' => $this->input->post('SADDRESSCODE'),
                'CXCLASSIFICATIONDESC' => $this->input->post('CXCLASSIFICATIONDESC'),
                'PENYULANG' => $this->input->post('PENYULANG'),
                'PARENT' => $this->input->post('PARENT'),
                'PARENT_DESCRIPTION' => $this->input->post('PARENT_DESCRIPTION'),
                'INSTALLDATE' => $this->input->post('INSTALLDATE'),
                'ACTUALOPRDATE' => $this->input->post('ACTUALOPRDATE'),
                'CHANGEDATE' => $this->input->post('CHANGEDATE'),
                'CHANGEBY' => $this->input->post('CHANGEBY'),
                'LATITUDEY' => $this->input->post('LATITUDEY'),
                'LONGITUDEX' => $this->input->post('LONGITUDEX'),
                'FORMATTEDADDRESS' => $this->input->post('FORMATTEDADDRESS'),
                'STREETADDRESS' => $this->input->post('STREETADDRESS'),
                'CITY' => $this->input->post('CITY'),
                'ISASSET' => $this->input->post('ISASSET'),
                'STATUS_KEPEMILIKAN' => $this->input->post('STATUS_KEPEMILIKAN'),
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
                'UP3_2D' => $this->input->post('UP3_2D'),
                'UNITNAME_UP3' => $this->input->post('UNITNAME_UP3'),
                'CXUNIT' => $this->input->post('CXUNIT'),
                'UNITNAME' => $this->input->post('UNITNAME'),
                'LOCATION' => $this->input->post('LOCATION'),
                'SSOTNUMBER' => $this->input->post('SSOTNUMBER'),
                'DESCRIPTION' => $this->input->post('DESCRIPTION'),
                'STATUS' => $this->input->post('STATUS'),
                'TUJDNUMBER' => $this->input->post('TUJDNUMBER'),
                'ASSETCLASSHI' => $this->input->post('ASSETCLASSHI'),
                'SADDRESSCODE' => $this->input->post('SADDRESSCODE'),
                'CXCLASSIFICATIONDESC' => $this->input->post('CXCLASSIFICATIONDESC'),
                'PENYULANG' => $this->input->post('PENYULANG'),
                'PARENT' => $this->input->post('PARENT'),
                'PARENT_DESCRIPTION' => $this->input->post('PARENT_DESCRIPTION'),
                'INSTALLDATE' => $this->input->post('INSTALLDATE'),
                'ACTUALOPRDATE' => $this->input->post('ACTUALOPRDATE'),
                'CHANGEDATE' => $this->input->post('CHANGEDATE'),
                'CHANGEBY' => $this->input->post('CHANGEBY'),
                'LATITUDEY' => $this->input->post('LATITUDEY'),
                'LONGITUDEX' => $this->input->post('LONGITUDEX'),
                'FORMATTEDADDRESS' => $this->input->post('FORMATTEDADDRESS'),
                'STREETADDRESS' => $this->input->post('STREETADDRESS'),
                'CITY' => $this->input->post('CITY'),
                'ISASSET' => $this->input->post('ISASSET'),
                'STATUS_KEPEMILIKAN' => $this->input->post('STATUS_KEPEMILIKAN'),
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
        $id = $this->input->post('SSOTNUMBER');
        $dataUpdate = [
            'UP3_2D' => $this->input->post('UP3_2D'),
            'UNITNAME_UP3' => $this->input->post('UNITNAME_UP3'),
            'CXUNIT' => $this->input->post('CXUNIT'),
            'UNITNAME' => $this->input->post('UNITNAME'),
            'LOCATION' => $this->input->post('LOCATION'),
            'SSOTNUMBER' => $this->input->post('SSOTNUMBER'),
            'DESCRIPTION' => $this->input->post('DESCRIPTION'),
            'STATUS' => $this->input->post('STATUS'),
            'TUJDNUMBER' => $this->input->post('TUJDNUMBER'),
            'ASSETCLASSHI' => $this->input->post('ASSETCLASSHI'),
            'SADDRESSCODE' => $this->input->post('SADDRESSCODE'),
            'CXCLASSIFICATIONDESC' => $this->input->post('CXCLASSIFICATIONDESC'),
            'PENYULANG' => $this->input->post('PENYULANG'),
            'PARENT' => $this->input->post('PARENT'),
            'PARENT_DESCRIPTION' => $this->input->post('PARENT_DESCRIPTION'),
            'INSTALLDATE' => $this->input->post('INSTALLDATE'),
            'ACTUALOPRDATE' => $this->input->post('ACTUALOPRDATE'),
            'CHANGEDATE' => $this->input->post('CHANGEDATE'),
            'CHANGEBY' => $this->input->post('CHANGEBY'),
            'LATITUDEY' => $this->input->post('LATITUDEY'),
            'LONGITUDEX' => $this->input->post('LONGITUDEX'),
            'FORMATTEDADDRESS' => $this->input->post('FORMATTEDADDRESS'),
            'STREETADDRESS' => $this->input->post('STREETADDRESS'),
            'CITY' => $this->input->post('CITY'),
            'ISASSET' => $this->input->post('ISASSET'),
            'STATUS_KEPEMILIKAN' => $this->input->post('STATUS_KEPEMILIKAN'),
        ];

        $this->garduModel->update_gardu_induk($id, $dataUpdate);
        $this->session->set_flashdata('success', 'Data berhasil diperbarui');
        redirect('gardu_induk');
    }
}
