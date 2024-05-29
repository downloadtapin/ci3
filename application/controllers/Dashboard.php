<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('PokjaMil_model'); // Load model PokjaMil
        $this->load->model('Paket_model');
        
    }

    public function index() {
        $data['paket_summary'] = $this->Paket_model->get_paket_summary_by_pokja();
        $data['paket_count'] = $this->Paket_model->get_paket_count();
        $data['pokjas'] = $this->PokjaMil_model->get_all_pokja();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $totals = $this->Paket_model->get_total_pagu_hps();
        $data['total_pagu'] = $totals->Nilai_Pagu;
        $data['total_hps'] = $totals->Nilai_Hps;
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('dashboard', $data);
        $this->load->view('Footer/Footer');
    }
}
?>
