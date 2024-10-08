<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Paket_model');
        $this->load->model('PokjaMil_model'); // Load model PokjaMil
        $this->load->library('session');
        $this->load->model('Penjelasan_model');
        $this->load->model('Pemilihan_model');
    }
    
    // Index page showing all pakets
    public function index() {
        $data['pokjas'] = $this->PokjaMil_model->get_all_pokja();
        $data['pakets'] = $this->Paket_model->get_all_paket();
    
        // Ambil Id_kode_tender yang sudah diinput di penjelasan

        $inputted_pakets2 = $this->Pemilihan_model->get_all_inputted_pakets2();
        $data['inputted_pakets2'] = array_column($inputted_pakets2, 'Id_paket');
    
        $inputted_pakets = $this->Penjelasan_model->get_all_inputted_pakets();
        $data['inputted_pakets'] = array_column($inputted_pakets, 'Id_kode_tender');
    
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('paket/list', $data);
        $this->load->view('Footer/Footer');
    }
    
    
    // Add new paket
    public function add() {
        if ($this->input->post()) {
            // Get selected ID Pokja values from the form as an array
            $selected_id_pokjas = $this->input->post('Id_pokja');

            // Convert array to comma-separated string (if needed)
            $selected_id_pokjas_str = implode(',', $selected_id_pokjas);
            $data = array(
                'kode_tender' => $this->input->post('kode_tender'),
                'Id_pokja' => $selected_id_pokjas_str,
                'no_dokumen_pemilihan' => $this->input->post('no_dokumen_pemilihan'),
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
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('paket');
        } else {
            $data['pokjas'] = $this->PokjaMil_model->get_all_pokja(); 
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('paket/add', $data);
            $this->load->view('Footer/Footer');
        }
    }
    
    // Edit paket
    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'kode_tender' => $this->input->post('kode_tender'),
                'Id_pokja' => implode(",", $this->input->post('Id_pokja')),
                'no_dokumen_pemilihan' => $this->input->post('no_dokumen_pemilihan'),
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
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect('paket');
        } else {
            $data['paket'] = $this->Paket_model->get_paket_by_id($id);
            // Ambil data yang berkaitan dengan multiple values
            $data['selected_pokjas'] = explode(',', $data['paket']->Id_pokja);
            $data['all_pokjas'] = $this->PokjaMil_model->get_all_pokja(); // Contoh fungsi untuk mendapatkan semua data pokja
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('paket/edit', $data);
            $this->load->view('Footer/Footer');
        }
    }
    
    // Delete paket
    public function delete($id) {
        $this->Paket_model->delete_paket($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('paket');
    }
}
?>