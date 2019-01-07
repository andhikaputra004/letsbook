<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Transaksi_model extends CI_Model {

    public function getcountTransaksi(){
        $this->db->select(
            't.id_transaksi, 
            t.id_pelanggan, 
            k.nama_pelanggan,
            t.id_event,
            t.total_tagihan, 
            t.status_tiket, 
            t.jumlah_tiket, 
            t.waktu_transaksi,
            e.nama_event,
            e.status_event,
            e.izin_refund,
            e.gambar_poster,
            e.harga_tiket,
            e.biaya_pelayanan,
            e.id_penyelenggara,
            p.nama_organisasi,
            ');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_pelanggan k', 't.id_pelanggan=k.id_pelanggan');
        $this->db->join('tbl_event e', 't.id_event=e.id_event');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->order_by('t.status_tiket','asc');
        $countTransaksi=$this->db->count_all_results('');
        return $countTransaksi;
    }

    public function getListTransaksi($offset,$from){
        $this->db->select(
            't.id_transaksi, 
            t.id_pelanggan, 
            k.nama_pelanggan,
            t.id_event,
            t.total_tagihan, 
            t.status_tiket, 
            t.jumlah_tiket, 
            t.waktu_transaksi,
            e.nama_event,
            e.status_event,
            e.izin_refund,
            e.tanggal_event,
            e.harga_tiket,
            e.gambar_poster,
            e.biaya_pelayanan,
            e.id_penyelenggara,
            p.nama_organisasi,
            ');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_pelanggan k', 't.id_pelanggan=k.id_pelanggan');
        $this->db->join('tbl_event e', 't.id_event=e.id_event');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->order_by('waktu_transaksi','desc');
        $this->db->limit($offset,$from);
        $query=$this->db->get('');
        return $query->result();
    }

    public function getTransaksiById($id_transaksi){
        $this->db->select('t.id_transaksi,t.id_pelanggan,t.id_event,t.total_tagihan,t.status_tiket,t.jumlah_tiket,t.waktu_transaksi,
            e.nama_event,e.status_event, e.tanggal_event,e.lokasi,e.link_lokasi,e.izin_refund,e.harga_tiket,e.gambar_poster,e.biaya_pelayanan,e.id_penyelenggara,
            p.nama_organisasi,k.nama_pelanggan,k.foto_profile
            ');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_pelanggan k', 't.id_pelanggan=k.id_pelanggan');
        $this->db->join('tbl_event e','t.id_event=e.id_event');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->order_by('t.status_tiket','asc');
        $this->db->where('id_transaksi',$id_transaksi);
        $transaksi=$this->db->get('')->row_array();
        return $transaksi;
    }
    public function getCountSearchTransaksi($keyword){
        $this->db->select('*');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_pelanggan k', 't.id_pelanggan=k.id_pelanggan');
        $this->db->join('tbl_event e','t.id_event=e.id_event');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->like('k.nama_pelanggan',$keyword);
        $this->db->or_like('e.nama_event',$keyword);
        $this->db->or_like('p.nama_organisasi',$keyword);
        $this->db->order_by('t.status_tiket','asc');
        $countPenyelenggara=$this->db->count_all_results('');
        return $countPenyelenggara;
    }
    public function getListSearchTransaksi($keyword,$number,$offset){
        $this->db->select('*');
        $this->db->from('tbl_transaksi t');
        $this->db->join('tbl_pelanggan k', 't.id_pelanggan=k.id_pelanggan');
        $this->db->join('tbl_event e','t.id_event=e.id_event');
        $this->db->join('tbl_penyelenggara p', 'e.id_penyelenggara=p.id_penyelenggara');
        $this->db->like('k.nama_pelanggan',$keyword);
        $this->db->or_like('e.nama_event',$keyword);
        $this->db->or_like('p.nama_organisasi',$keyword);
        $this->db->order_by('t.status_tiket','asc');
        $this->db->limit($number,$offset);
        $query=$this->db->get('');
        return $query->result();
    }
}