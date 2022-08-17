<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
    }
    public function home(){
        $data['title'] = 'Home';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/home');
        $this->load->view('template/foot');
    }
    public function userHome(){
        $this->load->view('template/userHead');
        $this->load->view('template/userNavbar');
        $this->load->view('user/home');
        $this->load->view('template/foot');
    }
    public function movie(){
        $data['title'] = 'Movies';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/movie');
        $this->load->view('template/foot');
    }
    public function theater(){
        $data['title'] = 'Theaters';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/theater');
        $this->load->view('template/foot');
    }
    public function subordinate(){
        $this->load->view('template/userHead');
        $this->load->view('template/userNavbar');
        $this->load->view('user/subordinate');
        $this->load->view('template/foot');
    }
    public function selfLearning(){
        $this->load->view('template/userHead');
        $this->load->view('template/userNavbar');
        $this->load->view('user/selfLearning');
        $this->load->view('template/foot');
    }
    public function ticket(){
        $this->load->view('template/userHead');
        $this->load->view('template/userNavbar');
        $this->load->view('user/ticket');
        $this->load->view('template/foot');
    }
}   