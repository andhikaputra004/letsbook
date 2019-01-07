<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_Event_Controller extends CI_Controller {

        public function __construct()
    {
        parent::__construct();
        $models = array(
        'M_Event_model' => 'M_Event_model'
        );
        $this->load->model($models);
    }

    public function GetListEventbyTime()
    {
        $response=array(
        'status'=>true,
        'listevent'=>$this->M_Event_model->getAllEventbyTime()
        );

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
    public function GetListEventbyKategori()
    { 
        $kategori = json_decode(file_get_contents('php://input'),true);
        $data= $this->M_Event_model->getAllEventbyKategori($kategori);

        if($data!=null){
            $response=array(
                'status'=>true,
                'listevent'=>$this->M_Event_model->getAllEventbyKategori($kategori)
            );
        }else{
            $response=array(
                'success'=>false,
                'message'=>'Event Tidak Tersedia',
                'listevent'=>$this->M_Event_model->getAllEventbyKategori($kategori)
              );
        }
        
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function GetListAllEvent()
    {
        $id_penyelenggara = json_decode(file_get_contents('php://input'),true);
        $data= $this->M_Event_model->getAllEvent($id_penyelenggara);
        
        if($data!=null){
            $response=array(
                'listAllEvent'=>$this->M_Event_model->getAllEvent($id_penyelenggara)
                );        
        }else{
            $response=array(
                'success'=>false,
                'message'=>'Belum Ada Transaksi'
              );
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    public function GetListAktifEvent()
    {
        $id_penyelenggara = json_decode(file_get_contents('php://input'),true);
        $data= $this->M_Event_model->getAktifEvent($id_penyelenggara);
        
        if($data!=null){
            $response=array(
                'listAllEvent'=>$this->M_Event_model->getAktifEvent($id_penyelenggara)
                );        
        }else{
            $response=array(
                'success'=>false,
                'message'=>'Belum Ada Transaksi'
              );
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }
}