<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CRUD extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
    }
    public function insertTheater(){
        $movieId = $this->input->post('movie');
        $movieName = $this->udel->getMovie($movieId);
        $datetime = $this->input->post('datetime');
        $location = $this->input->post('location');
        $createdBy = $this->input->post('createdBy');
        $KarIdByStatus = $this->udel->getKarIdByStatus();
        

        $data = array(
            'movieId' => $movieId,
            'theaterTime' => $datetime,
            'theaterLocation' => $location,
            'theaterActive' => 'Ya',
            'theaterPIC' => $createdBy,
        );
        $this->udel->insert('theater',$data);

        foreach($KarIdByStatus as $karId){

            $data1 = array (
                'notificationText' => 'Jadwal '.$movieName['movieName'].' telah ditambahkan',
                'KAR_ID' => $karId['KAR_ID'],
                'notificationRead' => 'Tidak'
            );
            $this->udel->insert('notification', $data1);
        };
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
        $karId = $this->input->post('subordinateId');
        $employee = $this->udel->getEmployeeIdById($karId);
        $employeeId = $employee['employeeId'];

        
        $ticketStatus = 'Terdaftar';
       
        $data = array(
            'theaterId' => $theaterId,
            'employeeId' => $karId,
            'ticketStatus' => $ticketStatus
        );

        $checkTicket = $this->udel->checkTicket($theaterId, $karId);
        $countTicket = $this->udel->countTicket($theaterId) + 1;
        $countTicketById = $this->udel->countTicketById($karId) + 1;
        $where = $employeeId;
        
        $data1 = array (
            'employeeTicketCount' => $countTicketById
        );
        $dataTicket = array(
            'theaterTicketCount' => $countTicket
        ); 

        if($countTicket == 20){
            $this->session->set_flashdata('failed','Not Success: This theater has been full');
        }
        if($checkTicket >= 1){
            $this->session->set_flashdata('failed','Not Success: Ticket has been already created on this theater');
        } else {
            $this->udel->insert('ticket', $data);
        }
        $this->udel->updateCountTicket('theater', $dataTicket, $theaterId);
        $this->udel->updateCountTicketById('employee', $data1, $where);
        redirect('ticket');
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
        $theaterId = $this->input->post('theaterId'); 

        $this->udel->deleteTicket('ticket', $where);

        $countTicket = $this->udel->countTicket($theaterId); 
        $dataTicket = array(
            'theaterTicketCount' => $countTicket
        ); 
        $this->udel->updateCountTicket('theater', $dataTicket, $theaterId);
            redirect('ticket');
   
    }
    public function insertMovie(){
        $competenceId = $this->input->post('competencyId');
        $competenceName = $this->udel->getCompetenceName($competenceId);
        $genreId = $this->input->post('genreId');
        $movieName = $this->input->post('movieName');
        $movieSynopsis = $this->input->post('movieSynopsis');
        $movieRank = $this->input->post('IMDbRank');
        $movieDuration = $this->input->post('movieDuration');
        $moviePicture = 'no_image.png';
        $movieActive = 'Ya';
        $movieYear = $this->input->post('movieYear');
        $movieLanguage = $this->input->post('movieLanguage');
        $KarIdByStatus = $this->udel->getKarIdByStatus();

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

        foreach($KarIdByStatus as $karId){

            $data1 = array (
                'notificationText' => 'Movie '.$movieName.' dengan kompetensi '.$competenceName['competenceName'].' telah ditambahkan',
                'KAR_ID' => $karId['KAR_ID'],
                'notificationRead' => 'Tidak'
            );
            $this->udel->insert('notification', $data1);
        };
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
        $karId = $this->input->post('karId');
        $employee = $this->udel->getEmployeeIdById($karId);
        $employeeId = $employee['employeeId'];
       
        foreach($ticketIds as $ticketId){

            $id = $ticketId;
            $data = array (
                'ticketStatus' => 'Hadir'
            );
            $this->udel->updateTicketStatus('ticket', $data, $id);
        };

        $countTicketByStatus = $this->udel->countTicketByStatus($karId, 'Hadir');
        
        $data1 = array(
            'employeeTicketWatches' => $countTicketByStatus
        );

        $this->udel->updateCountTicketByStatus('employee', $data1, $employeeId);
        redirect('Page/absenceDetail/'.$movieId.'/'.$theaterId);
    }
    public function updateTheaterStatus(){
        $movieId = $this->uri->segment('3');
        $theaterId = $this->uri->segment('4');

        $data = array (
            'theaterActive' => 'Tidak'
        );
        $this->udel->updateTheaterStatus('theater', $data, $theaterId);
        redirect('Page/absenceDetail/'.$movieId.'/'.$theaterId);
    }

    public function updateInsertEmpComp(){
        $employeeId = $this->input->post('employeeId');
        $competencies = $this->input->post('competency');
        $competenceList = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19);      
        $competenceNotList = array_diff($competenceList, $competencies);
        
    //update/ insert + status "ya" 
        foreach($competencies as $competency){
            $empCompCheck = $this->udel->getEmpCompById($employeeId, $competency);
            
            if($empCompCheck > 0){
                // update
                $data = array (
                    'empcompStatus' => 'Ya'
                );
                $this->udel->updateEmpCompStatus('emp_comp', $data, $employeeId, $competency);
            } else {
                // insert
                $data = array (
                    'employeeId' => $employeeId,
                    'competenceId' => $competency,
                    'empcompStatus' => 'Ya'
                );
                $this->udel->insertEmpComp('emp_comp', $data);
            }  
        }

    // update status "tidak"
        foreach($competenceNotList as $competecyNotList){
            $data = array (
                'empcompStatus' => 'Tidak'
            );
            $this->udel->updateEmpCompStatus('emp_comp', $data, $employeeId, $competecyNotList);
        }

    // updateCompetencyCount
        $empCompCount = $this->udel->getCompCount($employeeId);

        $data = array (
            'employeeCompetencyCount' => $empCompCount
        );
        $this->udel->updateCompCountById('employee', $data, $employeeId);

        redirect('employee'); 
    }

    public function updateEmployeeStatus(){
        $employeeStatus = $this->uri->segment('3'); 
        $employeeId = $this->uri->segment('4');

        $data = array (
            'employeeStatus' => $employeeStatus
        );
        $this->udel->updateEmployeeStatus('employee', $data, $employeeId);     
        
        redirect('employee');
    }

    

}