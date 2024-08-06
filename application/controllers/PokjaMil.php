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
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('pokjamil/list', $data);
        $this->load->view('Footer/Footer');
    }
    
    // Add new pokja
    public function add() {
        if ($this->input->post()) {
            $password = $this->input->post('Password');
            $hashed_password = md5($password); // Hash password using md5
    
            $data = array(
                'Level' => $this->input->post('Level'),
                'Nama' => $this->input->post('Nama'),
                'NIK' => $this->input->post('NIK'),
                'NIP_Pokjamil' => $this->input->post('NIP_Pokjamil'),
                'User_ID' => $this->input->post('User_ID'),
                'Password' => $hashed_password, // Save the hashed password
                'Alamat' => $this->input->post('Alamat'),
                'No_telp' => $this->input->post('No_telp'),
                'Email' => $this->input->post('Email'),
                'Pangkat' => $this->input->post('Pangkat'),
                'Jabatan' => $this->input->post('Jabatan'),
                'Golongan' => $this->input->post('Golongan'),
                'No_sertifikat' => $this->input->post('No_sertifikat')
            );
            $this->PokjaMil_model->create_pokja($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('pokjamil'); // Redirect to list page after saving data
        } else {
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('pokjamil/add');
            $this->load->view('Footer/Footer');
        }
    }
    
    // Edit pokja
    public function edit($id) {
        if ($this->input->post()) {
            $password = $this->input->post('Password');
            $hashed_password = $password ? md5($password) : $this->input->post('current_password'); // Hash password only if it's changed
    
            $data = array(
                'Level' => $this->input->post('Level'),
                'Nama' => $this->input->post('Nama'),
                'NIK' => $this->input->post('NIK'),
                'NIP_Pokjamil' => $this->input->post('NIP_Pokjamil'),
                'User_ID' => $this->input->post('User_ID'),
                'Password' => $hashed_password, // Use hashed password
                'Alamat' => $this->input->post('Alamat'),
                'No_telp' => $this->input->post('No_telp'),
                'Email' => $this->input->post('Email'),
                'Pangkat' => $this->input->post('Pangkat'),
                'Jabatan' => $this->input->post('Jabatan'),
                'Golongan' => $this->input->post('Golongan'),
                'No_sertifikat' => $this->input->post('No_sertifikat')
            );
    
            $this->PokjaMil_model->update_pokja($id, $data);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect('pokjamil');
        } else {
            $data['pokjamil'] = $this->PokjaMil_model->get_pokja_by_id($id);
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('pokjamil/edit', $data);
            $this->load->view('Footer/Footer');
        }
    }
    
    // Delete pokja
    public function delete($id) {
        $this->PokjaMil_model->delete_pokja($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('pokjamil');
    }
}

