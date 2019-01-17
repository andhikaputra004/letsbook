<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Event_model extends CI_Model {

    public $id_event='id_event';
    public $table = 'tbl_event';
    // insert data
    public function insertEvent($DataEvent){
        $this->db->insert('tbl_event',$DataEvent);
    }
    //update          
    function updateEvent($id_event,$DataEvent)
    { 
		$this->db->where($this->id_event, $id_event);
        $this->db->update($this->table, $DataEvent);
    }
    function get_by_id($id_event){
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->join('tbl_kategori k', 'e.id_kategori=k.id_kategori');
		$this->db->where('e.id_event',$id_event);
		$data = $this->db->get('')->row();
		return $data;
    }
    public function getCountEvent(){
        $this->db->select('*');
        $this->db->from('tbl_event');
        $countEvent=$this->db->count_all_results('');
        return $countEvent;
    }
    public function getListEvent($number,$offset){
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->join('tbl_kategori k', 'e.id_kategori=k.id_kategori');
        // $this->db->where('e.status_event','aktif');
        $this->db->order_by('e.id_event','desc');
        $this->db->limit($number,$offset);
        $query=$this->db->get('');
        return $query->result();
    }
    public function getEventById($id_event){
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->join('tbl_kategori k', 'e.id_kategori=k.id_kategori');
        $this->db->where('e.id_event',$id_event);
        $event=$this->db->get('')->row_array();
        return $event;
    }
    public function getCountSearchEvent($keyword){
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->like('e.status_event',$keyword);
        $this->db->or_like('e.nama_event',$keyword);
        $this->db->or_like('e.tanggal_event',$keyword);
        $this->db->or_like('p.nama_organisasi',$keyword);
        $this->db->order_by('e.tanggal_event','asc');
        $countPenyelenggara=$this->db->count_all_results('');
        return $countPenyelenggara;
    }
    public function getListSearchEvent($keyword,$number,$offset){
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->like('p.nama_organisasi',$keyword);
        $this->db->or_like('e.nama_event',$keyword);
        $this->db->or_like('e.tanggal_event',$keyword);
        $this->db->or_like('e.status_event',$keyword);
        $this->db->order_by('e.tanggal_event','asc');
        $this->db->limit($number,$offset);
        $query=$this->db->get('');
        return $query->result();
    }
}