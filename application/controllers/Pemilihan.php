<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemilihan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pemilihan_model');
        $this->load->library('form_validation');
        $this->load->model('Evaluasi_model');
        $this->load->model('Klarifikasi_model');
        $this->load->model('Paket_model');
        $this->load->model('Negosiasi_model');
        $this->load->model('Pembuktian_model');
        $this->load->model('Penjelasan_model');
    }

    public function index() {
        $data['pemilihans'] = $this->Pemilihan_model->get_all();
        $data['evaluasis'] = $this->Evaluasi_model->get_all();
        $data['negosiasis'] = $this->Negosiasi_model->get_all();
        $data['pakets'] = $this->Paket_model->get_all_paket();
        $data['pembuktians'] = $this->Pembuktian_model->get_all();
        $data['klarifikasis'] = $this->Klarifikasi_model->get_all();
        $data['penjelasans'] = $this->Penjelasan_model->get_all();
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('pemilihan/list', $data);
        $this->load->view('Footer/Footer');
        
    }

    public function add() {
        $this->form_validation->set_rules('Id_paket', 'Nama Tender', 'required');
        $this->form_validation->set_rules('Id_penjelasan', 'Nomor Penjelasan', 'required');
        $this->form_validation->set_rules('Id_evaluasi_Penawaran', 'Id Evaluasi Penawaran', 'required');
        $this->form_validation->set_rules('Id_pembuktian', 'Id Pembuktian', 'required');
        $this->form_validation->set_rules('Id_klarifikasi', 'Id Klarifikasi', 'required');
        $this->form_validation->set_rules('Id_negosiasi', 'Id Negosiasi', 'required');
        $this->form_validation->set_rules('No_Pemilihan', 'Nomor Pemilihan', 'required');
        $this->form_validation->set_rules('Pertanyaan_sanggah', 'Pertanyaan Sanggah', 'required');
        $this->form_validation->set_rules('Jawaban_sanggah', 'Jawaban Sanggah', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Cek_list', 'Cek List', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['evaluasis'] = $this->Evaluasi_model->get_all();
            $data['klarifikasis'] = $this->Klarifikasi_model->get_all();
            $data['negosiasis'] = $this->Negosiasi_model->get_all();
            $data['pakets'] = $this->Paket_model->get_all_paket();
            $data['pembuktians'] = $this->Pembuktian_model->get_all();
            $data['penjelasans'] = $this->Penjelasan_model->get_all();
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('pemilihan/add',$data);
            $this->load->view('Footer/Footer');
            
        } else {
            $data = array(
                'Id_paket' => $this->input->post('Id_paket'),
                'Id_penjelasan' => $this->input->post('Id_penjelasan'),
                'Id_evaluasi_Penawaran' => $this->input->post('Id_evaluasi_Penawaran'),
                'Id_pembuktian' => $this->input->post('Id_pembuktian'),
                'Id_klarifikasi' => $this->input->post('Id_klarifikasi'),
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
        $this->form_validation->set_rules('Id_negosiasi', 'ID Negosiasi', 'required');
        $this->form_validation->set_rules('No_Pemilihan', 'Nomor Pemilihan', 'required');
        $this->form_validation->set_rules('Pertanyaan_sanggah', 'Pertanyaan Sanggah', 'required');
        $this->form_validation->set_rules('Jawaban_sanggah', 'Jawaban Sanggah', 'required');
        $this->form_validation->set_rules('Tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('Cek_list', 'Cek List', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['pakets'] = $this->Paket_model->get_all_paket();
            $data['penjelasans'] = $this->Penjelasan_model->get_all();
            $data['evaluasis'] = $this->Evaluasi_model->get_all();
            $data['pembuktians'] = $this->Pembuktian_model->get_all();
            $data['klarifikasis'] = $this->Klarifikasi_model->get_all();
            $data['negosiasis'] = $this->Negosiasi_model->get_all();
            $data['pemilihan'] = $this->Pemilihan_model->get_by_id($id); // Mengambil data pemilihan berdasarkan ID
            $this->load->view('Header/Head');
            $this->load->view('Header/Header');
            $this->load->view('pemilihan/edit', $data);
            $this->load->view('Footer/Footer');
        } else {
            $data = array(
                'Id_paket' => $this->input->post('Id_paket'),
                'Id_penjelasan' => $this->input->post('Id_penjelasan'),
                'Id_evaluasi_Penawaran' => $this->input->post('Id_evaluasi_Penawaran'),
                'Id_pembuktian' => $this->input->post('Id_pembuktian'),
                'Id_klarifikasi' => $this->input->post('Id_klarifikasi'),
                'Id_negosiasi' => $this->input->post('Id_negosiasi'),
                'No_Pemilihan' => $this->input->post('No_Pemilihan'),
                'Pertanyaan_sanggah' => $this->input->post('Pertanyaan_sanggah'),
                'Jawaban_sanggah' => $this->input->post('Jawaban_sanggah'),
                'Tanggal' => $this->input->post('Tanggal'),
                'Cek_list' => $this->input->post('Cek_list'),
                'Keterangan_lain' => $this->input->post('Keterangan_lain')
            );
    
            $this->Pemilihan_model->update($id, $data); // Memanggil model untuk melakukan update data pemilihan
            redirect('pemilihan');
        }
    }
    

    public function delete($id) {
        $this->Pemilihan_model->delete($id);
        redirect('pemilihan');
    }
}