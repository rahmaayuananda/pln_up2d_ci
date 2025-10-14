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
        $this->load->model('Kit_cell_model');
        $this->load->model('Pembangkit_model');
        // Load helper dan library
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    // 🔹 Halaman utama - tampilkan semua data KIT Cell
    public function index()
    {
        $data['title'] = 'Data KIT Cell';
        $data['kit_cell'] = $this->Kit_cell_model->get_all_kit_cell();

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

            $this->Kit_cell_model->insert_kit_cell($insertData);
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
        $data['kit_cell'] = $this->Kit_cell_model->get_kit_cell_by_id($id);
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

            $this->Kit_cell_model->update_kit_cell($id, $updateData);
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
        $data['kit_cell'] = $this->Kit_cell_model->get_kit_cell_by_id($id);
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
        $this->Kit_cell_model->delete_kit_cell($id);
        $this->session->set_flashdata('success', 'Data KIT Cell berhasil dihapus!');
        redirect('Kit_cell');
    }
}
