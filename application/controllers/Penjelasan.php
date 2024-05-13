<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjelasan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Penjelasan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['penjelasans'] = $this->Penjelasan_model->get_all();
        $this->load->view('Header/NavBar');
        $this->load->view('penjelasan/list', $data);
    }

    public function add() {
        $this->form_validation->set_rules('Id_kode_tender', 'ID Kode Tender', 'required');
        $this->form_validation->set_rules('No_Penjelasan', 'Nomor Penjelasan', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Nama_penyedia', 'Nama Penyedia', 'required');
        $this->form_validation->set_rules('Pertanyaan', 'Pertanyaan', 'required');
        $this->form_validation->set_rules('Jawaban', 'Jawaban', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Header/NavBar');
            $this->load->view('penjelasan/add');
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
            $data['penjelasan'] = $this->Penjelasan_model->get_by_id($Id_penjelasan);
            $this->load->view('Header/NavBar');
            $this->load->view('penjelasan/edit', $data);
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
            redirect('penjelasan');
        }
    }

    public function delete($Id_penjelasan) {
        $this->Penjelasan_model->delete($Id_penjelasan);
        redirect('penjelasan');
    }
}
