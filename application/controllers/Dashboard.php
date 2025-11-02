<?php
defined('BASEPATH') or exit('No direct script acces allowed');

/**
 * @property CI_Session $session
 * @property User_model $User_model
 * @property CI_Input $input
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
        $data['user_role'] = null;
        
        // Try to get role from session first (faster)
        $session_role = $this->session->userdata('user_role');
        if ($session_role) {
            $data['user_role'] = $session_role; // Keep original case
        }
        
        $user_id = $this->session->userdata('user_id');
        if ($user_id) {
            $user = $this->User_model->find_by_id($user_id);
            if ($user) {
                $data['login_count'] = isset($user['login_count']) ? $user['login_count'] : null;
                $data['last_login'] = isset($user['last_login']) ? $user['last_login'] : null;
                // Override with DB role if available (keep original case)
                if (isset($user['role'])) {
                    $data['user_role'] = $user['role'];
                }
            }
        }

        $this->load->view("layout/header");
        $this->load->view("dashboard/vw_dashboard.php", $data);
        $this->load->view("layout/footer");
    }

    /**
     * AJAX endpoint: Get login statistics for a specific role
     * Only accessible by admin users
     */
    public function get_role_login_stats()
    {
        // Check if user is admin
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }

        $user = $this->User_model->find_by_id($user_id);
        if (!$user || strtolower($user['role']) !== 'admin') {
            echo json_encode(['success' => false, 'message' => 'Access denied. Admin only.']);
            return;
        }

        // Get role from query parameter
        $role = $this->input->get('role');
        
        if ($role) {
            // Get specific role stats
            $users = $this->User_model->get_users_login_stats($role);
            echo json_encode(['success' => true, 'role' => $role, 'users' => $users]);
        } else {
            // Get all roles summary
            $summary = $this->User_model->get_login_stats_by_role();
            echo json_encode(['success' => true, 'summary' => $summary]);
        }
    }
}