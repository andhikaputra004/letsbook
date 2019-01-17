<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_Transaksi_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $models = array(
        'M_Pelanggan_model' => 'M_Pelanggan_model',
        'M_Event_model'=>'M_Event_model',
        'M_Transaksi_model'=>'M_Transaksi_model',
        );
        $this->load->model($models);
    }

    /*
        Tampil Data Transaksi Aktif Pelanggan || Tiketku
    */
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

    /*
        Tampil Data Transaksi Aktif Pelanggan || Tiketku
    */
    public function GetListRefundTransaksi()
    {
        $id_pelanggan = json_decode(file_get_contents('php://input'),true);
        $data= $this->M_Transaksi_model->getRefundTransaksi($id_pelanggan);
        
        if($data!=null){
            $response=array(
                'listaktiftransaksi'=>$this->M_Transaksi_model->getRefundTransaksi($id_pelanggan)
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

      /*
        Tampil Data Transaksi Pelanggan || by Id Pelanggan 
    */
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

    public function GetDetailTransaksi()
    {
        $id_transaksi = json_decode(file_get_contents('php://input'),true);
        $data= $this->M_Transaksi_model->getAllTransaksi($id_transaksi);
        
        if($data!=null){
            $response=array(
                'listAllTransaksi'=>$this->M_Transaksi_model->getDetailTransaksi($transaksi)
                );        
        }else{
            $response=array(
                'success'=>false,
                'message'=>'Data Tidak Ditemukan'
              );
        }

        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($response, JSON_PRETTY_PRINT))
            ->_display();
        exit;
    }

    
    public function InsertTransaksi()
    {
        $DataTransaksi = json_decode(file_get_contents('php://input'),true);
        $id_transaksi=$this->M_Transaksi_model->InsertTransaksi($DataTransaksi);
    
        $response=array(
            'status' => true,
          'message'=>'berhasil memesan katering'
        );
    
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
        exit;
    }

    public function InsertPesan()
    {
      $DataPesan = json_decode(file_get_contents('php://input'),true);
      $Pesan=$DataPesan["pesan"];
      $Pesan['status']='melakukan pembayaran';
      $id_pesan=$this->PesanModel->insertPesan($Pesan);
      $ListDetailPesan=$DataPesan["detailpesan"];
      foreach ($ListDetailPesan as $DetailPesan) {
        $DetailPesan['id_pesan']=$id_pesan;
        $this->DetailPesanModel->insertDetailPesan($DetailPesan);
      }
  
      $response=array(
        'message'=>'berhasil memesan katering'
      );
  
      $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
    }

    public function RefundTransaksi()
    {
      $DataPesan = json_decode(file_get_contents('php://input'),true);
      $this->M_Transaksi_model->refund($DataPesan);
  
      $response=array(
        'message'=>'refund'
      );
  
      $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
      exit;
    }
}