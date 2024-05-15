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
        $this->load->view('Header/NavBar');
        $this->load->view('klarifikasi/list', $data);
    }

    public function add() {
        $this->form_validation->set_rules('Id_evaluasi_penawaran', 'No evaluasi penawaran', 'required');
        $this->form_validation->set_rules('No_Klarifikasi', 'Nomor Klarifikasi', 'required');
        $this->form_validation->set_rules('Peralatan', 'Peralatan', 'required');
        $this->form_validation->set_rules('Tenaga_ahli', 'Tenaga Ahli', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['evaluasis'] = $this->Evaluasi_model->get_all();
            $this->load->view('Header/NavBar');
            $this->load->view('klarifikasi/add', $data);
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Klarifikasi' => $this->input->post('No_Klarifikasi'),
                'Peralatan' => $this->input->post('Peralatan'),
                'Tenaga_ahli' => $this->input->post('Tenaga_ahli'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Klarifikasi_model->add($data);
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
            $this->load->view('Header/NavBar');
            $this->load->view('klarifikasi/edit', $data);
        } else {
            $data = array(
                'Id_evaluasi_penawaran' => $this->input->post('Id_evaluasi_penawaran'),
                'No_Klarifikasi' => $this->input->post('No_Klarifikasi'),
                'Peralatan' => $this->input->post('Peralatan'),
                'Tenaga_ahli' => $this->input->post('Tenaga_ahli'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
            $this->Klarifikasi_model->update($id, $data);
            redirect('klarifikasi');
        }
    }
    

    public function delete($id) {
        $this->Klarifikasi_model->delete($id);
        redirect('klarifikasi');
    }
}
