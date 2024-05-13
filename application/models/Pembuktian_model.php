<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembuktian_model extends CI_Model {

    public function get_all() {
        return $this->db->get('pembuktian')->result();
    }

    public function add($data) {
        $this->db->insert('pembuktian', $data);
    }

    public function get_by_id($id) {
        return $this->db->get_where('pembuktian', array('Id_pembuktian' => $id))->row();
    }

    public function update($id, $data) {
        $this->db->where('Id_pembuktian', $id);
        $this->db->update('pembuktian', $data);
    }

    public function delete($id) {
        $this->db->where('Id_pembuktian', $id);
        $this->db->delete('pembuktian');
    }

}
