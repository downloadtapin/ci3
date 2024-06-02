<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->model('PokjaMil_model');
        $this->load->model('Penjelasan_model');
        $this->load->library('form_validation');
        $this->load->model('Evaluasi_model');
        $this->load->model('Klarifikasi_model');
        $this->load->model('Negosiasi_model');
        $this->load->model('Pembuktian_model');
        
        
        
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

    public function reportBaPenjelasan() {
        
        $data['pokjas'] = $this->PokjaMil_model->get_all_pokja();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('report/report_ba_reviu', $data);
        $this->load->view('Footer/Footer');
        
    }

    public function reportBaEvaluasi() {
        
        $data['penjelasans'] = $this->Penjelasan_model->get_all();
        $data['evaluasis'] = $this->Evaluasi_model->get_all();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('report/report_ba_evaluasi', $data);
        $this->load->view('Footer/Footer');
        
    }

    public function reportBaKlarifikasi() {
        $data['negosiasis'] = $this->Negosiasi_model->get_all();
        $data['klarifikasis'] = $this->Klarifikasi_model->get_all();
        $data['penjelasans'] = $this->Penjelasan_model->get_all();
        $data['evaluasis'] = $this->Evaluasi_model->get_all();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $data['pembuktians'] = $this->Pembuktian_model->get_all();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('report/report_ba_klarifikasi', $data);
        $this->load->view('Footer/Footer');
        
    }

    public function reportBaPembuktian() {
        $data['negosiasis'] = $this->Negosiasi_model->get_all();
        $data['klarifikasis'] = $this->Klarifikasi_model->get_all();
        $data['penjelasans'] = $this->Penjelasan_model->get_all();
        $data['evaluasis'] = $this->Evaluasi_model->get_all();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $data['pembuktians'] = $this->Pembuktian_model->get_all();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('report/report_ba_pembuktian', $data);
        $this->load->view('Footer/Footer');
        
    }
}
?>
