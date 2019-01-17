<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_EventSelesai_Controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $models = array(
        'Web_EventSelesai_model' => 'Web_EventSelesai_model',
        );
        $this->load->model($models);
    }
    public function setEventView(){
        $countEvent=$this->Web_EventSelesai_model->getCountEvent();

        $config['base_url']=base_url().'index.php/Web_EventSelesai_Controller/setEventView/';
        $config['total_rows'] = $countEvent;
        $config['per_page'] = 10;
        $page = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_event_selesai']=$this->Web_EventSelesai_model->getListEvent($config["per_page"],$page);
        $this->load->view('EventSelesai_view',$data);
    }

    public function getDetailEvent($id_event){
        $event=$this->Web_EventSelesai_model->getEventById($id_event);
        $this->load->view('EventSelesai_Detail_View',$event);
    }
    public function setSearchEventSelesaiView(){
        $keyword=$this->input->post('keyword');
        $countEvent=$this->Web_EventSelesai_model->getCountSearchEventSelesai($keyword);
        $config['base_url']=base_url().'Web_EventSelesai_Controller/setSearchEventSelesaiView/';
        $config['total_rows'] = $countEvent;
        $config['per_page'] = 'all';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_event_selesai']=$this->Web_EventSelesai_model->getListSearchEventSelesai($keyword,$config['per_page'],$from);
        $this->load->view('EventSelesai_Search_view',$data);
    }
    public function ajax_edit($id_event){
        $data = $this->Web_EventSelesai_model->get_by_id($id_event);
        echo json_encode($data);
    }
    public function GetIdEvent(){
		$id_event=$this->input->get('id_event');
		$this->session->set_flashdata('id_event',$id_event);
    }
    public function update_transfer(){
        $this->load->library('upload');
        $nmfile = "bukti_trf_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './images/event/pembayaran/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['bukti_bayar']['name'])
        {
            $status_pembayaran="Lunas";
            if ($this->upload->do_upload('bukti_bayar')){
                $gbr = $this->upload->data();
                $DataEvent = array(
                  'bukti_bayar' =>$gbr['file_name'],
                  'status_pembayaran' => $status_pembayaran,
                );
                $this->Web_EventSelesai_model->updateEvent($this->input->post('id_event',TRUE), $DataEvent);
                redirect('eventselesai','refresh');
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata('message', 'Gagal upload foto');
                redirect('eventselesai','refresh');
            }
        }
    }
}