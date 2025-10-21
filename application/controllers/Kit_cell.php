<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property Kit_cell_model $kit_cell_model
 * @property Pembangkit_model $Pembangkit_model
 * @property CI_Input $input
 * @property CI_Session $session
 * @property CI_Pagination $pagination
 * @property CI_URI $uri
 * @property CI_Config $config
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
                'SSOTNUMBER' => $this->input->post('SSOTNUMBER'),
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

            $original = $this->input->post('original_SSOTNUMBER') ?: $id;

            $updateData = [
                'SSOTNUMBER' => $this->input->post('SSOTNUMBER') ?: $this->input->post('original_SSOTNUMBER'),
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
                'ID_PEMBANGKIT'  => $id_pembangkit,
                // additional list-view fields
                'CXUNIT' => $this->input->post('CXUNIT'),
                'UNITNAME' => $this->input->post('UNITNAME'),
                'LOCATION' => $this->input->post('LOCATION'),
                'DESCRIPTION' => $this->input->post('DESCRIPTION'),
                'VENDOR' => $this->input->post('VENDOR'),
                'MANUFACTURER' => $this->input->post('MANUFACTURER'),
                'INSTALLDATE' => $this->input->post('INSTALLDATE'),
                'PRIORITY' => $this->input->post('PRIORITY'),
                'STATUS' => $this->input->post('STATUS'),
                'TUJDNUMBER' => $this->input->post('TUJDNUMBER'),
                'CHANGEBY' => $this->input->post('CHANGEBY'),
                'CHANGEDATE' => $this->input->post('CHANGEDATE'),
                'CXCLASSIFICATIONDESC' => $this->input->post('CXCLASSIFICATIONDESC'),
                'CXPENYULANG' => $this->input->post('CXPENYULANG'),
                'NAMA_LOCATION' => $this->input->post('NAMA_LOCATION'),
                'LONGITUDEX' => $this->input->post('LONGITUDEX'),
                'LATITUDEY' => $this->input->post('LATITUDEY'),
                'ISASSET' => $this->input->post('ISASSET'),
                'STATUS_KEPEMILIKAN' => $this->input->post('STATUS_KEPEMILIKAN'),
                'BURDEN' => $this->input->post('BURDEN'),
                'FAKTOR_KALI' => $this->input->post('FAKTOR_KALI'),
                'JENIS_CT' => $this->input->post('JENIS_CT'),
                'KELAS_CT' => $this->input->post('KELAS_CT'),
                'KELAS_PROTEKSI' => $this->input->post('KELAS_PROTEKSI'),
                'PRIMER_SEKUNDER' => $this->input->post('PRIMER_SEKUNDER'),
                'TIPE_CT' => $this->input->post('TIPE_CT'),
                'OWNERSYSID' => $this->input->post('OWNERSYSID'),
                'ISOLASI_KUBIKEL' => $this->input->post('ISOLASI_KUBIKEL'),
                'JENIS_MVCELL' => $this->input->post('JENIS_MVCELL'),
                'TH_BUAT' => $this->input->post('TH_BUAT'),
                'TYPE_MVCELL' => $this->input->post('TYPE_MVCELL'),
                'CELL_TYPE' => $this->input->post('CELL_TYPE'),
            ];

            $this->kit_cell_model->update_kit_cell($original, $updateData);
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

    // Export semua data KIT Cell ke CSV
    public function export_csv()
    {
        $all = $this->kit_cell_model->get_all_kit_cell();

        $label = 'Data KIT Cell';
        $filename = $label . ' ' . date('d-m-Y') . '.csv';
        header('Content-Type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');
        // tulis BOM UTF-8 supaya Excel mengenali encoding
        fwrite($output, "\xEF\xBB\xBF");

        if (empty($all)) {
            fputcsv($output, ['No data']);
            fclose($output);
            exit;
        }

        $first = $all[0];
        $headers = array_keys($first);
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
