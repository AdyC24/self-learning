<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
    }
    public function home(){
        
        $karId = $this->session->userdata('id');
        $employeeId = $this->udel->getEmployeeIdById($karId);
       
        $data['title'] = 'Home';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['subordinate'] = $this->udel->getSubordinateById($karId);
        $data['direct'] = $this->udel->getDirect($karId);
        $data['competences'] = $this->udel->getCompetencyById($employeeId['employeeId'])->result_array();
        $data['competenceCount'] = $this->udel->getCompetencyById($employeeId['employeeId'])->num_rows();
        $data['subticketCount'] = $this->udel->getTicketBySubordinate($karId)->num_rows();
       
       
        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/home', $data);
        $this->load->view('template/foot');
    }
    public function movie(){
        $employeeId = $this->uri->segment('3');

        $data['title'] = 'Movies';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();
        $data['moviesById'] = $this->udel->getMoviesById($employeeId);
        $data['competences'] = $this->udel->getCompetences();
        $data['genres'] = $this->udel->getGenre();
        $data['id'] = $this->uri->segment('3');

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/movie', $data);
        $this->load->view('template/foot');
    }
    public function movies(){
        $employeeId = $this->uri->segment('3');

        $data['title'] = 'Movies';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();
        $data['moviesById'] = $this->udel->getMoviesById($employeeId);
        $data['competences'] = $this->udel->getCompetences();
        $data['genres'] = $this->udel->getGenre();

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/movies', $data);
        $this->load->view('template/foot');
    }
    public function movieDetail(){
        $movieId = $this->uri->segment('3');
        $id = $this->session->userdata('id');
        $theaterStatus = 'Ya';
            

        $data['title'] = 'Movie Details';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movie'] = $this->udel->getMovie($movieId);
        $data['theaters'] = $this->udel->getTheater($movieId, $theaterStatus);
        $data['subordinates'] = $this->udel->getSubordinate($id);
        $data['id'] = $this->uri->segment('4');
       
        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/movieDetail', $data);
        $this->load->view('template/foot');
    }
    public function movieReview(){
        $movieId = $this->uri->segment('3');
        $id = $this->session->userdata('id');
        $theaterStatus = 'Ya';

        $data['title'] = 'Movie Details';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movie'] = $this->udel->getMovie($movieId);
        $data['theaters'] = $this->udel->getTheater($movieId, $theaterStatus);
        $data['subordinates'] = $this->udel->getSubordinate($id);
       
        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/movieReview', $data);
        $this->load->view('template/foot');
    }
    public function theater(){
        $theaterActive = 'Ya';

        $data['title'] = 'Theaters';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();
        $data['PICs'] = $this->udel->getPIC();
        $data['theaters'] = $this->udel->getTheatersByStatus($theaterActive);
        

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/theater', $data);
        $this->load->view('template/foot');
    }
    public function theatersArchive(){
        $theaterActive = 'Tidak';

        $data['title'] = 'Archive';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();
        $data['PICs'] = $this->udel->getPIC();
        $data['theaters'] = $this->udel->getTheatersByStatus($theaterActive);
        

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/theatersArchive', $data);
        $this->load->view('template/foot');
    }
    public function ticket(){
        $id = $this->session->userdata('id');

        $data['title'] = 'Tickets';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['tickets'] = $this->udel->getTicket($id);
        $data['subtickets'] = $this->udel->getTicketBySubordinate($id)->result_array();

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/tickets', $data);
        $this->load->view('template/foot');
    }
    public function subordinates(){
        $id = $this->session->userdata('id');

        $data['title'] = 'Subordinates';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['subordinates'] = $this->udel->getSubordinate($id);


        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/subordinates', $data);
        $this->load->view('template/foot');
    }
    public function competences(){
        $data['title'] = 'Competences';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['competences'] = $this->udel->getCompetences();

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/competences', $data);
        $this->load->view('template/foot');
    }
    public function absence(){
        $theaterActive = 'Ya';

        $data['title'] = 'Absence';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();
        $data['PICs'] = $this->udel->getPIC();
        $data['theaters'] = $this->udel->getTheatersByStatus($theaterActive);
        

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/absense', $data);
        $this->load->view('template/foot');
    }
    public function absenceDetail(){
        $movieId = $this->uri->segment('3');
        $theaterId = $this->uri->segment('4');

        $data['title'] = 'Absence Details';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movie'] = $this->udel->getMovie($movieId);
        $data['ticketIds'] = $this->udel->getTicketbyId($theaterId);
        $data['theater'] = $this->uri->segment('4');
        $data['theaterId'] = $this->udel->getTheatersById($theaterId);
        
        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/absenceDetail', $data);
        $this->load->view('template/foot');
    }
    public function employee(){
        $data['title'] = 'Employees';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['employees'] = $this->udel->getEmployee();

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/employees', $data);
        $this->load->view('template/foot');
    }
    public function observation(){
        $data['title'] = 'Observation';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/observation', $data);
        $this->load->view('template/foot');
    }
    public function subordinate(){
        $karId = $this->uri->segment('3');
        $employeeId = $this->uri->segment('4');

        $data['title'] = 'Subordinate Details';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['subordinate'] = $this->udel->getSubordinateById($karId);
        $data['direct'] = $this->udel->getDirect($karId);
        $data['competences'] = $this->udel->getCompetencyById($employeeId)->result_array();
        $data['competenceCount'] = $this->udel->getCompetencyById($employeeId)->num_rows();
        $data['subticketCount'] = $this->udel->getTicketBySubordinate($karId)->num_rows();
        

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/subordinateDetail', $data);
        $this->load->view('template/foot');
    }
    public function relation(){
        $data['title'] = 'Relations';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['relations'] = $this->udel->getRelation();

        $this->load->view('template/head', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('page/relation', $data);
        $this->load->view('template/foot');
    }


    
    
}   