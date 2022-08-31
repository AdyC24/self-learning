<?php
class User_Model extends CI_MODEL{

    function __construct(){
        parent::__construct();
    }

// DISPLAY DATA
    public function getUser($nik){
        $db1 = $this->load->database('db2', TRUE);

        $db1->from('karyawan as k');
        $db1->join('jabatan as j','k.JAB_ID = j.JAB_ID','LEFT');
        $db1->join('code_sld as c','k.CODE_ID = c.CODE_ID','LEFT');
        $db1->join('section as s','s.SEC_ID = s.SEC_ID','LEFT');
        $db1->where('KAR_NIK', $nik);
        return $db1->get()->row_array();
    }
    public function getPIC(){
        $db1 = $this->load->database('db2', TRUE);
        $db1->where('KAR_PIC', 'Ya');   
        return $db1->get('karyawan')->result_array();
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
        $db1->join('jabatan as j', 'k.JAB_ID = j.JAB_ID', 'LEFT');
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
        if ($val != '') {
            $this->db->from('movie as m');
            $this->db->join('competence as c', 'm.competenceId = c.competenceId', 'LEFT');
            $this->db->like('movieName', $val);
            $this->db->or_like('competenceName', $val);
            return $this->db->get()->result_array();
        }
    }
    public function getCompetences(){
        return $this->db->get('competence')->result_array();
    }
    public function getTheaters(){
        $this->db->from('theater as t');
        $this->db->join('movie as m','t.movieId = m.movieId','LEFT');
        $this->db->join('bumalati_sld.karyawan as k','t.theaterPIC = k.KAR_ID','LEFT');
        $this->db->join('competence as c','m.competenceId = c.competenceId','LEFT');
        return $this->db->get()->result_array();
    }
    public function getTheater($movieId){
        $this->db->from('theater as t');
        $this->db->join('bumalati_sld.karyawan as k', 't.theaterPIC = k.KAR_ID', 'LEFT');
        $this->db->where('movieId', $movieId);
        $this->db->order_by('theaterTime', 'ASC');
        return $this->db->get()->result_array();
    }
    public function getTicket($id){
        $this->db->from('ticket as t');
        $this->db->join('bumalati_sld.karyawan as k', 't.employeeId = k.KAR_ID', 'LEFT');
        $this->db->join('bumalati_sld.relasi as r','r.KAR_BAWAHAN = k.KAR_ID', 'LEFT');
        $this->db->join('theater as h','t.theaterId = h.theaterId', 'LEFT');
        $this->db->join('movie as m', 'h.movieId = m.movieId', 'LEFT');
        $this->db->join('competence as c', 'm.competenceId = c.competenceId', 'LEFT');
        $this->db->where('KAR_ATASAN', $id);
        $this->db->order_by('ticketId', 'DESC');
        return $this->db->get()->result_array();
    }
    public function getTicketBySubordinate($id){
        $this->db->from('ticket as t');
        $this->db->join('bumalati_sld.karyawan as k', 't.employeeId = k.KAR_ID', 'LEFT');
        $this->db->join('theater as h','t.theaterId = h.theaterId', 'LEFT');
        $this->db->join('movie as m', 'h.movieId = m.movieId', 'LEFT');
        $this->db->join('competence as c', 'm.competenceId = c.competenceId', 'LEFT');
        $this->db->where('employeeId', $id);
        return $this->db->get()->result_array();
    }
    public function getGenre(){
        return $this->db->get('genre')->result_array();
    }
    public function checkTicket($theaterId, $employeeId){
        $this->db->where('theaterId', $theaterId);
        $this->db->where('employeeId', $employeeId);
        return $this->db->get('ticket')->num_rows();
    }
    public function countTicket($theaterId){
        $this->db->where('theaterId', $theaterId);
        return $this->db->get('ticket')->num_rows();
    }
    public function getTicketbyId($theaterId){
        $this->db->from('ticket as t');
        $this->db->join('bumalati_sld.karyawan as k', 't.employeeId = k.KAR_ID', 'LEFT');
        $this->db->join('bumalati_sld.jabatan as j', 'k.JAB_ID = j.JAB_ID', 'LEFT');
        $this->db->join('bumalati_sld.code_sld as c', 'c.CODE_ID = k.CODE_ID', 'LEFT');
        $this->db->join('bumalati_sld.section as s', 's.SEC_ID = c.SEC_ID', 'LEFT');
        $this->db->where('theaterId', $theaterId);
        return $this->db->get()->result_array();
    }
   


// CRUD DATA

    public function updateTheater($table, $data, $where){
        $this->db->where('theaterId', $where);
        $this->db->update($table, $data);
    }
    public function updateMovieActivation($table, $data, $where){
        $this->db->where('movieId', $where);
        $this->db->update($table, $data);
    }
    public function updateCountTicket($table, $data, $where){
        $this->db->where('theaterId', $where);
        $this->db->update($table, $data);
    }
    public function updateTicketStatus($table, $data, $where){
        $this->db->where('ticketId', $where);
        $this->db->update($table, $data);
    }
    public function insert($table, $data){
        $this->db->insert($table, $data);
    }
    public function delete($table, $where){
        $this->db->where('theaterId', $where);
        $this->db->delete($table);
    }
    public function deleteTicket($table, $where){
        $this->db->where('ticketId', $where);
        $this->db->delete($table);
    }
}