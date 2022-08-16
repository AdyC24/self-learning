<?php
class User_Model extends CI_MODEL{

    function __construct(){
        parent::__construct();
    }

    // [Auth/login]
    public function getUser($nik){
        $db1 = $this->load->database('db2', TRUE);

        $db1->from('karyawan');
        $db1->where('KAR_NIK', $nik);
        return $db1->get()->row_array();
    }
}