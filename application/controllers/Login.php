<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Userlogin_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('Header/Head');
        $this->load->view('Auth/login');
    }

    public function process() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('Auth/login');
        } else {
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $user = $this->Userlogin_model->authenticate($username, $password);

            if ($user) {
                // Jika login berhasil, simpan data pengguna ke session
                $data_session = array(
                    'nama' => $username,
                    'level' => $username
                    );
     
                $this->session->set_userdata($data_session);
                redirect('dashboard');
            } else {
                // Jika login gagal, tampilkan pesan error
                $data['error'] = 'Username atau password salah.';
                $this->load->view('Auth/login', $data);
            }
        }
    }

    public function logout() {
        // Hapus semua data pengguna dari session
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');
        // Redirect ke halaman login
        redirect('login');
    }
}
