<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    private $table = 'log_aktivitas';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Ambil semua notifikasi
     */
    public function get_all()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Ambil semua notifikasi (alias untuk kompatibilitas)
     */
    public function get_all_notifications()
    {
        return $this->get_all();
    }

    /**
     * Ambil notifikasi terbaru
     * @param int $limit Jumlah data yang diambil
     */
    public function get_latest($limit = 5)
    {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Tambah log aktivitas / notifikasi
     * @param string $aksi Jenis aksi (INSERT, UPDATE, DELETE)
     * @param string $tabel Nama tabel yang dimodifikasi
     * @param string $user Username yang melakukan aksi
     * @param string $keterangan Keterangan tambahan
     */
    public function tambah_log($aksi, $tabel, $user, $keterangan = null)
    {
        $data = [
            'aksi'        => $aksi,
            'tabel'       => $tabel,
            'user'        => $user,
            'keterangan'  => $keterangan,
            'tanggal'     => date('Y-m-d H:i:s'),
            'status'      => 0 // 0 = belum dibaca, 1 = sudah dibaca
        ];
        $this->db->insert($this->table, $data);
    }

    /**
     * Insert notifikasi (alias untuk kompatibilitas)
     */
    public function insert_notification($data)
    {
        if (isset($data['aksi']) && isset($data['tabel']) && isset($data['user'])) {
            return $this->tambah_log(
                $data['aksi'],
                $data['tabel'],
                $data['user'],
                $data['keterangan'] ?? null
            );
        }
        return $this->db->insert($this->table, $data);
    }

    /**
     * Update notifikasi
     * @param int $id ID notifikasi
     * @param array $data Data yang akan diupdate
     */
    public function update_notification($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Hitung notifikasi belum dibaca
     */
    public function count_unread()
    {
        $this->db->where('status', 0);
        return $this->db->count_all_results($this->table);
    }

    /**
     * Hitung notifikasi belum dibaca (alias untuk kompatibilitas)
     */
    public function get_unread_count()
    {
        return $this->count_unread();
    }

    /**
     * Tandai semua notifikasi sebagai sudah dibaca
     */
    public function mark_all_read()
    {
        $this->db->set('status', 1);
        return $this->db->update($this->table);
    }

    /**
     * Tandai semua notifikasi sebagai sudah dibaca (alias)
     */
    public function mark_as_read()
    {
        return $this->mark_all_read();
    }
}
