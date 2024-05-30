<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->model('PokjaMil_model');
        
    }

    public function index() {
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('report/report_paket');
        $this->load->view('Footer/Footer');
    }

    public function reportBaReviu() {
        
        $data['pokjas'] = $this->PokjaMil_model->get_all_pokja();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('report/report_ba_reviu', $data);
        $this->load->view('Footer/Footer');
        
    }
}
?>
