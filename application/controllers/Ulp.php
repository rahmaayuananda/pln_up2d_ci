<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ulp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ulp_model');
        $this->load->library('form_validation');
    }

    // ✏️ Edit data
    public function edit($cxunit)
    {
        $data['judul'] = 'Edit Data ULP';
        $data['ulp'] = $this->Ulp_model->get_ulp_by_id($cxunit);

        if (empty($data['ulp'])) {
            show_404();
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules('NAMA_ULP', 'Nama ULP', 'required');
        $this->form_validation->set_rules('UP3_2D', 'Kode UP3', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header', $data);
            $this->load->view('ulp/vw_edit_ulp', $data);
            $this->load->view('layout/footer');
        } else {
            $payload = [
                'NAMA_ULP' => $this->input->post('NAMA_ULP'),
                'UP3_2D'   => $this->input->post('UP3_2D'),
            ];
            $this->Ulp_model->update_ulp($cxunit, $payload);
            $this->session->set_flashdata('success', 'Data ULP berhasil diperbarui!');
            redirect('Ulp');
        }
    }

    // 🟢 Halaman utama (list data)
    public function index()
    {
        $data['judul'] = 'Data ULP';
        $data['ulp_table_missing'] = !$this->db->table_exists('ulp');
        $data['ulp'] = $this->Ulp_model->get_all_ulp();

        $this->load->view('layout/header', $data);
        $this->load->view('ulp/vw_ulp', $data);
        $this->load->view('layout/footer');
    }

    // 🟡 Tambah data
    public function tambah()
    {
        $data['judul'] = 'Tambah Data ULP';

        // Aturan validasi form
        $this->form_validation->set_rules('CXUNIT', 'Kode ULP', 'required|is_unique[ulp.CXUNIT]');
        $this->form_validation->set_rules('NAMA_ULP', 'Nama ULP', 'required');
        $this->form_validation->set_rules('UP3_2D', 'Kode UP3', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Tampilkan form tambah
            $this->load->view('layout/header', $data);
            $this->load->view('ulp/vw_tambah_ulp', $data);
            $this->load->view('layout/footer');
        } else {
            // Data dari form
            $data = [
                'CXUNIT' => $this->input->post('CXUNIT'),
                'NAMA_ULP' => $this->input->post('NAMA_ULP'),
                'UP3_2D' => $this->input->post('UP3_2D')
            ];

            // Simpan ke database
            if (!$this->Ulp_model->insert_ulp($data)) {
                $this->session->set_flashdata('error', 'Gagal menambahkan data ULP. Pastikan tabel ULP tersedia.');
            } else {
                $this->session->set_flashdata('success', 'Data ULP berhasil ditambahkan!');
            }
            redirect('Ulp');
        }
    }

    // 🔵 Detail data
    public function detail($cxunit)
    {
        $data['judul'] = 'Detail Data ULP';
        $data['ulp'] = $this->Ulp_model->get_ulp_by_id($cxunit);

        if (empty($data['ulp'])) {
            show_404();
        }

        $this->load->view('layout/header', $data);
        $this->load->view('ulp/vw_detail_ulp', $data);
        $this->load->view('layout/footer');
    }

    // 🔴 Hapus data
    public function hapus($cxunit)
    {
        $this->Ulp_model->delete_ulp($cxunit);
        $this->session->set_flashdata('success', 'Data ULP berhasil dihapus!');
        redirect('Ulp');
    }
}
