<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Penyelenggara_model extends CI_Model {

    /*
        get data untuk login 
    */
    public function getDataPenyelenggara($DataLogin)
    {
        $this->db->select('*');
        $this->db->from('tbl_penyelenggara');
        $this->db->where('email',$DataLogin['email']);
        $this->db->where('kata_sandi',$DataLogin['kata_sandi']);
        $this->db->where('status','AKTIF');
        $DataPenyelenggara=$this->db->get('')->row_array();
        $num_rows=$this->db->count_all_results('');
        if($num_rows==0)
        {
        return NULL;
        }
        else
        return $DataPenyelenggara;
    }

     /*
        get data untuk menaempilkan Data Penyelenggara 
    */
    public function getAllDataPenyelenggara($id_penyelenggara)
    {
        $this->db->select('*');
        $this->db->from('tbl_penyelenggara');
        $this->db->where('id_penyelenggara',$id_penyelenggara['id_penyelenggara']);
        $DataEvent=$this->db->get('')->result_array();
        $num_rows=$this->db->count_all_results('');
        if($num_rows==0)
        {
        return NULL;
        }
        else
        return $DataEvent;
    }
}