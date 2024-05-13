<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlogin_model extends CI_Model {

    public function authenticate($username, $password) {
        // Query untuk mencari pengguna berdasarkan username dan password
        $query = $this->db->get_where('userlogin', array('Username' => $username, 'Password' => $password));

        // Jika pengguna ditemukan, kembalikan data pengguna
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

}
