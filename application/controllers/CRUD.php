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
        $this->udel->insert('theater',$data);
        redirect('theater');
    }
    public function editTheater(){  
        $movieId = $this->uri->segment('3');  
        $theaterId = $this->input->post('theaterId');
        $datetime = $this->input->post('datetime');
        $location = $this->input->post('location');
  
        $data = array (     
          'theaterTime' => $datetime,
          'theaterLocation' => $location
        );
        $where = $theaterId;
        $this->udel->updateTheater('theater',$data, $where);

        if($movieId >= 1){
            redirect('Page/movieDetail/'.$movieId);
        } else {
            redirect('theater');
        }
    }


    public function register(){
        $theaterId = $this->input->post('theaterId');
        $employeeId = $this->input->post('subordinateId');
        $ticketStatus = 'Terdaftar';
       
        $data = array(
            'theaterId' => $theaterId,
            'employeeId' => $employeeId,
            'ticketStatus' => $ticketStatus
        );

        $checkTicket = $this->udel->checkTicket($theaterId, $employeeId);
        $countTicket = $this->udel->countTicket($theaterId);
        
        $dataTicket = array(
            'theaterTicketCount' => $countTicket
        ); 
        
        if($countTicket == 20){
            $this->session->set_flashdata('failed','Not Success: This theater has been full');
            redirect('ticket');
        }

        $this->udel->updateCountTicket('theater', $dataTicket, $theaterId);

        if($checkTicket >= 1){
            $this->session->set_flashdata('failed','Not Success: Ticket has been already created on this theater');
            redirect('ticket');
        } else {
            $this->udel->insert('ticket', $data);
            redirect('ticket');
        }
    }


    public function deleteTheater(){
        $movieId = $this->uri->segment('3');  
        $where = $this->input->post('theaterId');      

        $this->udel->delete('theater', $where);
        if($movieId >= 1){
            redirect('Page/movieDetail/'.$movieId);
        } else {
            redirect('theater');
        }
    }
    public function deleteTicket(){
        $where = $this->input->post('ticketId');      

        $this->udel->deleteTicket('ticket', $where);
            redirect('ticket');
   
    }
    public function insertMovie(){
        $competenceId = $this->input->post('competencyId');
        $genreId = $this->input->post('genreId');
        $movieName = $this->input->post('movieName');
        $movieSynopsis = $this->input->post('movieSynopsis');
        $movieRank = $this->input->post('IMDbRank');
        $movieDuration = $this->input->post('movieDuration');
        $moviePicture = 'no_image.png';
        $movieActive = 'Ya';
        $movieYear = $this->input->post('movieYear');
        $movieLanguage = $this->input->post('movieLanguage');

        $data = array (
            'competenceId' => $competenceId,
            'genreId' => $genreId,
            'movieName' => $movieName,
            'movieSynopsis' => $movieSynopsis,
            'movieRank' => $movieRank,
            'movieDuration' => $movieDuration,
            'moviePicture' => $moviePicture,
            'movieActive' => $movieActive,
            'movieYear' => $movieYear,
            'movieLanguage' => $movieLanguage,
        );

        $this->udel->insert('movie', $data);
        redirect('movie');
    }
    public function movieActivation(){
        $movieId = $this->uri->segment('3');
        $movieActive = $this->uri->segment('4');
        
        $data = array (
            'movieActive' => $movieActive
        );

        $where = $movieId;

        $this->udel->updateMovieActivation('movie', $data, $where);
        redirect('Page/movieDetail/'.$movieId);
    }
    public function updateTicket(){
        $movieId = $this->uri->segment('3');
        $theaterId = $this->uri->segment('4');
        $ticketIds = $this->input->post('ticketId');
       
        foreach($ticketIds as $ticketId){

            $id = $ticketId;
            
            $data = array (
                'ticketStatus' => 'Hadir'
            );

            $this->udel->updateTicketStatus('ticket', $data, $id);
            redirect('Page/absenceDetail/'.$movieId.'/'.$theaterId);
        };
    }
    

}