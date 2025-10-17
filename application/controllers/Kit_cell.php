<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Kit_cell_model $Kit_cell_model
 * @property Pembangkit_model $Pembangkit_model
 * @property CI_Input $input
 * @property CI_Session $session
 */
class Kit_cell extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
    $this->load->model('Kit_cell_model', 'kit_cell_model');
        $this->load->model('Pembangkit_model');
        // Load helper dan library
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination']);
    }

    // 🔹 Halaman utama - tampilkan semua data KIT Cell
    public function index()
    {
        $data['title'] = 'Data KIT Cell';

        // Konfigurasi paginasi
        $config['base_url'] = site_url('kit_cell/index');
    $config['total_rows'] = $this->kit_cell_model->count_all_kit_cell();
    // Per-page selector (from ?per_page), default 5
    $allowedPerPage = [5,10,25,50,100,500];
    $requestedPer = (int) $this->input->get('per_page');
    $perPage = in_array($requestedPer, $allowedPerPage) ? $requestedPer : 5;
    $config['per_page'] = $perPage;
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
        $data['kit_cell'] = $this->kit_cell_model->get_kit_cell($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;
        $data['total_rows'] = $config['total_rows'];
        $data['per_page'] = $perPage;

        $this->load->view('layout/header');
        $this->load->view('kit_cell/vw_kit_cell', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Tambah data baru
    public function tambah()
    {
        if ($this->input->post()) {
            // Normalisasi dan validasi FK ID_PEMBANGKIT
            $id_pembangkit = trim((string)$this->input->post('ID_PEMBANGKIT'));
            if ($id_pembangkit === '') {
                $id_pembangkit = null; // izinkan kosong
            } else {
                $cek = $this->Pembangkit_model->get_pembangkit_by_id($id_pembangkit);
                if (!$cek) {
                    $this->session->set_flashdata('error', 'ID Pembangkit tidak valid. Silakan pilih dari daftar yang tersedia.');
                    redirect('Kit_cell/tambah');
                    return;
                }
            }

            $insertData = [
                'SSOTNUMBER_KIT_CELL' => $this->input->post('SSOTNUMBER_KIT_CELL'),
                'PEMBANGKIT'          => $this->input->post('PEMBANGKIT'),
                'NAMA_CELL'           => $this->input->post('NAMA_CELL'),
                'JENIS_CELL'          => $this->input->post('JENIS_CELL'),
                'STATUS_OPERASI'      => $this->input->post('STATUS_OPERASI'),
                'MERK_CELL'           => $this->input->post('MERK_CELL'),
                'TYPE_CELL'           => $this->input->post('TYPE_CELL'),
                'THN_CELL'            => $this->input->post('THN_CELL'),
                'STATUS_SCADA'        => $this->input->post('STATUS_SCADA'),
                'MERK_RELAY'          => $this->input->post('MERK_RELAY'),
                'TYPE_RELAY'          => $this->input->post('TYPE_RELAY'),
                'THN_RELAY'           => $this->input->post('THN_RELAY'),
                'RATIO_CT'            => $this->input->post('RATIO_CT'),
                'ID_PEMBANGKIT'       => $id_pembangkit
            ];

            $this->kit_cell_model->insert_kit_cell($insertData);
            $this->session->set_flashdata('success', 'Data KIT Cell berhasil ditambahkan!');
            redirect('Kit_cell');
        } else {
            $data['title'] = 'Tambah Data KIT Cell';
            // daftar pembangkit untuk dropdown
            $data['pembangkit_list'] = $this->Pembangkit_model->get_all_pembangkit();
            $this->load->view('layout/header');
            $this->load->view('kit_cell/vw_tambah_kit_cell', $data);
            $this->load->view('layout/footer');
        }
    }

    // 🔹 Edit data
    public function edit($id)
    {
    $data['kit_cell'] = $this->kit_cell_model->get_kit_cell_by_id($id);
        if (empty($data['kit_cell'])) {
            show_404();
        }

        if ($this->input->post()) {
            // Normalisasi dan validasi FK ID_PEMBANGKIT
            $id_pembangkit = trim((string)$this->input->post('ID_PEMBANGKIT'));
            if ($id_pembangkit === '') {
                $id_pembangkit = null; // izinkan kosong
            } else {
                $cek = $this->Pembangkit_model->get_pembangkit_by_id($id_pembangkit);
                if (!$cek) {
                    $this->session->set_flashdata('error', 'ID Pembangkit tidak valid. Silakan pilih dari daftar yang tersedia.');
                    redirect('Kit_cell/edit/' . $id);
                    return;
                }
            }

            $updateData = [
                'PEMBANGKIT'     => $this->input->post('PEMBANGKIT'),
                'NAMA_CELL'      => $this->input->post('NAMA_CELL'),
                'JENIS_CELL'     => $this->input->post('JENIS_CELL'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'MERK_CELL'      => $this->input->post('MERK_CELL'),
                'TYPE_CELL'      => $this->input->post('TYPE_CELL'),
                'THN_CELL'       => $this->input->post('THN_CELL'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'MERK_RELAY'     => $this->input->post('MERK_RELAY'),
                'TYPE_RELAY'     => $this->input->post('TYPE_RELAY'),
                'THN_RELAY'      => $this->input->post('THN_RELAY'),
                'RATIO_CT'       => $this->input->post('RATIO_CT'),
                'ID_PEMBANGKIT'  => $id_pembangkit
            ];

            $this->kit_cell_model->update_kit_cell($id, $updateData);
            $this->session->set_flashdata('success', 'Data KIT Cell berhasil diperbarui!');
            redirect('Kit_cell');
        } else {
            $data['title'] = 'Edit Data KIT Cell';
            // daftar pembangkit untuk dropdown
            $data['pembangkit_list'] = $this->Pembangkit_model->get_all_pembangkit();
            $this->load->view('layout/header');
            $this->load->view('kit_cell/vw_edit_kit_cell', $data);
            $this->load->view('layout/footer');
        }
    }

    // 🔹 Detail data
    public function detail($id)
    {
    $data['kit_cell'] = $this->kit_cell_model->get_kit_cell_by_id($id);
        if (empty($data['kit_cell'])) {
            show_404();
        }

        $data['title'] = 'Detail Data KIT Cell';
        $this->load->view('layout/header');
        $this->load->view('kit_cell/vw_detail_kit_cell', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Hapus data
    public function hapus($id)
    {
    $this->kit_cell_model->delete_kit_cell($id);
        $this->session->set_flashdata('success', 'Data KIT Cell berhasil dihapus!');
        redirect('Kit_cell');
    }
}
