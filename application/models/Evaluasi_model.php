<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluasi_model extends CI_Model {

    public function get_all() {
        return $this->db->get('Evaluasi')->result();
    }

    public function get_by_id($Id_evaluasi_penawaran) {
        return $this->db->get_where('Evaluasi', array('Id_evaluasi_penawaran' => $Id_evaluasi_penawaran))->row();
    }

    public function add($data) {
        return $this->db->insert('Evaluasi', $data);
    }

    public function update($Id_evaluasi_penawaran, $data) {
        $this->db->where('Id_evaluasi_penawaran', $Id_evaluasi_penawaran);
        return $this->db->update('Evaluasi', $data);
    }

    public function delete($Id_evaluasi_penawaran) {
        $this->db->where('Id_evaluasi_penawaran', $Id_evaluasi_penawaran);
        return $this->db->delete('Evaluasi');
    }
}
