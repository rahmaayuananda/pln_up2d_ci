<?php
defined('BASEPATH') or exit('No direct script acces allowed');

/**
 * @property CI_Session $session
 * @property User_model $User_model
 */
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['judul'] = "Halaman Dashboard";

        // If user is logged in, fetch their login_count and last_login for display
        $data['login_count'] = null;
        $data['last_login'] = null;
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            $user = $this->User_model->find_by_id($user_id);
            if ($user) {
                $data['login_count'] = isset($user['login_count']) ? $user['login_count'] : null;
                $data['last_login'] = isset($user['last_login']) ? $user['last_login'] : null;
            }
        }

        $this->load->view("layout/header");
        $this->load->view("dashboard/vw_dashboard.php", $data);
        $this->load->view("layout/footer");
    }
}