<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_Transaksi_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $models = array(
        'M_Pelanggan_model' => 'M_Pelanggan_model',
        'M_Event_model'=>'M_Event_model',
        'M_Transaksi_model'=>'M_Transaksi_model'
        );
        $this->load->model($models);
    }

    public function GetListAktifTransaksi()
    {
        $id_pelanggan = json_decode(file_get_contents('php://input'),true);
        $data= $this->M_Transaksi_model->getAktifTransaksi($id_pelanggan);
        
        if($data!=null){
            $response=array(
                'listaktiftransaksi'=>$this->M_Transaksi_model->getAktifTransaksi($id_pelanggan)
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

    public function GetListAllTransaksi()
    {
        $id_pelanggan = json_decode(file_get_contents('php://input'),true);
        $data= $this->M_Transaksi_model->getAllTransaksi($id_pelanggan);
        
        if($data!=null){
            $response=array(
                'listaktiftransaksi'=>$this->M_Transaksi_model->getAllTransaksi($id_pelanggan)
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