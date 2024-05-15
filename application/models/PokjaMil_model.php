<?php
class PokjaMil_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    // CREATE
    public function create_pokja($data) {
        $this->db->insert('pokjamil', $data);
        return $this->db->insert_id();
    }
    
    // READ
    public function get_all_pokja() {
        return $this->db->get('pokjamil')->result();
    }
    
    public function get_pokja_by_id($id) {
        return $this->db->get_where('pokjamil', array('Id' => $id))->row();
    }
    
    // UPDATE
    public function update_pokja($id, $data) {
        $this->db->where('Id', $id);
        $this->db->update('pokjamil', $data);
    }
    
    // DELETE
    public function delete_pokja($id) {
        $this->db->where('Id', $id);
        $this->db->delete('pokjamil');
    }
}
?>
