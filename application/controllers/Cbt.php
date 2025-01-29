<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbt extends CI_Controller {

    public function index()
    {
        $this->load->view('cbt/cbt');
    }

    public function ss1() {
        $this->load->view('cbt/ss1');
    }
    
    public function ss2() {
        $this->load->view('cbt/ss2');
    }
    
    public function ss3() {
        $this->load->view('cbt/ss3');
    }

    public function cert_exam() {
        $this->load->view('cbt/cert_exam');
    }
}
