<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Notifikasi_model', 'notifModel');
        $this->load->helper(['url', 'form']);
        $this->load->library('session');
    }

    // Tampilkan daftar notifikasi
    public function index()
    {
        $data['judul'] = 'Notifikasi';
        $data['notifikasi'] = $this->notifModel->get_all_notifications();

        $this->load->view('layout/header', $data);
        $this->load->view('notifikasi/vw_notifikasi', $data);
        $this->load->view('layout/footer');
    }

    // Tandai satu notifikasi sebagai sudah dibaca
    public function mark_read($id = null)
    {
        if (!$id) redirect('Notifikasi');

        $this->notifModel->update_notification($id, [
            'IS_READ' => 1,
            'READ_AT' => date('Y-m-d H:i:s')
        ]);

        $this->session->set_flashdata('success', 'Notifikasi ditandai sudah dibaca');
        redirect('Notifikasi');
    }

    // Tandai semua notifikasi sebagai sudah dibaca
    public function mark_all_read()
    {
        $this->notifModel->mark_all_read();
        $this->session->set_flashdata('success', 'Semua notifikasi ditandai sudah dibaca');
        redirect('Notifikasi');
    }

    // Tambah notifikasi (bisa dipanggil via form POST)
    public function create()
    {
        if (!$this->input->post()) {
            redirect('Notifikasi');
        }

        $data = [
            'TITLE' => $this->input->post('TITLE', true),
            'MESSAGE' => $this->input->post('MESSAGE', true),
            'LINK' => $this->input->post('LINK', true),
            'IS_READ' => 0,
            'CREATED_AT' => date('Y-m-d H:i:s')
        ];

        $this->notifModel->insert_notification($data);
        $this->session->set_flashdata('success', 'Notifikasi berhasil ditambahkan');
        redirect('Notifikasi');
    }

    // Endpoint ajax untuk mendapatkan jumlah notifikasi belum dibaca
    public function ajax_unread_count()
    {
        $count = $this->notifModel->get_unread_count();
        header('Content-Type: application/json');
        echo json_encode(['unread' => (int)$count]);
    }
}
