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

    public function get_paket_count() {
        return $this->db->count_all('paket');
    }
    public function get_total_pagu_hps() {
        $this->db->select_sum('Nilai_Pagu');
        $this->db->select_sum('Nilai_Hps');
        $query = $this->db->get('paket');
        return $query->row();
    }

    public function get_paket_summary_by_pokja() {
        $this->db->select('pokjamil.Nama, COUNT(paket.Id_kode_tender) as total_paket, SUM(paket.Nilai_Pagu) as total_pagu, SUM(paket.Nilai_HPS) as total_hps');
        $this->db->from('paket');
        $this->db->join('pokjamil', 'FIND_IN_SET(pokjamil.id, paket.Id_pokja) > 0', 'left');
        $this->db->group_by('pokjamil.Nama');
        $query = $this->db->get();
        return $query->result();
    }
}
?>
