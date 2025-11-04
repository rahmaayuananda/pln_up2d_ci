<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Authorization Helper
 * Helper untuk mengecek permission user berdasarkan role
 */

if (!function_exists('can_create')) {
    /**
     * Cek apakah user bisa create data
     * @return bool
     */
    function can_create()
    {
        $CI = &get_instance();
        $role = $CI->session->userdata('user_role');
        $is_guest = $CI->session->userdata('is_guest');

        // Guest tidak bisa create
        if ($is_guest || strtolower($role) === 'guest') {
            return false;
        }

        // Admin bisa semua
        if (strtolower($role) === 'admin' || strtolower($role) === 'administrator') {
            return true;
        }

        // Role lain bisa create (kecuali yang spesifik di-restrict nanti)
        return true;
    }
}

if (!function_exists('can_edit')) {
    /**
     * Cek apakah user bisa edit data
     * @return bool
     */
    function can_edit()
    {
        $CI = &get_instance();
        $role = $CI->session->userdata('user_role');
        $is_guest = $CI->session->userdata('is_guest');

        // Guest tidak bisa edit
        if ($is_guest || strtolower($role) === 'guest') {
            return false;
        }

        // Admin bisa semua
        if (strtolower($role) === 'admin' || strtolower($role) === 'administrator') {
            return true;
        }

        // Role lain bisa edit (kecuali yang spesifik di-restrict nanti)
        return true;
    }
}

if (!function_exists('can_delete')) {
    /**
     * Cek apakah user bisa delete data
     * @return bool
     */
    function can_delete()
    {
        $CI = &get_instance();
        $role = $CI->session->userdata('user_role');
        $is_guest = $CI->session->userdata('is_guest');

        // Guest tidak bisa delete
        if ($is_guest || strtolower($role) === 'guest') {
            return false;
        }

        // Admin bisa semua
        if (strtolower($role) === 'admin' || strtolower($role) === 'administrator') {
            return true;
        }

        // Role lain bisa delete (kecuali yang spesifik di-restrict nanti)
        return true;
    }
}

if (!function_exists('is_guest')) {
    /**
     * Cek apakah user adalah Guest
     * @return bool
     */
    function is_guest()
    {
        $CI = &get_instance();
        $is_guest = $CI->session->userdata('is_guest');
        $role = $CI->session->userdata('user_role');

        return $is_guest === true || strtolower($role) === 'guest';
    }
}

if (!function_exists('is_admin')) {
    /**
     * Cek apakah user adalah Admin
     * @return bool
     */
    function is_admin()
    {
        $CI = &get_instance();
        $role = $CI->session->userdata('user_role');

        return strtolower($role) === 'admin' || strtolower($role) === 'administrator';
    }
}

if (!function_exists('get_user_role')) {
    /**
     * Get current user role
     * @return string|null
     */
    function get_user_role()
    {
        $CI = &get_instance();
        return $CI->session->userdata('user_role');
    }
}

if (!function_exists('can_access_module')) {
    /**
     * Cek apakah user bisa akses modul tertentu
     * @param string $module Nama modul (asset, pustaka, pengaduan, operasi, anggaran)
     * @return bool
     */
    function can_access_module($module)
    {
        $CI = &get_instance();
        $role = strtolower($CI->session->userdata('user_role') ?? '');

        // Admin bisa akses semua
        if ($role === 'admin' || $role === 'administrator') {
            return true;
        }

        // Guest bisa akses semua (view only)
        if ($role === 'guest') {
            return true;
        }

        $module = strtolower($module);

        // Mapping akses modul per role
        $access_map = [
            'up3' => ['pengaduan'],
            'perencanaan' => ['asset', 'pustaka', 'pengaduan'],
            'pemeliharaan' => ['asset', 'pustaka', 'pengaduan'],
            'operasi sistem distribusi' => ['asset', 'pustaka', 'operasi'],
            'fasilitas operasi' => ['asset', 'pustaka', 'pengaduan'],
            'k3l & kam' => ['pustaka'],
        ];

        if (isset($access_map[$role])) {
            return in_array($module, $access_map[$role]);
        }

        // Default: tidak ada akses
        return false;
    }
}
