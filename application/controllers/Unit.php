<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Unit_model');
        // Load helper untuk URL
        $this->load->helper(['url', 'form']);
        // Load library session (untuk flashdata) dan pagination
        $this->load->library(['session', 'pagination']);
    }

    // Export semua data unit ke CSV yang kompatibel dengan Excel
    public function export_csv()
    {
        // Ambil semua data
        $all = $this->Unit_model->get_all_units();

        // Set headers untuk download CSV (Excel-friendly)
    // Human-friendly label for this export
    $label = 'Data Unit';
    // Filename format requested: "Data Unit dd-mm-yyyy.csv"
    $filename = $label . ' ' . date('d-m-Y') . '.csv';
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');
        // tulis BOM UTF-8 supaya Excel mengenali encoding
        fwrite($output, "\xEF\xBB\xBF");

        // Jika tidak ada data, kirim header saja
        if (empty($all)) {
            fputcsv($output, ['No data']);
            fclose($output);
            exit;
        }

        // header CSV: ambil keys dari baris pertama
        $first = $all[0];
        $headers = array_keys($first);
        // optionally rename ID_UNIT to ID
        fputcsv($output, $headers);

        // tulis setiap baris
        $no = 1;
        foreach ($all as $row) {
            // convert all values to string, preserve order
            $line = [];
            foreach ($headers as $h) {
                $line[] = isset($row[$h]) ? $row[$h] : '';
            }
            fputcsv($output, $line);
        }

        fclose($output);
        exit;
    }

    // Halaman utama - tampilkan semua data dengan paginasi
    public function index()
    {
        $data['title'] = 'Data Unit';

        // Konfigurasi paginasi
        $config['base_url'] = site_url('unit/index');
    $config['total_rows'] = $this->Unit_model->count_all_unit();
    // gunakan default terpusat dari config
    $allowedPerPage = [5,10,25,50,100,500];
    $requestedPer = (int) $this->input->get('per_page');
    $defaultPer = (int) $this->config->item('default_per_page');
    $config['per_page'] = in_array($requestedPer, $allowedPerPage) ? $requestedPer : $defaultPer;
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

        // Ambil nomor halaman dari URI, default ke 1 jika tidak ada
        $page = ($this->uri->segment(3)) ? (int)$this->uri->segment(3) : 1;
        if ($page <= 0) {
            $page = 1;
        }

        // Hitung offset
        $offset = ($page - 1) * $config['per_page'];

        // Inisialisasi paginasi
        $this->pagination->initialize($config);

        // Ambil data untuk halaman saat ini
    $data['unit'] = $this->Unit_model->get_unit($config['per_page'], $offset);
        $data['pagination'] = $this->pagination->create_links();
        $data['start_no'] = $offset + 1;
    $data['per_page'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];

        $this->load->view('layout/header');
        $this->load->view('unit/vw_unit', $data);
        $this->load->view('layout/footer');
    }

    // Tambah data baru
    public function tambah()
    {
        if ($this->input->post()) {
            $insertData = [
                'UNIT_PELAKSANA' => $this->input->post('UNIT_PELAKSANA'),
                'UNIT_LAYANAN' => $this->input->post('UNIT_LAYANAN'),
                'LONGITUDEX' => $this->input->post('LONGITUDEX'),
                'LATITUDEY' => $this->input->post('LATITUDEY'),
                'ADDRESS' => $this->input->post('ADDRESS')
            ];

            $this->Unit_model->insert_unit($insertData);
            $this->session->set_flashdata('success', 'Data Unit berhasil ditambahkan!');
            redirect('Unit');
        } else {
            $data['title'] = 'Tambah Data Unit';
            $this->load->view('layout/header');
            $this->load->view('unit/vw_tambah_unit', $data);
            $this->load->view('layout/footer');
        }
    }

    // Edit data
    public function edit($id)
    {
        $data['unit'] = $this->Unit_model->get_unit_by_id($id);
        if (empty($data['unit'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'UNIT_PELAKSANA' => $this->input->post('UNIT_PELAKSANA'),
                'UNIT_LAYANAN' => $this->input->post('UNIT_LAYANAN'),
                'LONGITUDEX' => $this->input->post('LONGITUDEX'),
                'LATITUDEY' => $this->input->post('LATITUDEY'),
                'ADDRESS' => $this->input->post('ADDRESS')
            ];

            $this->Unit_model->update_unit($id, $updateData);
            $this->session->set_flashdata('success', 'Data Unit berhasil diperbarui!');
            redirect('Unit');
        } else {
            $data['title'] = 'Edit Data Unit';
            $this->load->view('layout/header');
            $this->load->view('unit/vw_edit_unit', $data);
            $this->load->view('layout/footer');
        }
    }

    // Detail data
    public function detail($id)
    {
        $data['unit'] = $this->Unit_model->get_unit_by_id($id);
        if (empty($data['unit'])) {
            show_404();
        }

        $data['title'] = 'Detail Data Unit';
        $this->load->view('layout/header');
        $this->load->view('unit/vw_detail_unit', $data);
        $this->load->view('layout/footer');
    }

    // Hapus data
    public function hapus($id)
    {
        $this->Unit_model->delete_unit($id);
        $this->session->set_flashdata('success', 'Data Unit berhasil dihapus!');
        redirect('Unit');
    }
}