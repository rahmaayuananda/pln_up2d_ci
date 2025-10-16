<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemutus extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model Pemutus_model
        $this->load->model('Pemutus_model');
        // Load helper dan library
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination']);
    }

    // 🔹 Halaman utama - tampilkan semua data Pemutus (LBS Recloser)
    public function index()
    {
        $data['title'] = 'Data Pemutus (LBS Recloser)';

        // Konfigurasi paginasi
        $config['base_url'] = site_url('pemutus/index');
        $config['total_rows'] = $this->Pemutus_model->count_all_pemutus();
        $config['per_page'] = 5;
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
        $data['pemutus'] = $this->Pemutus_model->get_pemutus($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;

        $this->load->view('layout/header');
        $this->load->view('pemutus/vw_pemutus', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Tambah data baru
    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'SSOTNUMBER_LBSREC' => $this->input->post('SSOTNUMBER_LBSREC'),
                'UNIT_LAYANAN'      => $this->input->post('UNIT_LAYANAN'),
                'PENYULANG'         => $this->input->post('PENYULANG'),
                'KEYPOINT'          => $this->input->post('KEYPOINT'),
                'FUNGSI_KP'         => $this->input->post('FUNGSI_KP'),
                'STATUS_SCADA'      => $this->input->post('STATUS_SCADA'),
                'MEDIA_KOMDAT'      => $this->input->post('MEDIA_KOMDAT'),
                'MERK_KOMDAT'       => $this->input->post('MERK_KOMDAT')
            ];

            $this->Pemutus_model->insert_pemutus($insertData);
            $this->session->set_flashdata('success', 'Data Pemutus berhasil ditambahkan!');
            redirect('Pemutus');
        } else {
            $data['title'] = 'Tambah Data Pemutus';
            $this->load->view('layout/header');
            $this->load->view('pemutus/vw_tambah_pemutus', $data);
            $this->load->view('layout/footer');
        }
    }

    // 🔹 Edit data
    public function edit($ssotnumber)
    {
        $data['pemutus'] = $this->Pemutus_model->get_pemutus_by_id($ssotnumber);
        if (empty($data['pemutus'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'UNIT_LAYANAN' => $this->input->post('UNIT_LAYANAN'),
                'PENYULANG'    => $this->input->post('PENYULANG'),
                'KEYPOINT'     => $this->input->post('KEYPOINT'),
                'FUNGSI_KP'    => $this->input->post('FUNGSI_KP'),
                'STATUS_SCADA' => $this->input->post('STATUS_SCADA'),
                'MEDIA_KOMDAT' => $this->input->post('MEDIA_KOMDAT'),
                'MERK_KOMDAT'  => $this->input->post('MERK_KOMDAT')
            ];

            $this->Pemutus_model->update_pemutus($ssotnumber, $updateData);
            $this->session->set_flashdata('success', 'Data Pemutus berhasil diperbarui!');
            redirect('Pemutus');
        } else {
            $data['title'] = 'Edit Data Pemutus';
            $this->load->view('layout/header');
            $this->load->view('pemutus/vw_edit_pemutus', $data);
            $this->load->view('layout/footer');
        }
    }

    // 🔹 Detail data
    public function detail($ssotnumber)
    {
        $data['pemutus'] = $this->Pemutus_model->get_pemutus_by_id($ssotnumber);
        if (empty($data['pemutus'])) {
            show_404();
        }

        $data['title'] = 'Detail Data Pemutus';
        $this->load->view('layout/header');
        $this->load->view('pemutus/vw_detail_pemutus', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Hapus data
    public function hapus($ssotnumber)
    {
        $this->Pemutus_model->delete_pemutus($ssotnumber);
        $this->session->set_flashdata('success', 'Data Pemutus berhasil dihapus!');
        redirect('Pemutus');
    }
}
