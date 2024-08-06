<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjelasan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Penjelasan_model');
        $this->load->library('form_validation');
        $this->load->model('Paket_model');
        $this->load->library('session'); // Load the session library for flashdata
    }

    public function index() {
        $data['penjelasans'] = $this->Penjelasan_model->get_all();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('penjelasan/list', $data);
        $this->load->view('Footer/Footer');
    }

    public function add() {
        $this->form_validation->set_rules('Id_kode_tender', 'ID Kode Tender', 'required');
        $this->form_validation->set_rules('No_Penjelasan', 'Nomor Penjelasan', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Nama_penyedia', 'Nama Penyedia', 'required');
        $this->form_validation->set_rules('Pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('Jawaban', 'Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['pakets'] = $this->Paket_model->get_all_paket();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('penjelasan/add', $data);
            $this->load->view('Footer/Footer');
        } else {
            $data = array(
                'Id_kode_tender' => $this->input->post('Id_kode_tender'),
                'No_Penjelasan' => $this->input->post('No_Penjelasan'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Nama_penyedia' => $this->input->post('Nama_penyedia'),
                'Pertanyaan' => $this->input->post('Pertanyaan'),
                'Jawaban' => $this->input->post('Jawaban'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Penjelasan_model->add($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('penjelasan');
        }
    }

    public function edit($Id_penjelasan) {
        $this->form_validation->set_rules('Id_kode_tender', 'ID Kode Tender', 'required');
        $this->form_validation->set_rules('No_Penjelasan', 'Nomor Penjelasan', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Nama_penyedia', 'Nama Penyedia', 'required');
        $this->form_validation->set_rules('Pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('Jawaban', 'Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['pakets'] = $this->Paket_model->get_all_paket();
            $data['penjelasan'] = $this->Penjelasan_model->get_by_id($Id_penjelasan);
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('penjelasan/edit', $data);
            $this->load->view('Footer/Footer');
        } else {
            $data = array(
                'Id_kode_tender' => $this->input->post('Id_kode_tender'),
                'No_Penjelasan' => $this->input->post('No_Penjelasan'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Nama_penyedia' => $this->input->post('Nama_penyedia'),
                'Pertanyaan' => $this->input->post('Pertanyaan'),
                'Jawaban' => $this->input->post('Jawaban'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Penjelasan_model->update($Id_penjelasan, $data);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect('penjelasan');
        }
    }

    public function delete($Id_penjelasan) {
        $this->Penjelasan_model->delete($Id_penjelasan);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('penjelasan');
    }
}
?>
