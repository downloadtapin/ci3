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
            $password = $this->input->post('Password');
            $hashed_password = md5($password); // Hash password menggunakan md5
    
            $data = array(
                'Level' => $this->input->post('Level'),
                'Nama' => $this->input->post('Nama'),
                'NIK' => $this->input->post('NIK'),
                'NIP_Pokjamil' => $this->input->post('NIP_Pokjamil'),
                'User_ID' => $this->input->post('User_ID'),
                'Password' => $hashed_password, // Simpan password yang sudah di-hash
                'Alamat' => $this->input->post('Alamat'),
                'No_telp' => $this->input->post('No_telp'),
                'Email' => $this->input->post('Email'),
                'Pangkat' => $this->input->post('Pangkat'),
                'Jabatan' => $this->input->post('Jabatan'),
                'Golongan' => $this->input->post('Golongan'),
                'No_sertifikat' => $this->input->post('No_sertifikat')
            );
            $this->PokjaMil_model->create_pokja($data); // Ganti dengan nama model yang sesuai
            redirect('pokjamil'); // Redirect ke halaman daftar setelah berhasil menyimpan data
        } else {
            $this->load->view('Header/NavBar');
            $this->load->view('pokjamil/add'); // Ganti dengan nama view yang sesuai
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
            redirect('pokjamil');
        } else {
            $data['pokjamil'] = $this->PokjaMil_model->get_pokja_by_id($id);
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