<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
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
        $data['movies'] = $this->udel->getMovies();
        $this->load->view('ajax/movie', $data);
      }
    }   

    public function subordinateSearch(){
      $id = $this->session->userdata('id');
      $val = $this->input->post('search');
      
      if($val){
        $data['subordinates'] = $this->udel->getSubordinateSearch($id, $val);
        
        
          $this->load->view('ajax/subordinates', $data);
        
        
      } else {
        $data['subordinates'] = $this->udel->getSubordinate($id);
        $this->load->view('ajax/subordinates', $data);
      }
    }

    public function ticket(){
      $id = $this->session->userdata('id');

      $data['role'] = $this->session->userdata('role');
      $data['subtickets'] = $this->udel->getTicketBySubordinate($id);

      $this->load->view('ajax/ticket', $data);
    }

    public function developmentPlan(){
      $karId = $this->session->userdata('id');
      $employeeId = $this->udel->getEmployeeIdById($karId);

      $data['role'] = $this->session->userdata('role');
      $data['competences'] = $this->udel->getCompetencyById($employeeId['employeeId'])->result_array();
      $data['subordinate'] = $this->udel->getSubordinateById($karId);

      $this->load->view('ajax/developmentPlan', $data);
    }
}