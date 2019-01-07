<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile_Pelanggan_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $models = array(
        'M_Pelanggan_model' => 'M_Pelanggan_model'
        );
        $this->load->model($models);
    }
    public function RegisterPelanggan()
    {
        $DataPelanggan = json_decode(file_get_contents('php://input'),true);
        if($this->M_Pelanggan_model->cekEmail($DataPelanggan['email']))
        {
            $this->M_Pelanggan_model->insertPelanggan($DataPelanggan);
            $Pelanggan=$this->M_Pelanggan_model->getDataPelanggan($DataPelanggan);

            $response=array(
                    'success'=>true,
                    'message'=>'registrasi berhasil',
                    'datapelanggan'=>$Pelanggan
                );
        }
        else {
            $response=array(
                'success'=>false,
                'message'=>'akun email sudah terdaftar'
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