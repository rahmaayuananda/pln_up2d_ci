<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaduan_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'upload', 'session']);
    }

    // 🔹 Halaman utama
    public function index()
    {
        $data['judul'] = 'Data Pengaduan';
        $data['pengaduan'] = $this->Pengaduan_model->get_all_pengaduan();

        $this->load->view('layout/header', $data);
        $this->load->view('pengaduan/vw_pengaduan', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Fungsi Tambah Pengaduan
    public function tambah()
    {
        $data['judul'] = 'Tambah Pengaduan';

        $this->form_validation->set_rules('NAMA_UP3', 'Nama UP3', 'required');
        $this->form_validation->set_rules('TANGGAL_PENGADUAN', 'Tanggal Pengaduan', 'required');
        $this->form_validation->set_rules('JENIS_PENGADUAN', 'Jenis Pengaduan', 'required');
        $this->form_validation->set_rules('LAPORAN', 'Laporan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('pengaduan/vw_tambah_pengaduan', $data);
            $this->load->view('layout/footer');
        } else {
            // Konfigurasi upload
            $config['upload_path']   = './uploads/pengaduan/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, TRUE);
            }

            $this->upload->initialize($config);
            $foto_pengaduan = null;
            $foto_proses = null;

            // Upload FOTO_PENGADUAN
            if (!empty($_FILES['FOTO_PENGADUAN']['name'])) {
                if ($this->upload->do_upload('FOTO_PENGADUAN')) {
                    $foto_pengaduan = $this->upload->data('file_name');
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('layout/header', $data);
                    $this->load->view('pengaduan/vw_tambah_pengaduan', $data);
                    $this->load->view('layout/footer');
                    return;
                }
            }

            // Upload FOTO_PROSES
            if (!empty($_FILES['FOTO_PROSES']['name'])) {
                $config['upload_path'] = './uploads/proses/';
                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0777, TRUE);
                }
                $this->upload->initialize($config);
                if ($this->upload->do_upload('FOTO_PROSES')) {
                    $foto_proses = $this->upload->data('file_name');
                } else {
                    $data['error'] = $this->upload->display_errors();
                    $this->load->view('layout/header', $data);
                    $this->load->view('pengaduan/vw_tambah_pengaduan', $data);
                    $this->load->view('layout/footer');
                    return;
                }
            }

            // ✅ Tambahkan ITEM_PENGADUAN
            $insert_data = [
                'NAMA_UP3'          => $this->input->post('NAMA_UP3', true),
                'TANGGAL_PENGADUAN' => $this->input->post('TANGGAL_PENGADUAN', true),
                'JENIS_PENGADUAN'   => $this->input->post('JENIS_PENGADUAN', true),
                'ITEM_PENGADUAN'    => $this->input->post('ITEM_PENGADUAN', true),
                'LAPORAN'           => $this->input->post('LAPORAN', true),
                'FOTO_PENGADUAN'    => $foto_pengaduan,
                'TANGGAL_PROSES'    => $this->input->post('TANGGAL_PROSES', true),
                'FOTO_PROSES'       => $foto_proses,
                'STATUS'            => $this->input->post('STATUS', true),
                'PIC'               => $this->input->post('PIC', true),
            ];

            $this->Pengaduan_model->insert_pengaduan($insert_data);
            $this->session->set_flashdata('success', 'Data pengaduan berhasil ditambahkan!');
            redirect('pengaduan');
        }
    }

    // 🔹 Fungsi Detail
    public function detail($id)
    {
        $data['judul'] = 'Detail Pengaduan';
        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan_by_id($id);

        if (!$data['pengaduan']) {
            show_404();
        }

        $this->load->view('layout/header', $data);
        $this->load->view('pengaduan/vw_detail_pengaduan', $data);
        $this->load->view('layout/footer');
    }

    // 🔹 Fungsi Edit
    public function edit($id)
    {
        $data['judul'] = 'Edit Pengaduan';
        $data['pengaduan'] = $this->Pengaduan_model->get_pengaduan_by_id($id);

        if (!$data['pengaduan']) {
            show_404();
        }

        $this->form_validation->set_rules('NAMA_UP3', 'Nama UP3', 'required');
        $this->form_validation->set_rules('TANGGAL_PENGADUAN', 'Tanggal Pengaduan', 'required');
        $this->form_validation->set_rules('JENIS_PENGADUAN', 'Jenis Pengaduan', 'required');
        $this->form_validation->set_rules('LAPORAN', 'Laporan', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $data);
            $this->load->view('pengaduan/vw_edit_pengaduan', $data);
            $this->load->view('layout/footer');
        } else {
            // Upload FOTO_PENGADUAN
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['encrypt_name']  = TRUE;

            $config['upload_path'] = './uploads/pengaduan/';
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, TRUE);
            }
            $this->upload->initialize($config);

            $foto_pengaduan = $data['pengaduan']['FOTO_PENGADUAN'];
            $foto_proses = $data['pengaduan']['FOTO_PROSES'];

            if (!empty($_FILES['FOTO_PENGADUAN']['name'])) {
                if ($this->upload->do_upload('FOTO_PENGADUAN')) {
                    if ($foto_pengaduan && file_exists('./uploads/pengaduan/' . $foto_pengaduan)) {
                        unlink('./uploads/pengaduan/' . $foto_pengaduan);
                    }
                    $foto_pengaduan = $this->upload->data('file_name');
                }
            }

            // Upload FOTO_PROSES
            $config['upload_path'] = './uploads/proses/';
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, TRUE);
            }
            $this->upload->initialize($config);

            if (!empty($_FILES['FOTO_PROSES']['name'])) {
                if ($this->upload->do_upload('FOTO_PROSES')) {
                    if ($foto_proses && file_exists('./uploads/proses/' . $foto_proses)) {
                        unlink('./uploads/proses/' . $foto_proses);
                    }
                    $foto_proses = $this->upload->data('file_name');
                }
            }

            // ✅ Tambahkan ITEM_PENGADUAN
            $update_data = [
                'NAMA_UP3'          => $this->input->post('NAMA_UP3', true),
                'TANGGAL_PENGADUAN' => $this->input->post('TANGGAL_PENGADUAN', true),
                'JENIS_PENGADUAN'   => $this->input->post('JENIS_PENGADUAN', true),
                'ITEM_PENGADUAN'    => $this->input->post('ITEM_PENGADUAN', true),
                'LAPORAN'           => $this->input->post('LAPORAN', true),
                'FOTO_PENGADUAN'    => $foto_pengaduan,
                'TANGGAL_PROSES'    => $this->input->post('TANGGAL_PROSES', true),
                'FOTO_PROSES'       => $foto_proses,
                'STATUS'            => $this->input->post('STATUS', true),
                'PIC'               => $this->input->post('PIC', true),
            ];

            $this->Pengaduan_model->update_pengaduan($id, $update_data);
            $this->session->set_flashdata('success', 'Data pengaduan berhasil diperbarui!');
            redirect('pengaduan');
        }
    }

    // 🔹 Fungsi Hapus
    public function hapus($id)
    {
        $pengaduan = $this->Pengaduan_model->get_pengaduan_by_id($id);

        if ($pengaduan) {
            if (!empty($pengaduan['FOTO_PENGADUAN']) && file_exists('./uploads/pengaduan/' . $pengaduan['FOTO_PENGADUAN'])) {
                unlink('./uploads/pengaduan/' . $pengaduan['FOTO_PENGADUAN']);
            }
            if (!empty($pengaduan['FOTO_PROSES']) && file_exists('./uploads/proses/' . $pengaduan['FOTO_PROSES'])) {
                unlink('./uploads/proses/' . $pengaduan['FOTO_PROSES']);
            }

            $this->Pengaduan_model->delete_pengaduan($id);
            $this->session->set_flashdata('success', 'Data pengaduan berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Data pengaduan tidak ditemukan!');
        }

        redirect('pengaduan');
    }
}
