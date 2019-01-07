<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Event_Controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $models = array(
        'Web_Event_model' => 'Web_Event_model',
        'Web_Penyelenggara_model' => 'Web_Penyelenggara_model',
        'Web_Kategori_model' => 'Web_Kategori_model',
        );
        $this->load->model($models);
    }
    public function setEventView(){
        $countEvent=$this->Web_Event_model->getCountEvent();
        $config['base_url']=base_url().'index.php/Web_Event_controller/setEventView/';
        $config['total_rows'] = $countEvent;
        $config['per_page'] = 10;
        $page = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_event']=$this->Web_Event_model->getListEvent($config["per_page"],$page);
        $this->load->view('Event_View',$data);
    }
    public function getDetailEvent($id_event){
        $event=$this->Web_Event_model->getEventById($id_event);
        $this->load->view('Event_Detail_View',$event);
    }
    public function Tambah(){   
        $this->load->model('Web_Kategori_model');
        $data['all_Kategori'] = $this->Web_Kategori_model->CMBKategori();
    
        $this->load->model('Web_Penyelenggara_model');
        $data['all_penyelenggara'] = $this->Web_Penyelenggara_model->CMBpenyelenggara();

		$this->load->view('Event_Add_View',$data);
	}
    public function insert_event(){
        $this->load->library('upload');
        $this->_rules();
        $nmfile = "poster_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './images/event/poster/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['gambar_poster']['name'])        {
            if ($this->upload->do_upload('gambar_poster'))
            {
                $Set0="'0'";
                $setAktif="aktif";
                $setIzin="tidak";
                $setGambar="no_data_png";
                $status_pembayaran="hutang";
                $gbr = $this->upload->data();
                $DataEvent = array(
                    'gambar_poster' =>$gbr['file_name'],
                    'id_penyelenggara' => $this->input->post('id_penyelenggara',TRUE),//
                    'harga_tiket' => $this->input->post('harga_tiket',TRUE),
                    'biaya_pelayanan' => $this->input->post('biaya_pelayanan',TRUE),
                    'id_kategori' => $this->input->post('id_kategori',TRUE),//
                    'nama_event' => $this->input->post('nama_event',TRUE),//
                    'kontak_informasi' => $this->input->post('kontak_informasi',TRUE),
                    'quota_peserta' => $this->input->post('quota_peserta',TRUE),
                    'lokasi' => $this->input->post('lokasi',TRUE),//
                    'link_lokasi' => $this->input->post('link_lokasi',TRUE),//
                    'tanggal_event' => $this->input->post('tanggal_event',TRUE),//
                    'jam_event' => $this->input->post('jam_event',TRUE),//
                    'status_event' =>$setAktif,
                    'tiket_terjual' => $Set0,
                    'jumlah_tiket_refund' => $Set0,
                    'izin_refund' => $setIzin,
                    'gambar_izin' => $setGambar,
                    'bukti_bayar' => $setGambar,
                    'pendapantan' => $Set0,
                    'tagihan' => $Set0,
                    'status_pembayaran' => $status_pembayaran,
                    'keterangan_event' => $this->input->post('keterangan_event',TRUE),
                );
                $this->Web_Event_model->insertEvent($DataEvent);
				$this->session->set_flashdata('message', 'Tambah Data Event  Sukses');
                redirect(site_url('Web_Event_Controller/setEventView'));
            }
            echo"gagal";
        }
    }
    public function update_izin(){
        $this->load->library('upload');
        $nmfile = "izin_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './images/event/izin/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        // $config['max_size'] = '2048'; //maksimum besar file 2M
        // $config['max_width']  = '2000'; //lebar maksimum 1288 px
        // $config['max_height']  = '2000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['gambar_izin']['name'])
        {
            if ($this->upload->do_upload('gambar_izin'))
            {
                $gbr = $this->upload->data();
                $DataEvent = array(
                  'gambar_izin' =>$gbr['file_name'],
                );
                $this->Web_Event_model->updateEvent($this->input->post('id_event',TRUE), $DataEvent);
                redirect('event','refresh');
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata('message', 'Gagal upload foto');
                redirect('event','refresh');
            }
        }
    }
    public function update($id_event){
        
        $row = $this->Web_Event_model->get_by_id($id_event);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('event/update_event'),
                'id_event' => set_value('id_event', $row->id_event),
                'id_penyelenggara' => set_value('id_penyelenggara', $row->id_penyelenggara),
                'nama_organisasi' => set_value('nama_organisasi', $row->nama_organisasi),
        		'harga_tiket' => set_value('harga_tiket', $row->harga_tiket),
        		'biaya_pelayanan' => set_value('biaya_pelayanan', $row->biaya_pelayanan),
                'id_kategori' => set_value('id_kategori', $row->id_kategori),
                'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
        		'nama_event' => set_value('nama_event', $row->nama_event),
        		'kontak_informasi' => set_value('kontak_informasi', $row->kontak_informasi),
        		'quota_peserta' => set_value('quota_peserta', $row->quota_peserta),
        		'tiket_terjual' => set_value('tiket_terjual', $row->tiket_terjual),
				'jumlah_tiket_refund' => set_value('jumlah_tiket_refund', $row->jumlah_tiket_refund),
				'lokasi' => set_value('lokasi', $row->lokasi),
				'tanggal_event' => set_value('tanggal_event', $row->tanggal_event),
                'jam_event' => set_value('jam_event', $row->jam_event),
                'status_event' => set_value('status_event', $row->status_event),
        		'izin_refund' => set_value('izin_refund', $row->izin_refund),
        		'gambar_poster' => set_value('gambar_poster', $row->gambar_poster),
        		'gambar_izin' => set_value('gambar_izin', $row->gambar_izin),
        		'pendapantan' => set_value('pendapantan', $row->pendapantan),
				'tagihan' => set_value('tagihan', $row->tagihan),
				'status_pembayaran' => set_value('status_pembayaran', $row->status_pembayaran),
				'bukti_bayar' => set_value('bukti_bayar', $row->bukti_bayar),
                'keterangan_event' => set_value('keterangan_event', $row->keterangan_event),
				'link_lokasi' => set_value('link_lokasi', $row->link_lokasi),
                );
                
                $this->load->model('Web_Kategori_model');
                $data['all_Kategori'] = $this->Web_Kategori_model->CMBKategori();
            
                $this->load->model('Web_Penyelenggara_model');
                $data['all_penyelenggara'] = $this->Web_Penyelenggara_model->CMBpenyelenggara();
            
            $this->load->view('Event_Edit_View', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('event'));
        }
    }
    
    public function update_event()	{
        $this->load->library('upload');
        // $this->_rules();
        $nmfile = "poster_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './images/event/poster/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);
        if($_FILES['gambar_poster']['name'])
        {
            if ($this->upload->do_upload('gambar_poster'))
            {
                $gbr = $this->upload->data();
                $DataEvent = array(
                'gambar_poster' =>$gbr['file_name'],
                'id_penyelenggara' => $this->input->post('id_penyelenggara',TRUE),
                'harga_tiket' => $this->input->post('harga_tiket',TRUE),
                'biaya_pelayanan' => $this->input->post('biaya_pelayanan',TRUE),
                'id_kategori' => $this->input->post('id_kategori',TRUE),
                'nama_event' => $this->input->post('nama_event',TRUE),
                'kontak_informasi' => $this->input->post('kontak_informasi',TRUE),
                'quota_peserta' => $this->input->post('quota_peserta',TRUE),
                'lokasi' => $this->input->post('lokasi',TRUE),
                'link_lokasi' => $this->input->post('link_lokasi',TRUE),
                'izin_refund'=> $this->input->post('izin_refund',TRUE),
                'tanggal_event' => $this->input->post('tanggal_event',TRUE),
                'jam_event' => $this->input->post('jam_event',TRUE),
                'status_event' => $this->input->post('status_event',TRUE),
                'keterangan_event' => $this->input->post('keterangan_event',TRUE),
                );
                $this->Web_Event_model->updateEvent($this->input->post('id_event',TRUE), $DataEvent);
                redirect('Web_Event_Controller/setEventView','refresh');
            }
            else{
                $this->session->set_flashdata('message', 'Gagal upload foto');
                redirect('event','refresh');
            }
        }
        else{
            $DataEvent=array(
                'id_penyelenggara' => $this->input->post('id_penyelenggara'),
                'harga_tiket' => $this->input->post('harga_tiket'),
                'biaya_pelayanan' => $this->input->post('biaya_pelayanan'),
                'id_kategori' => $this->input->post('id_kategori'),
                'nama_event' => $this->input->post('nama_event'),
                'kontak_informasi' => $this->input->post('kontak_informasi'),
                'quota_peserta' => $this->input->post('quota_peserta'),
                'lokasi' => $this->input->post('lokasi'),
                'izin_refund'=> $this->input->post('izin_refund'),
                'link_lokasi' => $this->input->post('link_lokasi'),
                'tanggal_event' => $this->input->post('tanggal_event'),
                'jam_event' => $this->input->post('jam_event'),
                'status_event' => $this->input->post('status_event'),
                'keterangan_event' => $this->input->post('keterangan_event'),
                );
                $this->Web_Event_model->updateEvent($this->input->post('id_event',TRUE), $DataEvent);
                redirect('Web_Event_Controller/setEventView','refresh');
        }
    }  
    
    public function ajax_edit($id_event){
        $data = $this->Web_Event_model->get_by_id($id_event);
        echo json_encode($data);
    }
    
    public function GetIdEvent(){
		$id_event=$this->input->get('id_event');
		$this->session->set_flashdata('id_event',$id_event);
    }

    public function setSearchEventView(){
        $keyword=$this->input->post('keyword');
        $countEvent=$this->Web_Event_model->getCountSearchEvent($keyword);
        $config['base_url']=base_url().'Web_Event_Controller/setSearchEventView/';
        $config['total_rows'] = $countEvent;
        $config['per_page'] = 'all';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_event']=$this->Web_Event_model->getListSearchEvent($keyword,$config['per_page'],$from);
        $this->load->view('Event_Search_view',$data);
    }

    function _rules(){
        $this->form_validation->set_rules('nama_event', 'nama_event', 'trim|required');
        $this->form_validation->set_rules('kontak_informasi', 'kontak_informasi', 'trim|required');
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required');
        $this->form_validation->set_rules('gambar_poster', 'gambar_poster', 'trim|required');
        }
}