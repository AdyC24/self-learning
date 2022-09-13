<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
    }
    public function home(){
        
        $karId = $this->session->userdata('id');
        $employeeStatus = $this->session->userdata('status');
        $nik = $this->session->userdata('nik');
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
        $data['notifications'] = $this->udel->getNotification($karId);

        if ($nik == 'b001hr'){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/home', $data);
            $this->load->view('template/foot');
        } elseif ($employeeStatus != 'Ya'){
            $this->session->set_flashdata('message', 'SLD Anda belum AKTIF, silahkan hubungi HR untuk mengaktifkan'); 
            redirect('Auth');
        } elseif ($karId == ''){
            $this->session->set_flashdata('message', 'Sesi Anda berakhir, silahkan login kembali jika ingin melanjutkan'); 
            redirect('Auth');
        } else {
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/home', $data);
            $this->load->view('template/foot');
        }
       
        
    }
    public function movie(){
        $karId = $this->session->userdata('id');
        $employeeId = $this->uri->segment('3');

        $data['title'] = 'Movies';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();
        $data['moviesById'] = $this->udel->getMoviesById($employeeId);
        $data['competences'] = $this->udel->getCompetences();
        $data['genres'] = $this->udel->getGenre();
        $data['notifications'] = $this->udel->getNotification($karId);

        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/movie', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function movieDetail(){
        $karId = $this->session->userdata('id');
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
        $data['notifications'] = $this->udel->getNotification($karId);
       
        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/movieDetail', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function theater(){
        $karId = $this->session->userdata('id');
        $theaterActive = 'Ya';

        $data['title'] = 'Theaters';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();
        $data['PICs'] = $this->udel->getPIC();
        $data['theaters'] = $this->udel->getTheatersByStatus($theaterActive);
        $data['notifications'] = $this->udel->getNotification($karId);
        
        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/theater', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function theatersArchive(){
        $karId = $this->session->userdata('id');
        $theaterActive = 'Tidak';

        $data['title'] = 'Archive';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();
        $data['PICs'] = $this->udel->getPIC();
        $data['theaters'] = $this->udel->getTheatersByStatus($theaterActive);
        $data['notifications'] = $this->udel->getNotification($karId);
        
        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/theatersArchive', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function ticket(){
        $karId = $this->session->userdata('id');
        $id = $this->session->userdata('id');

        $data['title'] = 'Tickets';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['tickets'] = $this->udel->getTicket($id);
        $data['subtickets'] = $this->udel->getTicketBySubordinate($id)->result_array();
        $data['notifications'] = $this->udel->getNotification($karId);

        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/tickets', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function subordinates(){
        $karId = $this->session->userdata('id');
        $id = $this->session->userdata('id');

        $data['title'] = 'Subordinates';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['subordinates'] = $this->udel->getSubordinate($id);
        $data['notifications'] = $this->udel->getNotification($karId);

        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/subordinates', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function competences(){
        $karId = $this->session->userdata('id');
        $data['title'] = 'Competences';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['competences'] = $this->udel->getCompetences();
        $data['notifications'] = $this->udel->getNotification($karId);

        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/competences', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function absence(){
        $karId = $this->session->userdata('id');
        $theaterActive = 'Ya';

        $data['title'] = 'Absence';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['movies'] = $this->udel->getMovies();
        $data['PICs'] = $this->udel->getPIC();
        $data['theaters'] = $this->udel->getTheatersByStatus($theaterActive);
        $data['notifications'] = $this->udel->getNotification($karId);
        
        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/absense', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function absenceDetail(){
        $karId = $this->session->userdata('id');
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
        $data['notifications'] = $this->udel->getNotification($karId);
        
        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/absenceDetail', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function employee(){
        $karId = $this->session->userdata('id');

        $data['title'] = 'Employees';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['employees'] = $this->udel->getEmployee();
        $data['notifications'] = $this->udel->getNotification($karId);

        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/employees', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function observation(){
        $karId = $this->session->userdata('id');

        $data['title'] = 'Observation';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['notifications'] = $this->udel->getNotification($karId);

        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/observation', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }
    public function subordinate(){
        $karId = $this->session->userdata('id');
        $kar_Id = $this->uri->segment('3');
        $employeeId = $this->uri->segment('4');

        $data['title'] = 'Subordinate Details';
        $data['name'] = $this->session->userdata('name');
        $data['position'] = $this->session->userdata('position');
        $data['role'] = $this->session->userdata('role');
        $data['subordinate'] = $this->udel->getSubordinateById($kar_Id);
        $data['direct'] = $this->udel->getDirect($kar_Id);
        $data['competences'] = $this->udel->getCompetencyById($employeeId)->result_array();
        $data['competenceCount'] = $this->udel->getCompetencyById($employeeId)->num_rows();
        $data['subticketCount'] = $this->udel->getTicketBySubordinate($kar_Id)->num_rows();
        $data['notifications'] = $this->udel->getNotification($karId);
        
        if($karId != ''){
            $this->load->view('template/head', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('page/subordinateDetail', $data);
            $this->load->view('template/foot');
        } else {
            redirect('Auth');
        }
    }



    
    
}   