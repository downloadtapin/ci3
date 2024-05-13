<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->model('PokjaMil_model'); // Load model PokjaMil
    }
    
    // Index page showing all pakets
    public function index() {
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $this->load->view('Header/NavBar');
        $data['pokjas'] = $this->PokjaMil_model->get_all_pokja();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $this->load->view('paket/list', $data);
    }
    
    // Add new paket
    public function add() {
        if ($this->input->post()) {
            $data = array(
                'Id_pokja' => implode(",", $this->input->post('Id_pokja')),
                'Nama_tender' => $this->input->post('Nama_tender'),
                'Nilai_Pagu' => $this->input->post('Nilai_Pagu'),
                'Kode_RUP' => $this->input->post('Kode_RUP'),
                'Nilai_HPS' => $this->input->post('Nilai_HPS'),
                'Kode_anggaran' => $this->input->post('Kode_anggaran'),
                'Metode_tender' => $this->input->post('Metode_tender'),
                'Nama_PPK' => $this->input->post('Nama_PPK'),
                'NIP_PPK' => $this->input->post('NIP_PPK'),
                'No_SK' => $this->input->post('No_SK'),
                'Unit_kerja' => $this->input->post('Unit_kerja'),
                'Tgl_permohonan' => $this->input->post('Tgl_permohonan'),
                'Tgl_penugasan' => $this->input->post('Tgl_penugasan'),
                'Pokja_pemilihan' => $this->input->post('Pokja_pemilihan')
            );
            $this->Paket_model->create_paket($data);
            redirect('paket');
        } else {
            $data['pokjas'] = $this->PokjaMil_model->get_all_pokja(); 
            $this->load->view('paket/add', $data);
        }
    }
    
    // Edit paket
    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'Id_pokja' => $this->input->post('Id_pokja'),
                'Nama_tender' => $this->input->post('Nama_tender'),
                'Nilai_Pagu' => $this->input->post('Nilai_Pagu'),
                'Kode_RUP' => $this->input->post('Kode_RUP'),
                'Nilai_HPS' => $this->input->post('Nilai_HPS'),
                'Kode_anggaran' => $this->input->post('Kode_anggaran'),
                'Metode_tender' => $this->input->post('Metode_tender'),
                'Nama_PPK' => $this->input->post('Nama_PPK'),
                'NIP_PPK' => $this->input->post('NIP_PPK'),
                'No_SK' => $this->input->post('No_SK'),
                'Unit_kerja' => $this->input->post('Unit_kerja'),
                'Tgl_permohonan' => $this->input->post('Tgl_permohonan'),
                'Tgl_penugasan' => $this->input->post('Tgl_penugasan'),
                'Pokja_pemilihan' => $this->input->post('Pokja_pemilihan')
            );
            $this->Paket_model->update_paket($id, $data);
            redirect('paket');
        } else {
            $data['paket'] = $this->Paket_model->get_paket_by_id($id);
            $this->load->view('Header/NavBar');
            $this->load->view('paket/edit', $data);
        }
    }
    
    // Delete paket
    public function delete($id) {
        $this->Paket_model->delete_paket($id);
        redirect('paket');
    }
}
?>
