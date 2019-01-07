<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Transaksi_model extends CI_Model {

    public function getAktifTransaksi($id_pelanggan)
    {
        $DataTransaksi=[];
        $this->db->select('*');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_event e','t.id_event=e.id_event');
        $this->db->where('status_tiket',"aktif") ;
        $this->db->where('id_pelanggan',$id_pelanggan['id_pelanggan']);
        $this->db->order_by ('e.tanggal_event','asc');
        $DataTransaksi=$this->db->get('')->result_array();
        $num_rows=$this->db->count_all_results('');
        if($num_rows==0)
        {
        return NULL;
        }
        else
        return $DataTransaksi;
    }

    public function getAllTransaksi($id_pelanggan)
    {
        $DataTransaksi=[];
        $this->db->select('*');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_event e','t.id_event=e.id_event');
        $this->db->where('id_pelanggan',$id_pelanggan['id_pelanggan']);
        $this->db->order_by ('waktu_transaksi','desc');
        $DataTransaksi=$this->db->get('')->result_array();
        $num_rows=$this->db->count_all_results('');
        if($num_rows==0)
        {
        return NULL;
        }
        else
        return $DataTransaksi;
    }

    
}