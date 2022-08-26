<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
    }
    public function insertTheater(){
        $movieId = $this->input->post('movie');
        $datetime = $this->input->post('datetime');
        $location = $this->input->post('location');
        $createdBy = $this->input->post('createdBy');

        $data = array(
            'movieId' => $movieId,
            'theaterTime' => $datetime,
            'theaterLocation' => $location,
            'theaterActive' => 'Ya',
            'theaterPIC' => $createdBy,
        );

        $this->udel->insertTheater($data);
        redirect('theater');
    }

    public function editTheater(){
      
        $theaterId = $this->input->post('theaterId');
        $datetime = $this->input->post('datetime');
        $location = $this->input->post('location');
  
        $data = array (     
          'theaterTime' => $datetime,
          'theaterLocation' => $location
        );
        
        $where = $theaterId;
        
        $this->udel->updateTheater('theater',$data, $where);
        redirect('theater');
      }

      public function register(){

        $theaterId = $this->input->post('theaterId');
        $employeeId = $this->input->post('subordinateId');
       
        $data = array(
            'theaterId' => $theaterId,
            'employeeId' => $employeeId
        );

        $this->udel->insert('ticket', $data);
        redirect('ticket');
      }
}