<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
    }

    public function home(){
        $this->load->view('page/home');
    }
}