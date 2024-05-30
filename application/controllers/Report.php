<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
    public function __construct() {
        parent::__construct();

        
    }

    public function index() {
        $this->load->view('Header/Head');
        $this->load->view('Header/Header');
        $this->load->view('report/report_paket');
        $this->load->view('Footer/Footer');
    }
}
?>
