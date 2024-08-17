<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->model('PokjaMil_model'); // Load model PokjaMil
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

}
?>