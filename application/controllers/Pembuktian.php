<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembuktian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pembuktian_model');
        $this->load->library('form_validation');
        $this->load->model('Evaluasi_model');
        $this->load->library('session');
    }
    
    public function get_nama_penyedia() {
        $id_evaluasi_penawaran = $this->input->post('Id_evaluasi_penawaran');
        $this->load->model('Evaluasi_model');
        $evaluasi = $this->Evaluasi_model->get_by_id($id_evaluasi_penawaran);
        
        echo json_encode($evaluasi);
    }

    public function index() {
        $data['pembuktians'] = $this->Pembuktian_model->get_all();
        $data['evaluasis'] = $this->Evaluasi_model->get_all();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('pembuktian/list', $data);
        $this->load->view('Footer/Footer');
    }

    public function add() {
        $this->form_validation->set_rules('Id_evaluasi_penawaran', 'ID Evaluasi Penawaran', 'required');
        $this->form_validation->set_rules('No_Pembuktian', 'Nomor Pembuktian', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('Tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('Nama_hadir', 'Nama Hadir', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('Keterangan_lain', 'Keterangan Lain', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['evaluasis'] = $this->Evaluasi_model->get_all();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('pembuktian/add',$data);
            $this->load->view('Footer/Footer');
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Pembuktian' => $this->input->post('No_Pembuktian'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Waktu' => $this->input->post('Waktu'),
                'Tempat' => $this->input->post('Tempat'),
                'Alamat' => $this->input->post('Alamat'),
                'Nama_hadir' => $this->input->post('Nama_hadir'),
                'jabatan' => $this->input->post('jabatan'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Pembuktian_model->add($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('pembuktian');
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('Id_evaluasi_penawaran', 'ID Evaluasi Penawaran', 'required');
        $this->form_validation->set_rules('No_Pembuktian', 'Nomor Pembuktian', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('Tempat', 'Tempat', 'required');
        $this->form_validation->set_rules('Alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('Nama_hadir', 'Nama Hadir', 'required');
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required');
        $this->form_validation->set_rules('Keterangan_lain', 'Keterangan Lain', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['pembuktian'] = $this->Pembuktian_model->get_by_id($id);
            $data['evaluasis'] = $this->Evaluasi_model->get_all();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('pembuktian/edit', $data);
            $this->load->view('Footer/Footer');
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Pembuktian' => $this->input->post('No_Pembuktian'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Waktu' => $this->input->post('Waktu'),
                'Tempat' => $this->input->post('Tempat'),
                'Alamat' => $this->input->post('Alamat'),
                'Nama_hadir' => $this->input->post('Nama_hadir'),
                'jabatan' => $this->input->post('jabatan'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Pembuktian_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect('pembuktian');
        }
    }

    public function delete($id) {
        $this->Pembuktian_model->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('pembuktian');
    }
}
?>
