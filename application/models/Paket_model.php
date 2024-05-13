<?php
class Paket_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    // CREATE
    public function create_paket($data) {
        $this->db->insert('paket', $data);
        return $this->db->insert_id();
    }
    
    // READ
    public function get_all_paket() {
        return $this->db->get('paket')->result();
    }
    
    public function get_paket_by_id($id) {
        return $this->db->get_where('paket', array('Id_kode_tender' => $id))->row();
    }
    
    // UPDATE
    public function update_paket($id, $data) {
        $this->db->where('Id_kode_tender', $id);
        $this->db->update('paket', $data);
    }
    
    // DELETE
    public function delete_paket($id) {
        $this->db->where('Id_kode_tender', $id);
        $this->db->delete('paket');
    }
    
}
?>
