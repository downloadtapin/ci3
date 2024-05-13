<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Negosiasi_model extends CI_Model {

    public function get_all() {
        return $this->db->get('negosiasi')->result();
    }

    public function add($data) {
        $this->db->insert('negosiasi', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('negosiasi', array('Id_negosiasi' => $id))->row();
    }

    public function update($id, $data) {
        $this->db->where('Id_negosiasi', $id);
        $this->db->update('negosiasi', $data);
    }

    public function delete($id) {
        $this->db->where('Id_negosiasi', $id);
        $this->db->delete('negosiasi');
    }
}
