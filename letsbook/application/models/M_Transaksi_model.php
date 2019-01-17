<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Transaksi_model extends CI_Model {

    /*
        Tampil Data Aktif Event Berdasarkan Pelanggan || Tiketku
    */
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

    /*
        Tampil Data Transaksi Refund Event Berdasarkan Pelanggan || Refund
    */
    public function getRefundTransaksi($id_pelanggan)
    {
        $DataTransaksi=[];
        $this->db->select('*');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_event e','t.id_event=e.id_event');
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

    /*
        Tampil Data All Transaksi || History Pelanggan
    */
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

    /*
        Tampil Data Detail Transaksi 
    */
    public function getDetailTransaksi($transaksi)
    {
        $DataTransaksi=[];
        $this->db->select('t.id_transaksi, t.jumlah_tiket, t.status_tiket, t.waktu_transaksi,
                            e.nama_event, e.tanggal_event, e.jam_event, e.lokasi, e.link_lokasi,e.biaya_pelayanan');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_event e','t.id_event=e.id_event');
        $this->db->where('t.id_transaksi',$transaksi['id_transaksi']);
        $DataTransaksi=$this->db->get('')->result_array();
        return $DataTransaksi;
    }

    public function insertTransaksi($DataTransaksi)
    {
        $this->db->set('status_tiket','aktif');
        $this->db->set('waktu_transaksi','NOW()',false);
        $this->db->insert('tbl_transaksi',$DataTransaksi);
    }

    public function refund($DataTransaksi)
    {
        $this->db->where('id_transaksi',$DataTransaksi['id_transaksi']);
        $this->db->update('tbl_transaksi',$DataTransaksi);
        
        
    }
}