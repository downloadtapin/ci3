<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klarifikasi_model extends CI_Model {
    
    public function add($data) {
        $this->db->insert('Klarifikasi', $data);
        return $this->db->insert_id();
    }

    public function get_all() {
        return $this->db->get('Klarifikasi')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('Klarifikasi', array('Id_klarifikasi' => $id))->row();
    }

    public function update($id, $data) {
        $this->db->where('Id_klarifikasi', $id);
        $this->db->update('Klarifikasi', $data);
    }

    public function delete($id) {
        $this->db->where('Id_klarifikasi', $id);
        $this->db->delete('Klarifikasi');
    }
}
