<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_Login_Controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $models = array(
      'M_Penyelenggara_model' => 'M_Penyelenggara_model',
      'M_Pelanggan_model' => 'M_Pelanggan_model',
    );
    $this->load->model($models);
  }

  public function Login_mobile()
  {
    $DataLogin=json_decode(file_get_contents('php://input'),true);
    $data1=$this->M_Pelanggan_model->getDataPelanggan($DataLogin);
    $data2=$this->M_Penyelenggara_model->getDataPenyelenggara($DataLogin);
    if($data1!=NULL)
    {
      $response=array(
        'success'=>true,
        'role'=>'pelanggan',
        'message'=>'berhasil masuk',
        'datapelanggan'=>$data1
      );
    }
    else if($data2!=NULL)
    {
      $response=array(
        'success'=>true,
        'role'=>'penyelenggara',
        'message'=>'berhasil masuk',
        'datapenyelenggara'=>$data2
      );
    }
    else {
      $response=array(
        'success'=>false,
        'message'=>'e-mail / katasandi salah'
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
