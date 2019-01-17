<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Event_model extends CI_Model {

    /*
        Tampil Data Detail Event 
    */
    public function getDetailEvent($event)
    {
        $DataEvent=[];
        $this->db->select('e.id_event, e.nama_event, k.nama_kategori, a.nama_organisasi, e.tanggal_event, 
                            e.jam_event, e.harga_tiket, e.quota_peserta, e.tiket_terjual, e.lokasi, 
                            e.link_lokasi, e.kontak_informasi, e.keterangan_event, e.gambar_poster,e.deskripsi');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_kategori k','e.id_kategori=k.id_kategori');
        $this->db->join('tbl_penyelenggara a','a.id_penyelenggara=e.id_penyelenggara');
        $this->db->where('e.id_event',$event['id_event']);
        $DataEvent=$this->db->get('')->result_array();
        return $DataEvent;
    }


    /*
        Tampil Data Berdasarkan Tanggal Event || Home Pelanggan
    */
    public function getAllEventbyTime()
    {
        $DataEvent=[];
        $this->db->select('e.id_event, e.nama_event, k.nama_kategori, a.nama_organisasi, e.tanggal_event, e.biaya_pelayanan,
                            e.jam_event, e.harga_tiket, e.quota_peserta, e.tiket_terjual, e.lokasi, 
                            e.link_lokasi, e.kontak_informasi, e.keterangan_event, e.gambar_poster,a.nama_organisasi,');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_kategori k','e.id_kategori=k.id_kategori');
        $this->db->join('tbl_penyelenggara a','a.id_penyelenggara=e.id_penyelenggara');
        $this->db->where('status_event',"aktif");
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
        Tampil Data semua Event Berdasarkan Penyelenggara // Home Penyelenggara
    */
    public function getAllEvent($id_penyelenggara)
    {
        $DataEvent=[];
        $this->db->select('*');
        $this->db->from('tbl_event e');
        $this->db->join('tbl_kategori k','e.id_kategori=k.id_kategori');
        //$this->db->where('e.status_event',"selesai");
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
        $this->db->where('e.status_event',"aktif");
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