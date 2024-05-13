<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembuktian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pembuktian_model');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['pembuktians'] = $this->Pembuktian_model->get_all();
        $this->load->view('Header/NavBar');
        $this->load->view('pembuktian/list', $data);
    }

    public function add() {
        $this->form_validation->set_rules('Id_evaluasi_penawaran', 'ID Evaluasi Penawaran', 'required');
        $this->form_validation->set_rules('No_Pembuktian', 'Nomor Pembuktian', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('Tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('Nama_penyedia', 'Nama Penyedia', 'required');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('Nama_hadir', 'Nama Hadir', 'required');
        $this->form_validation->set_rules('Keterangan_lain', 'Keterangan Lain', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Header/NavBar');
            $this->load->view('pembuktian/add');
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Pembuktian' => $this->input->post('No_Pembuktian'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Waktu' => $this->input->post('Waktu'),
                'Tempat' => $this->input->post('Tempat'),
                'Nama_penyedia' => $this->input->post('Nama_penyedia'),
                'Alamat' => $this->input->post('Alamat'),
                'Nama_hadir' => $this->input->post('Nama_hadir'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Pembuktian_model->add($data);
            redirect('pembuktian');
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('Id_evaluasi_penawaran', 'ID Evaluasi Penawaran', 'required');
        $this->form_validation->set_rules('No_Pembuktian', 'Nomor Pembuktian', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('Tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('Nama_penyedia', 'Nama Penyedia', 'required');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('Nama_hadir', 'Nama Hadir', 'required');
        $this->form_validation->set_rules('Keterangan_lain', 'Keterangan Lain', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['pembuktian'] = $this->Pembuktian_model->get_by_id($id);
            $this->load->view('Header/NavBar');
            $this->load->view('pembuktian/edit', $data);
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Pembuktian' => $this->input->post('No_Pembuktian'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Waktu' => $this->input->post('Waktu'),
                'Tempat' => $this->input->post('Tempat'),
                'Nama_penyedia' => $this->input->post('Nama_penyedia'),
                'Alamat' => $this->input->post('Alamat'),
                'Nama_hadir' => $this->input->post('Nama_hadir'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Pembuktian_model->update($id, $data);
            redirect('pembuktian');
        }
    }

    public function delete($id) {
        $this->Pembuktian_model->delete($id);
        redirect('pembuktian');
    }
}
