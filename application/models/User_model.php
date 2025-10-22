<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
        // database is autoloaded in this project
    }

    /**
     * Find a user by email
     */
    public function find_by_email($email)
    {
        return $this->db->where('email', $email)->get($this->table)->row_array();
    }

    /**
     * Verify password (assumes password_hash)
     */
    public function verify_password($user_row, $password)
    {
        if (!$user_row) return false;
        if (isset($user_row['password']) && password_verify($password, $user_row['password'])) {
            return true;
        }
        return false;
    }
}

