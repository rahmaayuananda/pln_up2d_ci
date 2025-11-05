<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembangkit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Pembangkit_model');
        // Load helper dan library
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'pagination']);
    }

    // Halaman utama - tampilkan semua data pembangkit
    public function index()
    {
        $data['title'] = 'Data Pembangkit';

        // Konfigurasi paginasi
        $config['base_url'] = site_url('pembangkit/index');
        $config['total_rows'] = $this->Pembangkit_model->count_all_pembangkit();
        // Per-page selector (from ?per_page), use config default_per_page
        $allowedPerPage = [5,10,25,50,100,500];
        $requestedPer = (int) $this->input->get('per_page');
        $defaultPer = (int) $this->config->item('default_per_page');
        $perPage = in_array($requestedPer, $allowedPerPage) ? $requestedPer : $defaultPer;
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
    $data['pembangkit'] = $this->Pembangkit_model->get_pembangkit($config['per_page'], $offset);
    $data['pagination'] = $this->pagination->create_links();
    $data['start_no'] = $offset + 1;
    $data['total_rows'] = $config['total_rows'];
    $data['per_page'] = $perPage;

        $this->load->view('layout/header');
        $this->load->view('pembangkit/vw_pembangkit', $data);
        $this->load->view('layout/footer');
    }

    // Tambah data baru
    public function tambah()
    {
        if (!can_create()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk menambah data');
            redirect($this->router->fetch_class());
        }

        if ($this->input->post()) {
            $insertData = [
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'PEMBANGKIT'     => $this->input->post('PEMBANGKIT'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'INC'            => $this->input->post('INC'),
                'OGF'            => $this->input->post('OGF'),
                'SPARE'          => $this->input->post('SPARE'),
                'COUPLE'         => $this->input->post('COUPLE'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'SN_RTU'         => $this->input->post('SN_RTU'),
                'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
            ];

            $this->Pembangkit_model->insert_pembangkit($insertData);
            $this->session->set_flashdata('success', 'Data pembangkit berhasil ditambahkan!');
            redirect('Pembangkit');
        } else {
            $data['title'] = 'Tambah Data Pembangkit';
            $this->load->view('layout/header');
            $this->load->view('pembangkit/vw_tambah_pembangkit', $data);
            $this->load->view('layout/footer');
        }
    }

    // Edit data pembangkit
    public function edit($id)
    {
        if (!can_edit()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk mengubah data');
            redirect($this->router->fetch_class());
        }

        $data['pembangkit'] = $this->Pembangkit_model->get_pembangkit_by_id($id);
        if (empty($data['pembangkit'])) {
            show_404();
        }

        if ($this->input->post()) {
            $updateData = [
                'UNIT_LAYANAN'   => $this->input->post('UNIT_LAYANAN'),
                'PEMBANGKIT'     => $this->input->post('PEMBANGKIT'),
                'LONGITUDEX'     => $this->input->post('LONGITUDEX'),
                'LATITUDEY'      => $this->input->post('LATITUDEY'),
                'STATUS_OPERASI' => $this->input->post('STATUS_OPERASI'),
                'INC'            => $this->input->post('INC'),
                'OGF'            => $this->input->post('OGF'),
                'SPARE'          => $this->input->post('SPARE'),
                'COUPLE'         => $this->input->post('COUPLE'),
                'STATUS_SCADA'   => $this->input->post('STATUS_SCADA'),
                'IP_GATEWAY'     => $this->input->post('IP_GATEWAY'),
                'IP_RTU'         => $this->input->post('IP_RTU'),
                'MERK_RTU'       => $this->input->post('MERK_RTU'),
                'SN_RTU'         => $this->input->post('SN_RTU'),
                'THN_INTEGRASI'  => $this->input->post('THN_INTEGRASI'),
            ];

            $update_success = $this->Pembangkit_model->update_pembangkit($id, $updateData);
            
            // Log aktivitas update
            if ($update_success) {
                log_update('pembangkit', $id, $updateData['PEMBANGKIT']);
            }
            
            $this->session->set_flashdata('success', 'Data pembangkit berhasil diperbarui!');
            redirect('Pembangkit');
        } else {
            $data['title'] = 'Edit Data Pembangkit';
            $this->load->view('layout/header');
            $this->load->view('pembangkit/vw_edit_pembangkit', $data);
            $this->load->view('layout/footer');
        }
    }

    // Detail data pembangkit
    public function detail($id)
    {
        $data['pembangkit'] = $this->Pembangkit_model->get_pembangkit_by_id($id);
        if (empty($data['pembangkit'])) {
            show_404();
        }

        $data['title'] = 'Detail Data Pembangkit';
        $this->load->view('layout/header');
        $this->load->view('pembangkit/vw_detail_pembangkit', $data);
        $this->load->view('layout/footer');
    }

    // Hapus data pembangkit
    public function hapus($id)
    {
        if (!can_delete()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk menghapus data');
            redirect($this->router->fetch_class());
        }

        // Get data before delete for logging
        $pembangkit = $this->Pembangkit_model->get_pembangkit_by_id($id);
        $pembangkit_name = $pembangkit ? ($pembangkit['PEMBANGKIT'] ?? 'ID-' . $id) : 'ID-' . $id;
        
        $delete_success = $this->Pembangkit_model->delete_pembangkit($id);
        
        // Log aktivitas delete
        if ($delete_success) {
            log_delete('pembangkit', $id, $pembangkit_name);
        }
        
        $this->session->set_flashdata('success', 'Data pembangkit berhasil dihapus!');
        redirect('Pembangkit');
    }

    // Export Pembangkit data to CSV
    public function export_csv()
    {
        $all = $this->Pembangkit_model->get_all_pembangkit();
        $label = 'Data Pembangkit';
        $filename = $label . ' ' . date('d-m-Y') . '.csv';

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');
        // UTF-8 BOM for Excel
        fwrite($output, "\xEF\xBB\xBF");

        if (empty($all)) {
            fputcsv($output, ['No data']);
            fclose($output);
            exit;
        }

        $headers = array_keys($all[0]);
        fputcsv($output, $headers);

        foreach ($all as $row) {
            $line = [];
            foreach ($headers as $h) {
                $line[] = isset($row[$h]) ? $row[$h] : '';
            }
            fputcsv($output, $line);
        }

        fclose($output);
        exit;
    }
}
