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
            if($pass == $user['KAR_PASSWORD']){
                $direct = $this->udel->getDirect($user['KAR_ID']);

                if($direct){
                    $dirName = $direct['KAR_NAME'];
                    $dirNik = $direct['KAR_NIK'];
                } else {
                    $dirName = 'No Direct Assigned';
                    $dirNik = '-';
                }
                $session = [
                    'id' => $user['KAR_ID'],
                    'nik' => $user['KAR_NIK'],
                    'name' => $user['KAR_NAME'],
                    'email' => $user['KAR_EMAIL'],
                    'photo' => $user['KAR_PHOTO'],
                    'role' => $user['KAR_ROLE'],
                    'phone' => $user['KAR_HP'],
                    'position' => $user['JAB_NAME'],
                    'section' => $user['SEC_NAME'],
                    'status' => $user['employeeStatus'],
                    'direct_name' => $dirName,
                    'direct_nik' => $dirNik
                ];
                $this->session->set_userdata($session);
                redirect('home');
            } else {
                $this->session->set_flashdata('message', 'Password salah'); 
                redirect('Auth');
            }
        }           
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Auth');
    }

}