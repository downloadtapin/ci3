<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilihan_model extends CI_Model {

    public function get_all() {
        return $this->db->get('pemilihan')->result();
    }

    public function add($data) {
        $this->db->insert('pemilihan', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('pemilihan', array('Id_pemilihan' => $id))->row();
    }

    public function update($id, $data) {
        $this->db->where('Id_pemilihan', $id);
        $this->db->update('pemilihan', $data);
    }

    public function delete($id) {
        $this->db->where('Id_pemilihan', $id);
        $this->db->delete('pemilihan');
    }
}
