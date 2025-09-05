<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->model('PokjaMil_model');
        $this->load->model('Pemilihan_model');    // Tambahkan
        $this->load->model('Evaluasi_model');     // Tambahkan
        $this->load->model('Negosiasi_model');    // Tambahkan
        $this->load->model('Pembuktian_model');   // Tambahkan
    }
    
    // Index page showing all pakets
    public function index() {
        $data['pokjas'] = $this->PokjaMil_model->get_all_pokja();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('laporan/laporan_paket', $data);
        $this->load->view('Footer/Footer');
    }

    public function LaporanPokmil() {
        $data['pokjas'] = $this->PokjaMil_model->get_all_pokja();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('laporan/laporan_pokmil', $data);
        $this->load->view('Footer/Footer');
    }

    // Tambahkan method untuk laporan pembayaran
    public function laporan_pembayaran() {
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $data['pemilihans'] = $this->Pemilihan_model->get_all(); // Tambahkan
        $data['evaluasis'] = $this->Evaluasi_model->get_all(); // Tambahkan
        $data['negosiasis'] = $this->Negosiasi_model->get_all(); // Tambahkan
        $data['pembuktians'] = $this->Pembuktian_model->get_all(); // Tambahkan
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('laporan/PembayaranLaporan', $data);
        $this->load->view('Footer/Footer');
    }
}
?>