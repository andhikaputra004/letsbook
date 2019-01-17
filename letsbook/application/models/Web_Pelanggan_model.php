<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Pelanggan_model extends CI_Model {

    public function getCountPelanggan(){
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $countKatering=$this->db->count_all_results('');
        return $countKatering;
    }
    public function getListPelanggan($number,$offset){
      $this->db->select('*');
      $this->db->from('tbl_pelanggan');
      $this->db->order_by('id_pelanggan','desc');
      $this->db->limit($number,$offset);
      $query=$this->db->get('');
      return $query->result();
    }
    public function getPelangganById($id_pelanggan){
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where('id_pelanggan',$id_pelanggan);
        $pelanggan=$this->db->get('')->row_array();
        return $pelanggan;
    }
    function get_by_id($id_pelanggan){
        $this->db->select('*');
		$this->db->from('tbl_pelanggan');
		$this->db->where('id_pelanggan',$id_pelanggan);
		$data = $this->db->get('')->row();
		return $data;
    }
    public function getCountSearchPelanggan($keyword){
        $this->db->select('*');
		$this->db->from('tbl_pelanggan');
        $this->db->like('nama_pelanggan',$keyword);
        $this->db->or_like('status',$keyword);
        $this->db->order_by('status','asc');
        $countPenyelenggara=$this->db->count_all_results('');
        return $countPenyelenggara;
    }
    public function getListSearchPelanggan($keyword,$number,$offset){
        $this->db->select('*');
		$this->db->from('tbl_pelanggan');
        $this->db->like('nama_pelanggan',$keyword);
        $this->db->or_like('status',$keyword);
        $this->db->order_by('status','asc');
        $this->db->limit($number,$offset);
        $query=$this->db->get('');
        return $query->result();
    }

    function updatePelanggan($data)
    { 
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
        $this->db->update('tbl_pelanggan', $data);
    }
}