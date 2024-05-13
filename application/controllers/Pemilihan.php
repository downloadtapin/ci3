<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilihan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pemilihan_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['pemilihans'] = $this->Pemilihan_model->get_all();
        $this->load->view('pemilihan/list', $data);
    }

    public function add() {
        $this->form_validation->set_rules('Id_negosiasi', 'ID Negosiasi', 'required');
        $this->form_validation->set_rules('No_Pemilihan', 'Nomor Pemilihan', 'required');
        $this->form_validation->set_rules('Pertanyaan_sanggah', 'Pertanyaan Sanggah', 'required');
        $this->form_validation->set_rules('Jawaban_sanggah', 'Jawaban Sanggah', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Cek_list', 'Cek List', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pemilihan/add');
        } else {
            $data = array(
                'Id_negosiasi' => $this->input->post('Id_negosiasi'),
                'No_Pemilihan' => $this->input->post('No_Pemilihan'),
                'Pertanyaan_sanggah' => $this->input->post('Pertanyaan_sanggah'),
                'Jawaban_sanggah' => $this->input->post('Jawaban_sanggah'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Cek_list' => $this->input->post('Cek_list'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );

            $this->Pemilihan_model->add($data);
            redirect('pemilihan');
        }
    }

    public function edit($id) {
        $data['pemilihan'] = $this->Pemilihan_model->get_by_id($id);
        if (empty($data['pemilihan'])) {
            show_404();
        }

        $this->form_validation->set_rules('Id_negosiasi', 'ID Negosiasi', 'required');
        $this->form_validation->set_rules('No_Pemilihan', 'Nomor Pemilihan', 'required');
        $this->form_validation->set_rules('Pertanyaan_sanggah', 'Pertanyaan Sanggah', 'required');
        $this->form_validation->set_rules('Jawaban_sanggah', 'Jawaban Sanggah', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Cek_list', 'Cek List', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('pemilihan/edit', $data);
        } else {
            $data = array(
                'Id_negosiasi' => $this->input->post('Id_negosiasi'),
                'No_Pemilihan' => $this->input->post('No_Pemilihan'),
                'Pertanyaan_sanggah' => $this->input->post('Pertanyaan_sanggah'),
                'Jawaban_sanggah' => $this->input->post('Jawaban_sanggah'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Cek_list' => $this->input->post('Cek_list'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );

            $this->Pemilihan_model->update($id, $data);
            redirect('pemilihan');
        }
    }

    public function delete($id) {
        $this->Pemilihan_model->delete($id);
        redirect('pemilihan');
    }
}
