<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Pelanggan_model extends CI_Model {

    public function getDataPelanggan($DataLogin)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where('email',$DataLogin['email']);
        $this->db->where('kata_sandi',$DataLogin['kata_sandi']);
        $this->db->where('status','aktif');
        $DataPelanggan=$this->db->get('')->row_array();
        $num_rows=$this->db->count_all_results('');
        if($num_rows==0)
        {
        return NULL;
        }
        else
        return $DataPelanggan;
    }
    
    public function cekEmail($email)
    {
        $this->db->select('*');
        $this->db->from('tbl_pelanggan');
        $this->db->where('email',$email);
        $num_rows=$this->db->count_all_results('');
        if($num_rows==0)
        {
        return true;
        }
        else {
        return false;
        }
    }

    function insertPelanggan($DataPelanggan)
    {
        $this->db->set('status','aktif');
        $this->db->set('role','pelanggan');
        $this->db->insert('tbl_pelanggan',$DataPelanggan);
    }

    public function updatePelanggan($data)
    {
        $this->db->where('id_pelanggan',$data['id_pelanggan']);
        $this->db->update('tbl_pelanggan',$data);
    }

}