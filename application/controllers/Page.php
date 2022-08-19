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
    public function movie(){
        $data['title'] = 'Movies';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/movie', $data);
        $this->load->view('template/foot');
    }
    public function movieDetail(){
        $movieId = $this->uri->segment('3');

        $data['title'] = 'Movie Details';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movie'] = $this->udel->getMovie($movieId);
       
        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/movieDetail', $data);
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
    public function ticket(){
        $data['title'] = 'Tickets';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/tickets', $data);
        $this->load->view('template/foot');
    }
    public function subordinate(){
        $data['title'] = 'Subordinates';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/subordinates', $data);
        $this->load->view('template/foot');
    }
    public function selfLearning(){
        $this->load->view('template/userHead');
        $this->load->view('template/userNavbar');
        $this->load->view('user/selfLearning');
        $this->load->view('template/foot');
    }
    
}   