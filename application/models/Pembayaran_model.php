<?php
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
    // Insert pembayaran baru
    public function insert($data)
    {
        return $this->db->insert('pembayaran', $data);
    }

    // Cek apakah paket sudah dibayar
    public function sudah_dibayar($id_paket)
    {
        $query = $this->db->get_where('pembayaran', [
            'id_paket' => $id_paket,
            'status' => true
        ]);
        return $query->row();
    }

    // Ambil semua pembayaran (opsional)
    public function get_all()
    {
        return $this->db->get('pembayaran')->result();
    }
}