<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Negosiasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Negosiasi_model');
        $this->load->library('form_validation');
        $this->load->model('Evaluasi_model');
    }

    public function index() {
        $data['negosiasis'] = $this->Negosiasi_model->get_all();
        $data['evaluasis'] = $this->Evaluasi_model->get_all();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('negosiasi/list', $data);
        $this->load->view('Footer/Footer');
        
    }

    public function add() {
        $this->form_validation->set_rules('Id_evaluasi_penawaran', 'No Evaluasi Penawaran', 'required');
        $this->form_validation->set_rules('No_Negosiasi', 'Nomor Negosiasi', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('harga_penawaran', 'Harga Penawaran', 'required');
        $this->form_validation->set_rules('harga_terkoreksi', 'Harga Terkoreksi', 'required');
        $this->form_validation->set_rules('hasil_evaluasi', 'Hasil Evaluasi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['evaluasis'] = $this->Evaluasi_model->get_all();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('negosiasi/add', $data);
            $this->load->view('Footer/Footer');
            
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Negosiasi' => $this->input->post('No_Negosiasi'),
                'Tanggal' => $this->input->post('Tanggal'),
                'harga_penawaran' => $this->input->post('harga_penawaran'),
                'harga_terkoreksi' => $this->input->post('harga_terkoreksi'),
                'harga_negosiasi' => $this->input->post('harga_negosiasi'),
                'hasil_evaluasi' => $this->input->post('hasil_evaluasi'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );

            $this->Negosiasi_model->add($data);
            redirect('negosiasi');
        }
    }

    public function edit($id) {
        $data['negosiasi'] = $this->Negosiasi_model->get_by_id($id);
        if (empty($data['negosiasi'])) {
            show_404();
        }

        $this->form_validation->set_rules('Id_evaluasi_penawaran', 'No Evaluasi Penawaran', 'required');
        $this->form_validation->set_rules('No_Negosiasi', 'Nomor Negosiasi', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('harga_penawaran', 'Harga Penawaran', 'required');
        $this->form_validation->set_rules('harga_terkoreksi', 'Harga Terkoreksi', 'required');
        $this->form_validation->set_rules('hasil_evaluasi', 'Hasil Evaluasi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['evaluasis'] = $this->Evaluasi_model->get_all();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('negosiasi/edit', $data);
            $this->load->view('Footer/Footer');
            
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Negosiasi' => $this->input->post('No_Negosiasi'),
                'Tanggal' => $this->input->post('Tanggal'),
                'harga_penawaran' => $this->input->post('harga_penawaran'),
                'harga_terkoreksi' => $this->input->post('harga_terkoreksi'),
                'harga_negosiasi' => $this->input->post('harga_negosiasi'),
                'hasil_evaluasi' => $this->input->post('hasil_evaluasi'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );

            $this->Negosiasi_model->update($id, $data);
            redirect('negosiasi');
        }
    }

    public function delete($id) {
        $this->Negosiasi_model->delete($id);
        redirect('negosiasi');
    }
}
