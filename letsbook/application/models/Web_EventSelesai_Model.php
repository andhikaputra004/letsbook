<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_EventSelesai_Model extends CI_Model {

    public $id_event='id_event';
    public $table = 'tbl_event';

    public function getCountEvent()
    {
        $this->db->select('*');
        $this->db->from('tbl_event');
        $this->db->where('status_event','selesai');
        $countEvent=$this->db->count_all_results('');
        return $countEvent;
    }
    function updateEvent($id_event,$DataEvent)
	{
		$this->db->where($this->id_event, $id_event);
        $this->db->update($this->table, $DataEvent);
    }
    public function getListEvent($number,$offset)
    {
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->where('e.status_event','selesai');
        $this->db->order_by('e.status_pembayaran','asc');
        $this->db->limit($number,$offset);
        $query=$this->db->get('');
        return $query->result();
    }
    public function getEventById($id_event){
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->where('e.id_event',$id_event);
        $event=$this->db->get('')->row_array();
        return $event;
    }
    public function getCountSearchEventSelesai($keyword){
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->like('e.nama_event',$keyword);
        $this->db->or_like('p.nama_organisasi',$keyword);
        $this->db->or_like('e.status_pembayaran',$keyword);
        $this->db->where('e.status_event','selesai');
        $this->db->order_by('e.status_pembayaran','asc');
        $countPenyelenggara=$this->db->count_all_results('');
        return $countPenyelenggara;
    }
    public function getListSearchEventSelesai($keyword,$number,$offset){
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->like('e.nama_event' ,$keyword);
        $this->db->or_like('p.nama_organisasi',$keyword);
        $this->db->or_like('e.status_pembayaran',$keyword);
        $this->db->where('e.status_event','selesai');
        $this->db->order_by('e.status_pembayaran','asc');
        $this->db->limit($number,$offset);
        $query=$this->db->get('');
        return $query->result();
    }
    function get_by_id($id_event)
    {
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
		$this->db->where('e.id_event',$id_event);
		$data = $this->db->get('')->row();
		return $data;
    }
}