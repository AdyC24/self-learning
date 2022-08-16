<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'udel');
        $this->load->library('form_validation');
    }
    // recall saat user baru buka site
    public function index(){
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run() == false){
            $this->load->view('login');
        } else {
            $this->_login();
        }
    }
    private function _login(){
        $emp = $this->input->post('nik');
        $pass = md5($this->input->post('password'));
        $user = $this->udel->getUser($emp);
        
        if(empty($user)){
            $this->session->set_flashdata('message', 'NIK tidak ditemukan'); 
            redirect('Auth');
        }else{
            if(password_verify($pass, $user['KAR_PASSWORD'])){
                $session = [
                    'nik' => $user['KAR_NIK'],
                    'name' => $user['KAR_NAME'],
                    'email' => $user['KAR_EMAIL'],
                    'photo' => $user['KAR_PHOTE'],
                    'role' => $user['KAR_ROLE'],
                    'phone' => $user['KAR_HP']
                ];
                $this->session->set_userdata($session);
            } else {
                $this->session->set_flashdata('message', 'Password salah'); 
                redirect('Auth');
            }
        }           
    }

}