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

            // Handle per_page dari query string (gunakan config default_per_page)
            $allowedPerPage = [5, 10, 25, 50, 100, 500];
            $requestedPer = (int) $this->input->get('per_page');
            $defaultPer = (int) $this->config->item('default_per_page');
            $per_page = in_array($requestedPer, $allowedPerPage) ? $requestedPer : $defaultPer;

        // Konfigurasi paginasi
        $config['base_url'] = site_url('gardu_induk/index');
        $config['total_rows'] = $this->garduModel->count_all_gardu_induk();
        $config['per_page'] = $per_page;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $config['reuse_query_string'] = TRUE; // Untuk mempertahankan parameter per_page

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
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'GARDU_INDUK'    => $this->input->post('GARDU_INDUK'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'JML_TD'         => $this->input->post('JML_TD'),
                'INC'            => $this->input->post('INC'),
                'OGF'            => $this->input->post('OGF'),
                'SPARE'          => $this->input->post('SPARE'),
                'COUPLE'         => $this->input->post('COUPLE'),
                'BUS_RISER'      => $this->input->post('BUS_RISER'),
                'BBVT'           => $this->input->post('BBVT'),
                'PS'             => $this->input->post('PS'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'SN_RTU'         => $this->input->post('SN_RTU'),
                'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
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
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'GARDU_INDUK'    => $this->input->post('GARDU_INDUK'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'JML_TD'         => $this->input->post('JML_TD'),
                'INC'            => $this->input->post('INC'),
                'OGF'            => $this->input->post('OGF'),
                'SPARE'          => $this->input->post('SPARE'),
                'COUPLE'         => $this->input->post('COUPLE'),
                'BUS_RISER'      => $this->input->post('BUS_RISER'),
                'BBVT'           => $this->input->post('BBVT'),
                'PS'             => $this->input->post('PS'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'SN_RTU'         => $this->input->post('SN_RTU'),
                'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
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
        $id = $this->input->post('ID_GI');
        $dataUpdate = [
            'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
            'GARDU_INDUK'    => $this->input->post('GARDU_INDUK'),
            'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
            'LATITUDEY'      => $this->input->post('LATITUDEY'),
            'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
            'JML_TD'         => $this->input->post('JML_TD'),
            'INC'            => $this->input->post('INC'),
            'OGF'            => $this->input->post('OGF'),
            'SPARE'          => $this->input->post('SPARE'),
            'COUPLE'         => $this->input->post('COUPLE'),
            'BUS_RISER'      => $this->input->post('BUS_RISER'),
            'BBVT'           => $this->input->post('BBVT'),
            'PS'             => $this->input->post('PS'),
            'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
            'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
            'IP_RTU'         => $this->input->post('IP_RTU'),
            'MERK_RTU'       => $this->input->post('MERK_RTU'),
            'SN_RTU'         => $this->input->post('SN_RTU'),
            'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
        ];

        $this->garduModel->update_gardu_induk($id, $dataUpdate);
        $this->session->set_flashdata('success', 'Data berhasil diperbarui');
        redirect('gardu_induk');
    }
}
