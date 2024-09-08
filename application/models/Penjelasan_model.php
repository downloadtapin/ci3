<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjelasan_model extends CI_Model {

    public function get_all() {
        return $this->db->get('Penjelasan')->result();
    }

    public function get_by_id($Id_penjelasan) {
        return $this->db->get_where('Penjelasan', array('Id_penjelasan' => $Id_penjelasan))->row();
    }

    public function add($data) {
        return $this->db->insert('Penjelasan', $data);
    }

    public function update($Id_penjelasan, $data) {
        $this->db->where('Id_penjelasan', $Id_penjelasan);
        return $this->db->update('Penjelasan', $data);
    }

    public function delete($Id_penjelasan) {
        $this->db->where('Id_penjelasan', $Id_penjelasan);
        return $this->db->delete('Penjelasan');
    }
    public function get_all_inputted_pakets() {
        $this->db->select('Id_kode_tender');
        $query = $this->db->get('penjelasan'); // Asumsikan tabel penjelasan menyimpan Id_kode_tender
        return $query->result_array();
    }
    public function get_selected_paket() {
        $this->db->select('Id_kode_tender');
        $query = $this->db->get('penjelasan');
        return $query->result_array(); // Mengembalikan array dari Id_kode_tender yang sudah dipilih
    }
}
