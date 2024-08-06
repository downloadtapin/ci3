<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klarifikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Klarifikasi_model');
        $this->load->library('form_validation');
        $this->load->model('Evaluasi_model');
    }

    public function index() {
        $data['klarifikasis'] = $this->Klarifikasi_model->get_all();
        $data['evaluasis'] = $this->Evaluasi_model->get_all();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('klarifikasi/list', $data);
        $this->load->view('Footer/Footer');
    }

    public function add() {
        $this->form_validation->set_rules('Id_evaluasi_penawaran', 'No evaluasi penawaran', 'required');
        $this->form_validation->set_rules('No_Klarifikasi', 'Nomor Klarifikasi', 'required');
        $this->form_validation->set_rules('Peralatan', 'Peralatan', 'required');
        $this->form_validation->set_rules('Tenaga_ahli', 'Tenaga Ahli', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['evaluasis'] = $this->Evaluasi_model->get_all();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('klarifikasi/add', $data);
            $this->load->view('Footer/Footer');
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Klarifikasi' => $this->input->post('No_Klarifikasi'),
                'Peralatan' => $this->input->post('Peralatan'),
                'Tenaga_ahli' => $this->input->post('Tenaga_ahli'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Klarifikasi_model->add($data);
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');
            redirect('klarifikasi');
        }
    }

    public function edit($id) {
        $this->form_validation->set_rules('Id_evaluasi_penawaran', 'No evaluasi penawaran', 'required');
        $this->form_validation->set_rules('No_Klarifikasi', 'Nomor Klarifikasi', 'required');
        $this->form_validation->set_rules('Peralatan', 'Peralatan', 'required');
        $this->form_validation->set_rules('Tenaga_ahli', 'Tenaga Ahli', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['klarifikasi'] = $this->Klarifikasi_model->get_by_id($id);
            $data['evaluasis'] = $this->Evaluasi_model->get_all();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('klarifikasi/edit', $data);
            $this->load->view('Footer/Footer');
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Klarifikasi' => $this->input->post('No_Klarifikasi'),
                'Peralatan' => $this->input->post('Peralatan'),
                'Tenaga_ahli' => $this->input->post('Tenaga_ahli'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Klarifikasi_model->update($id, $data);
            $this->session->set_flashdata('success', 'Data berhasil diubah.');
            redirect('klarifikasi');
        }
    }

    public function delete($id) {
        $this->Klarifikasi_model->delete($id);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
        redirect('klarifikasi');
    }
}
