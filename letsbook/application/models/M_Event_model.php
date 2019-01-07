<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Event_model extends CI_Model {

    

    /*
        Tampil Data Berdasarkan Tanggal Event
    */
    public function getAllEventbyTime()
    {
        $DataEvent=[];
        $this->db->select('*');
        $this->db->from('tbl_event');
        $this->db->where('status_event',"1");
        $this->db->order_by ('tanggal_event','asc');
        $DataEvent=$this->db->get('')->result_array();
        return $DataEvent;
    }

    /*
        Tampil Data Berdasarkan Kategori Event
    */
    public function getAllEventbyKategori($kategori)
    {
        $DataEvent=[];
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_kategori k','e.id_kategori=k.id_kategori');
        $this->db->join('tbl_penyelenggara a','a.id_penyelenggara=e.id_penyelenggara');
        $this->db->where('e.status_event',"aktif");       
        $this->db->where('e.id_kategori',$kategori['id_kategori']);
        $this->db->order_by ('e.tanggal_event','asc');
        $DataEvent=$this->db->get('')->result_array();
        $num_rows=$this->db->count_all_results('');
        if($num_rows==0)
        {
        return NULL;
        }
        else
        return $DataEvent;
    }
    
    /*
        Tampil Data semua Event Berdasarkan Penyelenggara // history
    */
    public function getAllEvent($id_penyelenggara)
    {
        $DataEvent=[];
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_kategori k','e.id_kategori=k.id_kategori');
        $this->db->where('e.status_event',"2");
        $this->db->where('e.id_penyelenggara',$id_penyelenggara['id_penyelenggara']);
        $this->db->order_by ('e.tanggal_event','desc');
        $DataEvent=$this->db->get('')->result_array();
        $num_rows=$this->db->count_all_results('');
        if($num_rows==0)
        {
        return NULL;
        }
        else
        return $DataEvent;
    }

    /*
        Tampil Data Aktif Event Berdasarkan Penyelenggara // soon
    */
    public function getAktifEvent($id_penyelenggara)
    {
        $DataEvent=[];
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_kategori k','e.id_kategori=k.id_kategori');
        $this->db->where('e.status_event',"1");
        $this->db->where('e.id_penyelenggara',$id_penyelenggara['id_penyelenggara']);
        $this->db->order_by ('e.tanggal_event','asc');
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