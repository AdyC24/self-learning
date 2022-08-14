<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
    }

    public function home(){
        $this->load->view('template/head');
        $this->load->view('template/navbar');
        $this->load->view('page/home');
        $this->load->view('template/foot');
    }

    public function movie(){
        $this->load->view('template/head');
        $this->load->view('template/navbar');
        $this->load->view('page/movie');
        $this->load->view('template/foot');
    }
}