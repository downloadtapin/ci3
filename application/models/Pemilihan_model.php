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
    public function get_all_inputted_pakets2() {
        $this->db->select('Id_paket');
        $query = $this->db->get('pemilihan'); // Asumsikan tabel penjelasan menyimpan Id_kode_tender
        return $query->result_array();
    }
    public function get_selected_paket() {
        $this->db->select('Id_paket');
        $query = $this->db->get('pemilihan');
        return $query->result_array(); // Mengembalikan array dari Id_kode_tender yang sudah dipilih
    }

    public function get_all_pemilihan() {
        return $this->db->get('pemilihan')->result();
    }
}
