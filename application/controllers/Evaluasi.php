<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Evaluasi_model');
        $this->load->library('form_validation');
        $this->load->model('Paket_model');
    }

    public function index() {
        $data['evaluasis'] = $this->Evaluasi_model->get_all();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('evaluasi/list', $data);
        $this->load->view('Footer/Footer');
        
    }

    public function add() {
        $this->form_validation->set_rules('Id_kode_tender', 'ID Kode Tender', 'required');
        $this->form_validation->set_rules('No_Evaluasi', 'Nomor Evaluasi', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Metode_evaluasi', 'Metode Evaluasi', 'required');
        $this->form_validation->set_rules('nama_Penyedia', 'Nama Penyedia', 'required');
        $this->form_validation->set_rules('nilai_penawaran', 'Nilai Penawaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['pakets'] = $this->Paket_model->get_all_paket();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('evaluasi/add',$data);
            $this->load->view('Footer/Footer');
            
        } else {
            $data = array(
                'Id_kode_tender' => $this->input->post('Id_kode_tender'),
                'No_Evaluasi' => $this->input->post('No_Evaluasi'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Metode_evaluasi' => $this->input->post('Metode_evaluasi'),
                'nama_Penyedia' => $this->input->post('nama_Penyedia'),
                'nilai_penawaran' => $this->input->post('nilai_penawaran'),
                'kualifikasi' => $this->input->post('kualifikasi'),
                'administrasi' => $this->input->post('administrasi'),
                'teknis' => $this->input->post('teknis'),
                'harga' => $this->input->post('harga'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Evaluasi_model->add($data);
            redirect('evaluasi');
        }
    }

    public function edit($Id_evaluasi_penawaran) {
        $this->form_validation->set_rules('Id_kode_tender', 'ID Kode Tender', 'required');
        $this->form_validation->set_rules('No_Evaluasi', 'Nomor Evaluasi', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Metode_evaluasi', 'Metode Evaluasi', 'required');
        $this->form_validation->set_rules('nama_Penyedia', 'Nama Penyedia', 'required');
        $this->form_validation->set_rules('nilai_penawaran', 'Nilai Penawaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['evaluasi'] = $this->Evaluasi_model->get_by_id($Id_evaluasi_penawaran);
            $data['pakets'] = $this->Paket_model->get_all_paket();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('evaluasi/edit', $data);
            $this->load->view('Footer/Footer');
            
        } else {
            $data = array(
                'Id_kode_tender' => $this->input->post('Id_kode_tender'),
                'No_Evaluasi' => $this->input->post('No_Evaluasi'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Metode_evaluasi' => $this->input->post('Metode_evaluasi'),
                'nama_Penyedia' => $this->input->post('nama_Penyedia'),
                'nilai_penawaran' => $this->input->post('nilai_penawaran'),
                'kualifikasi' => $this->input->post('kualifikasi') ? 1 : 0, // Mengubah nilai checkbox menjadi 1 jika dicentang, dan 0 jika tidak
                'administrasi' => $this->input->post('administrasi') ? 1 : 0,
                'teknis' => $this->input->post('teknis') ? 1 : 0,
                'harga' => $this->input->post('harga') ? 1 : 0,
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Evaluasi_model->update($Id_evaluasi_penawaran, $data);
            redirect('evaluasi');
        }
    }

    public function delete($Id_evaluasi_penawaran) {
        $this->Evaluasi_model->delete($Id_evaluasi_penawaran);
        redirect('evaluasi');
    }
}
