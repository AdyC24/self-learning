<?php
class Main_Model extends CI_MODEL{

    function __construct(){
        parent::__construct();
    }

    function getDetail(){
        return $this->db->query("SELECT `DVD_SCORE` FROM `bv_detail` WHERE `DVD_BV` = 63 AND `DVD_KOMP` = 1")->result();
    }

    public function view(){
        return $this->db->get('bvalue')->result();
    }

    

    public function relation(){

        $this->db->from('bumalati_sld.relasi as r');
        $this->db->join('bumalati_sld.karyawan as k','r.KAR_ATASAN = k.KAR_ID','LEFT');
        $this->db->where('KAR_BAWAHAN', 13);
        // $db1 = $this->load->database('db2', TRUE);
        // $db1->from('relasi as t');
		// $db1->join('karyawan as i','t.KAR_ATASAN = i.KAR_ID','LEFT');
        // $db1->where('KAR_BAWAHAN', $id);

        $result = $this->db->get();
        return $result;
    }

    public function getSelect($table,$col,$d1=null,$d2=null){

        if($table == 'logHariIni'){
            $this->db->get('log');
            $this->db->where('LOG_DATE BETWEEN "'.date('Y-m-d 00:00:00').'" AND "'.date('Y-m-d H:i:s').'"');
        }else if($table == 'logKemarin'){
            $now = date('d')-1;
            $ago = date('Y-m-'.$now.' 00:00:00');
            $agos = date('Y-m-'.$now.' 23:59:00');
            $this->db->get('log');
            $this->db->where('LOG_DATE BETWEEN "'.$ago.'" AND "'.$agos.'"');
        }else if($table == 'logs'){
            $this->db->get('log');
            $this->db->where('LOG_DATE BETWEEN "'.$d1.'" AND "'.$d2.'"');
        }else
        {$this->db->get($table);} 
        $this->db->order_by($col,"asc");

        $qry = $this->db->result();
        return $qry;
    }  
}