<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
  var $pre = 'theater';

    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
    }
    public function movieSearch(){
      $val = $this->input->post('search');
      if($val){
        $data['movies'] = $this->udel->getMoviesSearch($val);

        $this->load->view('ajax/movie', $data);
      } else {
        redirect('movie');
      }
    }       
    public function showMovie(){
      $data['movies'] = $this->udel->getMovies();
      $this->load->view('ajax/movie', $data);
    }
    
}