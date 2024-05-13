<?php
class User_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    // CREATE
    public function create_user($data) {
        $this->db->insert('userlogin', $data);
        return $this->db->insert_id();
    }
    
    // READ
    public function get_all_users() {
        return $this->db->get('userlogin')->result();
    }
    
    public function get_user_by_id($id) {
        return $this->db->get_where('userlogin', array('id_user' => $id))->row();
    }
    
    // UPDATE
    public function update_user($id, $data) {
        $this->db->where('id_user', $id);
        $this->db->update('userlogin', $data);
    }
    
    // DELETE
    public function delete_user($id) {
        $this->db->where('id_user', $id);
        $this->db->delete('userlogin');
    }
}
?>
