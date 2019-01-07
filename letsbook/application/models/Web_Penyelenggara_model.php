<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Penyelenggara_model extends CI_Model {

    public $id_penyelenggara='id_penyelenggara';
    public $table = 'tbl_penyelenggara';


    // insert data
    public function insertPenyelenggara($DataPenyelenggara)
    {
        $this->db->insert('tbl_penyelenggara',$DataPenyelenggara);
    }
    //update
    function updatePenyelenggara($id_penyelenggara,$DataPenyelenggara)
	{
		$this->db->where($this->id_penyelenggara, $id_penyelenggara);
        $this->db->update($this->table, $DataPenyelenggara);
    }
    
    function get_by_id($id_penyelenggara)
    {
        $this->db->select('*');
		$this->db->from('tbl_penyelenggara');
		$this->db->where('id_penyelenggara',$id_penyelenggara);
		$data = $this->db->get('')->row();
		return $data;
    }

    public function getcountPenyelenggara()
    {
        $this->db->select('*');
        $this->db->from('tbl_penyelenggara');
        $countPenyelenggara=$this->db->count_all_results('');
        return $countPenyelenggara;
    }

    public function getListPenyelenggara($offset,$from)
    {
        $this->db->select('*');
        $this->db->from('tbl_penyelenggara');
        $this->db->order_by('id_penyelenggara','desc');
        $this->db->limit($offset,$from);
        $query=$this->db->get('');
        return $query->result();
    }

    public function getCountSearchPenyelenggara($keyword)
    {
        $this->db->select('*');
        $this->db->from('tbl_penyelenggara');
        $this->db->like('nama_organisasi',$keyword);
        $this->db->or_like('status',$keyword);
        $this->db->order_by('id_penyelenggara','desc');
        $countPenyelenggara=$this->db->count_all_results('');
        return $countPenyelenggara;
    }
    public function getListSearchPenyelenggara($keyword,$number,$offset)
    {
        $this->db->select('*');
        $this->db->from('tbl_penyelenggara');
        $this->db->like('nama_organisasi',$keyword);
        $this->db->or_like('status',$keyword);
        $this->db->order_by('id_penyelenggara','desc');
        $this->db->limit($number,$offset);
        $query=$this->db->get('');
        return $query->result();
    }
    public function getPenyelenggaraById($id_penyelenggara){
        $this->db->select('*');
        $this->db->from('tbl_penyelenggara');
        $this->db->where('id_penyelenggara',$id_penyelenggara);
        $penyelenggara=$this->db->get('')->row_array();
        return $penyelenggara;
    }
    function CMBpenyelenggara(){
        $this->db->order_by('nama_organisasi','asc');
        $penyelenggara=$this->db->get('tbl_penyelenggara');
        return $penyelenggara->result();
    }

}