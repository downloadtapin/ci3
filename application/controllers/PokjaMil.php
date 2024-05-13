<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PokjaMil extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('PokjaMil_model');
    }
    
    // Index page showing all pokjas
    public function index() {
        $data['pokjas'] = $this->PokjaMil_model->get_all_pokja();
        $this->load->view('Header/NavBar');
        $this->load->view('pokjamil/list', $data);
    }
    
    // Add new pokja
    public function add() {
        if ($this->input->post()) {
            $data = array(
                'User_ID' => $this->input->post('User_ID'),
                'Nama' => $this->input->post('Nama'),
                'NIK' => $this->input->post('NIK'),
                'NIP_Pokjamil' => $this->input->post('NIP_Pokjamil'),
                'No_telp' => $this->input->post('No_telp'),
                'Email' => $this->input->post('Email'),
                'No_sertifikat' => $this->input->post('No_sertifikat')
            );
            $this->PokjaMil_model->create_pokja($data);
            redirect('pokjamil');
        } else {
            $this->load->view('Header/NavBar');
            $this->load->view('pokjamil/add');
        }
    }
    
    // Edit pokja
    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'User_ID' => $this->input->post('User_ID'),
                'Nama' => $this->input->post('Nama'),
                'NIK' => $this->input->post('NIK'),
                'NIP_Pokjamil' => $this->input->post('NIP_Pokjamil'),
                'No_telp' => $this->input->post('No_telp'),
                'Email' => $this->input->post('Email'),
                'No_sertifikat' => $this->input->post('No_sertifikat')
            );
            $this->PokjaMil_model->update_pokja($id, $data);
            redirect('pokjamil');
        } else {
            $data['pokja'] = $this->PokjaMil_model->get_pokja_by_id($id);
            $this->load->view('Header/NavBar');
            $this->load->view('pokjamil/edit', $data);
        }
    }
    
    // Delete pokja
    public function delete($id) {
        $this->PokjaMil_model->delete_pokja($id);
        redirect('pokjamil');
    }
}
?>
