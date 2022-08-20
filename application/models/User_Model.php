<?php
class User_Model extends CI_MODEL{

    function __construct(){
        parent::__construct();
    }

    // [Auth/login]
    public function getUser($nik){
        $db1 = $this->load->database('db2', TRUE);

        $db1->from('karyawan as k');
        $db1->join('jabatan as j','k.JAB_ID = j.JAB_ID','LEFT');
        $db1->join('code_sld as c','k.CODE_ID = c.CODE_ID','LEFT');
        $db1->join('section as s','s.SEC_ID = s.SEC_ID','LEFT');
        $db1->where('KAR_NIK', $nik);
        return $db1->get()->row_array();
    }
    public function getDirect($id){
        $db1 = $this->load->database('db2', TRUE);

        $db1->from('relasi as r');
		$db1->join('karyawan as k','r.KAR_ATASAN = k.KAR_ID','LEFT');
        $db1->where('KAR_BAWAHAN', $id);
        return $db1->get()->row_array();
    }
    public function getSubordinate($id){
        $db1 = $this->load->database('db2', TRUE);

        $db1->from('relasi as r');
        $db1->join('karyawan as k', 'r.KAR_BAWAHAN = k.KAR_ID', 'LEFT');
        $db1->where('KAR_ATASAN', $id);
        return $db1->get()->result_array();
    }
    public function getMovies(){
        $this->db->from('movie as m');
        $this->db->join('competence as c', 'm.competenceId = c.competenceId', 'LEFT');
        return $this->db->get()->result_array();
    }
    public function getMovie($id){
        $this->db->from('movie as m');
        $this->db->join('competence as c', 'm.competenceId = c.competenceId', 'LEFT');
        $this->db->join('genre as g', 'm.genreId = g.genreId', 'LEFT');
        $this->db->where('movieId', $id);
        return $this->db->get()->row_array();
    }
    public function getMoviesSearch($val){
        $this->db->from('movie as m');
        $this->db->join('competence as c', 'm.competenceId = c.competenceId', 'LEFT');
        $this->db->where('movieName', $val);
        return $this->db->get()->result_array();
    }
}