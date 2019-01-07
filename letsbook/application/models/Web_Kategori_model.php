<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Kategori_model extends CI_Model {

    public $id_kategori='id_kategori';
    public $table = 'tbl_kategori';

    function insert($data){
        $this->db->insert($this->table, $data);
    }
    function updateKategori($id_kategori,$data){
		$this->db->where($this->id_kategori, $id_kategori);
        $this->db->update($this->table, $data);
    }
    function get_by_id($id_kategori){
        $this->db->select('*');
		$this->db->from('tbl_kategori');
		$this->db->where('id_kategori',$id_kategori);
		$data = $this->db->get('')->row();
		return $data;
    }
    public function getcountKategori(){
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $data=$this->db->count_all_results('');
        return $data;
    }
    public function getListKategori($offset,$from){
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('nama_kategori','asc');
        $this->db->limit($offset,$from);
        $query=$this->db->get('');
        return $query->result();
    }
    function CMBKategori(){
        $this->db->order_by('nama_kategori','asc');
        $kategori=$this->db->get('tbl_kategori');
        return $kategori->result();
    }
}