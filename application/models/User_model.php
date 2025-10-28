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
     * Find a user by id
     */
    public function find_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row_array();
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

    /**
     * Record a successful login for a user.
     *
     * - If `login_count` column exists it will be incremented.
     * - If `last_login` column exists it will be updated to current datetime.
     *
     * Returns true if any update was performed, false otherwise.
     */
    public function record_login($user_id)
    {
        $updated = false;

        $has_count = $this->db->field_exists('login_count', $this->table);
        $has_last = $this->db->field_exists('last_login', $this->table);

        if ($has_count || $has_last) {
            // Build update depending on available fields
            if ($has_count && $has_last) {
                // Use DB time (NOW()) so timestamps reflect MySQL server timezone
                $this->db->set('login_count', 'login_count+1', false);
                $this->db->set('last_login', 'NOW()', false);
                $this->db->where('id', $user_id);
                $this->db->update($this->table);
                $updated = ($this->db->affected_rows() >= 0);
            } elseif ($has_count) {
                $this->db->set('login_count', 'login_count+1', false);
                $this->db->where('id', $user_id);
                $this->db->update($this->table);
                $updated = ($this->db->affected_rows() >= 0);
            } else { // only has last_login
                // Use DB NOW() so last_login is set by MySQL server time
                $this->db->set('last_login', 'NOW()', false);
                $this->db->where('id', $user_id);
                $this->db->update($this->table);
                $updated = ($this->db->affected_rows() >= 0);
            }
        }

        return $updated;
    }
}

