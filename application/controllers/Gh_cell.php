<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gh_cell extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Gh_cell_model');
        // Load helper dan library
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination']);
    }

    // Halaman utama - tampilkan semua data GH Cell
    public function index()
    {
        $data['title'] = 'Data GH Cell';

        // Get per_page from query string, default 5
        $per_page = $this->input->get('per_page');
        $allowed_per_page = [5, 10, 25, 50, 100, 500];
        if (!in_array($per_page, $allowed_per_page)) {
            $per_page = 5;
        }

        // Konfigurasi paginasi
        $config['base_url'] = site_url('gh_cell/index');
        $config['total_rows'] = $this->Gh_cell_model->count_all_gh_cell();
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
        $data['gh_cell'] = $this->Gh_cell_model->get_gh_cell($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;
        $data['per_page'] = $per_page;
        $data['total_rows'] = $config['total_rows'];

        $this->load->view('layout/header');
        $this->load->view('gh_cell/vw_gh_cell', $data);
        $this->load->view('layout/footer');
    }

    // Tambah data baru
    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'CXUNIT'                 => $this->input->post('CXUNIT'),
                'UNITNAME'               => $this->input->post('UNITNAME'),
                'ASSETNUM'               => $this->input->post('ASSETNUM'),
                'SSOTNUMBER'             => $this->input->post('SSOTNUMBER'),
                'LOCATION'               => $this->input->post('LOCATION'),
                'DESCRIPTION'            => $this->input->post('DESCRIPTION'),
                'VENDOR'                 => $this->input->post('VENDOR'),
                'MANUFACTURER'           => $this->input->post('MANUFACTURER'),
                'INSTALLDATE'            => $this->input->post('INSTALLDATE'),
                'PRIORITY'               => $this->input->post('PRIORITY'),
                'STATUS'                 => $this->input->post('STATUS'),
                'TUJDNUMBER'             => $this->input->post('TUJDNUMBER'),
                'CHANGEBY'               => $this->input->post('CHANGEBY'),
                'CHANGEDATE'             => $this->input->post('CHANGEDATE'),
                'CXCLASSIFICATIONDESC'   => $this->input->post('CXCLASSIFICATIONDESC'),
                'CXPENYULANG'            => $this->input->post('CXPENYULANG'),
                'NAMA_LOCATION'          => $this->input->post('NAMA_LOCATION'),
                'LONGITUDEX'             => $this->input->post('LONGITUDEX'),
                'LATITUDEY'              => $this->input->post('LATITUDEY'),
                'BURDEN'                 => $this->input->post('BURDEN'),
                'FAKTOR_KALI'            => $this->input->post('FAKTOR_KALI'),
                'ISASSET'                => $this->input->post('ISASSET'),
                'JENIS_CT'               => $this->input->post('JENIS_CT'),
                'KELAS_CT'               => $this->input->post('KELAS_CT'),
                'KELAS_PROTEKSI'         => $this->input->post('KELAS_PROTEKSI'),
                'PRIMER_SEKUNDER'        => $this->input->post('PRIMER_SEKUNDER'),
                'STATUS_KEPEMILIKAN'     => $this->input->post('STATUS_KEPEMILIKAN'),
                'TIPE_CT'                => $this->input->post('TIPE_CT')
            ];

            $this->Gh_cell_model->insert_gh_cell($insertData);
            $this->session->set_flashdata('success', 'Data GH Cell berhasil ditambahkan!');
            redirect('Gh_cell');
        } else {
            $data['title'] = 'Tambah Data GH Cell';
            $this->load->view('layout/header');
            $this->load->view('gh_cell/vw_tambah_gh_cell', $data);
            $this->load->view('layout/footer');
        }
    }

    // Edit data
    public function edit($id)
    {
        $data['gh_cell'] = $this->Gh_cell_model->get_gh_cell_by_id($id);
        if (empty($data['gh_cell'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'CXUNIT'                 => $this->input->post('CXUNIT'),
                'UNITNAME'               => $this->input->post('UNITNAME'),
                'ASSETNUM'               => $this->input->post('ASSETNUM'),
                'LOCATION'               => $this->input->post('LOCATION'),
                'DESCRIPTION'            => $this->input->post('DESCRIPTION'),
                'VENDOR'                 => $this->input->post('VENDOR'),
                'MANUFACTURER'           => $this->input->post('MANUFACTURER'),
                'INSTALLDATE'            => $this->input->post('INSTALLDATE'),
                'PRIORITY'               => $this->input->post('PRIORITY'),
                'STATUS'                 => $this->input->post('STATUS'),
                'TUJDNUMBER'             => $this->input->post('TUJDNUMBER'),
                'CHANGEBY'               => $this->input->post('CHANGEBY'),
                'CHANGEDATE'             => $this->input->post('CHANGEDATE'),
                'CXCLASSIFICATIONDESC'   => $this->input->post('CXCLASSIFICATIONDESC'),
                'CXPENYULANG'            => $this->input->post('CXPENYULANG'),
                'NAMA_LOCATION'          => $this->input->post('NAMA_LOCATION'),
                'LONGITUDEX'             => $this->input->post('LONGITUDEX'),
                'LATITUDEY'              => $this->input->post('LATITUDEY'),
                'BURDEN'                 => $this->input->post('BURDEN'),
                'FAKTOR_KALI'            => $this->input->post('FAKTOR_KALI'),
                'ISASSET'                => $this->input->post('ISASSET'),
                'JENIS_CT'               => $this->input->post('JENIS_CT'),
                'KELAS_CT'               => $this->input->post('KELAS_CT'),
                'KELAS_PROTEKSI'         => $this->input->post('KELAS_PROTEKSI'),
                'PRIMER_SEKUNDER'        => $this->input->post('PRIMER_SEKUNDER'),
                'STATUS_KEPEMILIKAN'     => $this->input->post('STATUS_KEPEMILIKAN'),
                'TIPE_CT'                => $this->input->post('TIPE_CT')
            ];

            $this->Gh_cell_model->update_gh_cell($id, $updateData);
            $this->session->set_flashdata('success', 'Data GH Cell berhasil diperbarui!');
            redirect('Gh_cell');
        } else {
            $data['title'] = 'Edit Data GH Cell';
            $this->load->view('layout/header');
            $this->load->view('gh_cell/vw_edit_gh_cell', $data);
            $this->load->view('layout/footer');
        }
    }

    // Detail data
    public function detail($id)
    {
        $data['gh_cell'] = $this->Gh_cell_model->get_gh_cell_by_id($id);
        if (empty($data['gh_cell'])) {
            show_404();
        }

        $data['title'] = 'Detail Data GH Cell';
        $this->load->view('layout/header');
        $this->load->view('gh_cell/vw_detail_gh_cell', $data);
        $this->load->view('layout/footer');
    }

    // Hapus data
    public function hapus($id)
    {
        $this->Gh_cell_model->delete_gh_cell($id);
        $this->session->set_flashdata('success', 'Data GH Cell berhasil dihapus!');
        redirect('Gh_cell');
    }
}
