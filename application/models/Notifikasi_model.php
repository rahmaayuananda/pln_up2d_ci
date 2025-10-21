<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    private $table = 'notifikasi';

    public function get_all_notifications()
    {
        $this->db->order_by('CREATED_AT', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    public function insert_notification($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update_notification($id, $data)
    {
        $this->db->where('ID_NOTIF', $id);
        return $this->db->update($this->table, $data);
    }

    public function mark_all_read()
    {
        return $this->db->update($this->table, ['IS_READ' => 1, 'READ_AT' => date('Y-m-d H:i:s')]);
    }

    public function get_unread_count()
    {
        $this->db->where('IS_READ', 0);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    private $table = 'log_aktivitas';

    public function __construct()
    {
        parent::__construct();
    }

    // Ambil semua notifikasi
    public function get_all()
    {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    // Ambil notifikasi terbaru (misal 5 terakhir)
    public function get_latest($limit = 5)
    {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result_array();
    }

    // Tambah log aktivitas
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

    // Hitung notifikasi belum dibaca
    public function count_unread()
    {
        $this->db->where('status', 0);
        return $this->db->count_all_results($this->table);
    }

    // Tandai semua sudah dibaca
    public function mark_as_read()
    {
        $this->db->set('status', 1);
        $this->db->update($this->table);
    }
}
