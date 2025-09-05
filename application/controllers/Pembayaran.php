<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function get_pembayaran()
{
    $id_paket = $this->input->post('id_paket');
    $data = $this->db->get_where('pembayaran', ['id_paket' => $id_paket, 'status' => 1])->row_array();

    if ($data) {
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Data pembayaran tidak ditemukan']);
    }
}

    public function proses_bayar() {
        $id_paket = $this->input->post('id_paket');
        $ppn = $this->input->post('ppn');
        $pph = $this->input->post('pph');
        $total = $this->input->post('total');

        // Validasi sederhana
        if (!$id_paket) {
            echo json_encode(['success' => false, 'message' => 'ID paket kosong']);
            return;
        }

        $data = [
            'id_paket' => $id_paket,
            'ppn' => $ppn,
            'pph' => $pph,
            'total' => $total, // pastikan nama kolom di DB benar
            'status' => 1
        ];

        if ($this->db->insert('pembayaran', $data)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal simpan ke database']);
        }
    }
}
