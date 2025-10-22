<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->library(['session', 'form_validation']);
    }

    // GET /login
    public function index()
    {
        // If already logged in, redirect to dashboard unless forced to show login
        $force = $this->input->get('force');
        if ($this->session->userdata('logged_in') && !$force) {
            return redirect('dashboard');
        }

        $data = [
            'title' => 'Masuk - PLN UP2D Riau',
        ];
        $this->load->view('login/index', $data);
    }

    // POST /login/auth
    public function authenticate()
    {
        // Validation rules
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

        if ($this->form_validation->run() === FALSE) {
            // Return to form with errors
            return $this->index();
        }

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Placeholder authentication (dev-only): adjust with real user model later
        // Demo credential is accepted ONLY in development environment
        if (ENVIRONMENT === 'development' && $email === 'admin@pln.local' && $password === 'admin123') {
            $this->session->set_userdata([
                'user_email' => $email,
                'logged_in'  => TRUE,
            ]);
            return redirect('dashboard');
        }

        $this->session->set_flashdata('login_error', 'Email atau password salah.');
        return redirect('login');
    }

    // GET /logout
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
