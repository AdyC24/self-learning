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
    public function movieSearchById(){
      $employeeId = $this->uri->segment('3');
      $val = $this->input->post('search');
      if($val){
        $data['movies'] = $this->udel->getMoviesSearchById($val, $employeeId);
        $this->load->view('ajax/movie', $data);
      } else {
        $data['movies'] = $this->udel->getMoviesById($employeeId);
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

    public function ticketOnHome(){
      $id = $this->session->userdata('id');

      $data['subtickets'] = $this->udel->getTicketBySubordinate($id)->result_array();
      $data['id'] = $id;
      $this->load->view('ajax/ticket', $data);
    }
    
    public function ticketOnSubordinate(){
      $karId = $this->uri->segment('3');

      $data['subtickets'] = $this->udel->getTicketBySubordinate($karId)->result_array();
      $data['id'] = $karId;
      $this->load->view('ajax/ticket', $data);
    }

    public function developmentPlan(){
      $karId = $this->uri->segment('3');
      $employeeId = $this->udel->getEmployeeIdById($karId);

      $data['role'] = $this->session->userdata('role');
      $data['competences'] = $this->udel->getCompetencyById($employeeId['employeeId'])->result_array();
      $data['subordinate'] = $this->udel->getSubordinateById($karId);
      $data['id'] = $this->uri->segment('3');

      $this->load->view('ajax/developmentPlan', $data);
    }

    public function subordinate(){
      $karId = $this->uri->segment('3');

      $data['role'] = $this->session->userdata('role');
      $data['id'] = $this->uri->segment('3');
      $data['subordinates'] = $this->udel->getSubordinate($karId);

      $this->load->view('ajax/subordinate', $data);
    }
    public function updateNotification(){
      $karId = $this->session->userdata('id');
      $notificationId = $this->input->post('id');

      $data = array (
          'notificationRead' => 'Ya'
      );

      $this->udel->updateNotification('notification', $data, $notificationId);

      $data['notifications'] = $this->udel->getNotification($karId);

      $this->load->view('ajax/notification', $data);
  }
}