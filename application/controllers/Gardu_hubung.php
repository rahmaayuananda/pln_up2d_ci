<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller for Gardu Hubung
 *
 * @property CI_Input $input
 * @property CI_Session $session
 * @property Gardu_hubung_model $Gardu_hubung_model
 * @property CI_Pagination $pagination
 * @property CI_URI $uri
 * @property CI_Config $config
 */
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
        if (!can_create()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk menambah data');
            redirect('Gardu_hubung');
        }
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
        if (!can_edit()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk mengubah data');
            redirect('Gardu_hubung');
        }
        $data['gardu_hubung'] = $this->Gardu_hubung_model->get_gardu_hubung_by_id($id);
        if (empty($data['gardu_hubung'])) { show_404(); }

    // Ensure keys exist for the edit view (extend with all fields present in list view)
    $expected = ['UP3_2D','UNITNAME_UP3','CXUNIT','UNITNAME','LOCATION','SSOTNUMBER','DESCRIPTION','STATUS','TUJDNUMBER','ASSETCLASSHI','SADDRESSCODE','CXCLASSIFICATIONDESC','PENYULANG','PARENT','PARENT_DESCRIPTION','INSTALLDATE','ACTUALOPRDATE','CHANGEDATE','CHANGEBY','LATITUDEY','LONGITUDEX','FORMATTEDADDRESS','STREETADDRESS','CITY','ISASSET','STATUS_KEPEMILIKAN','EXTERNALREFID','JENIS_PELAYANAN','NO_SLO','OWNERSYSID','SLOACTIVEDATE','STATUS_RC','TYPE_GARDU','UNIT_LAYANAN','GARDU_HUBUNG','IP_GATEWAY','IP_RTU','MERK_RTU','KOMUNIKASI','TGL_INTEGRASI','TGL_PASANG_BATT','SSOTNUMBER_GH'];
        foreach ($expected as $k) {
            if (!array_key_exists($k, $data['gardu_hubung'])) {
                $data['gardu_hubung'][$k] = '';
            }
        }

        if ($this->input->post()) {
            // allow changing SSOTNUMBER; use original_SSOTNUMBER for WHERE
            $original = $this->input->post('original_SSOTNUMBER') ? $this->input->post('original_SSOTNUMBER') : $id;
            $updateData = [
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
                'EXTERNALREFID' => $this->input->post('EXTERNALREFID'),
                'JENIS_PELAYANAN' => $this->input->post('JENIS_PELAYANAN'),
                'NO_SLO' => $this->input->post('NO_SLO'),
                'OWNERSYSID' => $this->input->post('OWNERSYSID'),
                'SLOACTIVEDATE' => $this->input->post('SLOACTIVEDATE'),
                'STATUS_RC' => $this->input->post('STATUS_RC'),
                'TYPE_GARDU' => $this->input->post('TYPE_GARDU'),
                'UNIT_LAYANAN' => $this->input->post('UNIT_LAYANAN'),
                'GARDU_HUBUNG' => $this->input->post('GARDU_HUBUNG'),
                'IP_GATEWAY' => $this->input->post('IP_GATEWAY'),
                'IP_RTU' => $this->input->post('IP_RTU'),
                'MERK_RTU' => $this->input->post('MERK_RTU'),
                'KOMUNIKASI' => $this->input->post('KOMUNIKASI'),
                'TGL_INTEGRASI' => $this->input->post('TGL_INTEGRASI'),
                'TGL_PASANG_BATT' => $this->input->post('TGL_PASANG_BATT'),
            ];
            $update_success = $this->Gardu_hubung_model->update_gardu_hubung($original, $updateData);
            
            // Log aktivitas update
            if ($update_success) {
                log_update('gardu_hubung', $original, $updateData['GARDU_HUBUNG']);
            }
            
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
        if (!can_delete()) {
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses untuk menghapus data');
            redirect('Gardu_hubung');
        }
        
        // Get data before delete for logging
        $gardu = $this->Gardu_hubung_model->get_gardu_hubung_by_id($id);
        $gardu_name = $gardu ? ($gardu['GARDU_HUBUNG'] ?? 'ID-' . $id) : 'ID-' . $id;
        
        $delete_success = $this->Gardu_hubung_model->delete_gardu_hubung($id);
        
        // Log aktivitas delete
        if ($delete_success) {
            log_delete('gardu_hubung', $id, $gardu_name);
        }
        
        $this->session->set_flashdata('success', 'Data Gardu Hubung berhasil dihapus!');
        redirect('Gardu_hubung');
    }

    // Export Gardu Hubung data to CSV
    public function export_csv()
    {
        $all = $this->Gardu_hubung_model->get_all_gardu_hubung();
        $label = 'Data Gardu Hubung';
        $filename = $label . ' ' . date('d-m-Y') . '.csv';

        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');
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
