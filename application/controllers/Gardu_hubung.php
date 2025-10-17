<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gardu_hubung extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Gardu_hubung_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination']);
    }

    public function index()
    {
        $data['title'] = 'Data Gardu Hubung';

    // Handle per_page dari query string (gunakan config default_per_page)
    $allowedPerPage = [5,10,25,50,100,500];
    $requestedPer = (int) $this->input->get('per_page');
    $defaultPer = (int) $this->config->item('default_per_page');
    $per_page = in_array($requestedPer, $allowedPerPage) ? $requestedPer : $defaultPer;

        // Konfigurasi paginasi
        $config['base_url'] = site_url('gardu_hubung/index');
        $config['total_rows'] = $this->Gardu_hubung_model->count_all_gardu_hubung();
        $config['per_page'] = $per_page;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;

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

        // Ambil nomor halaman dari URI
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
    $data['gardu_hubung'] = $this->Gardu_hubung_model->get_gardu_hubung($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;
    $data['per_page'] = $per_page;
    $data['total_rows'] = $config['total_rows'];

        $this->load->view('layout/header');
        $this->load->view('gardu_hubung/vw_gardu_hubung', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'SSOTNUMBER_GH'  => $this->input->post('SSOTNUMBER_GH'),
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'GARDU_HUBUNG'   => $this->input->post('GARDU_HUBUNG'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'ADDRESS'        => $this->input->post('ADDRESS'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'KOMUNIKASI'     => $this->input->post('KOMUNIKASI'),
                'TGL_INTEGRASI'  => $this->input->post('TGL_INTEGRASI'),
                'TGL_PASANG_BATT'=> $this->input->post('TGL_PASANG_BATT'),
            ];
            $this->Gardu_hubung_model->insert_gardu_hubung($insertData);
            $this->session->set_flashdata('success', 'Data Gardu Hubung berhasil ditambahkan!');
            redirect('Gardu_hubung');
        } else {
            $data['title'] = 'Tambah Data Gardu Hubung';
            $this->load->view('layout/header');
            $this->load->view('gardu_hubung/vw_tambah_gardu_hubung', $data);
            $this->load->view('layout/footer');
        }
    }

    public function edit($id)
    {
        $data['gardu_hubung'] = $this->Gardu_hubung_model->get_gardu_hubung_by_id($id);
        if (empty($data['gardu_hubung'])) { show_404(); }
        if ($this->input->post()) {
            $updateData = [
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'GARDU_HUBUNG'   => $this->input->post('GARDU_HUBUNG'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'ADDRESS'        => $this->input->post('ADDRESS'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'KOMUNIKASI'     => $this->input->post('KOMUNIKASI'),
                'TGL_INTEGRASI'  => $this->input->post('TGL_INTEGRASI'),
                'TGL_PASANG_BATT'=> $this->input->post('TGL_PASANG_BATT'),
            ];
            $this->Gardu_hubung_model->update_gardu_hubung($id, $updateData);
            $this->session->set_flashdata('success', 'Data Gardu Hubung berhasil diperbarui!');
            redirect('Gardu_hubung');
        } else {
            $data['title'] = 'Edit Data Gardu Hubung';
            $this->load->view('layout/header');
            $this->load->view('gardu_hubung/vw_edit_gardu_hubung', $data);
            $this->load->view('layout/footer');
        }
    }

    public function detail($id)
    {
        $data['gardu_hubung'] = $this->Gardu_hubung_model->get_gardu_hubung_by_id($id);
        if (empty($data['gardu_hubung'])) { show_404(); }
        $data['title'] = 'Detail Data Gardu Hubung';
        $this->load->view('layout/header');
        $this->load->view('gardu_hubung/vw_detail_gardu_hubung', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id)
    {
        $this->Gardu_hubung_model->delete_gardu_hubung($id);
        $this->session->set_flashdata('success', 'Data Gardu Hubung berhasil dihapus!');
        redirect('Gardu_hubung');
    }
}
