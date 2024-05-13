<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    // Index page showing all users
    public function index() {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('Header/NavBar');
        $this->load->view('user/list', $data);
    }
    
    // Add new user
    public function add() {
        if ($this->input->post()) {
            $data = array(
                'id_pokja' => $this->input->post('id_pokja'),
                'Username' => $this->input->post('Username'),
                'Password' => $this->input->post('Password'),
                'Level' => $this->input->post('Level')
            );
            $this->User_model->create_user($data);
            redirect('user');
        } else {
            $this->load->view('Header/NavBar');
            $this->load->view('user/add');
        }
    }
    
    // Edit user
    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'id_pokja' => $this->input->post('id_pokja'),
                'Username' => $this->input->post('Username'),
                'Password' => $this->input->post('Password'),
                'Level' => $this->input->post('Level')
            );
            $this->User_model->update_user($id, $data);
            redirect('user');
        } else {
            $data['user'] = $this->User_model->get_user_by_id($id);
            $this->load->view('Header/NavBar');
            $this->load->view('user/edit', $data);
        }
    }
    
    // Delete user
    public function delete($id) {
        $this->User_model->delete_user($id);
        redirect('user');
    }
}
?>
