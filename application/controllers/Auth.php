<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
    }
    // recall saat user baru buka site
    public function index(){
        if($this->session->userdata('authenticated')){
            redirect('home');
        } else {
            $this->load->view('login');
        }
    }
    // recall saat user sudah mengisi form login
    public function login(){
        $emp = $this->input->post('NIK');
        $pass = md5($this->input->post('PASSWORD'));
        $user = $this->udel->getUser($emp);
        // BUAT PENGKONDISIAN JIKA USER BELUM ISI FORM (BISA PAKE AJAX DI FORM ATAU FLASHDATA)
        if($pass == $user->KAR_PASSWORD){
            $session = array(
                'authenticated' => true
            );
            
        }
    }
}