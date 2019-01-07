<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Transaksi_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $models = array(
        'Web_Transaksi_model' => 'Web_Transaksi_model',
        );
        $this->load->model($models);
    }

    public function setTransaksiView()
    {
        $countTransaksi=$this->Web_Transaksi_model->getcountTransaksi();

        $config['base_url']=base_url().'index.php/Web_Transaksi_Controller/setTransaksiView/';
        $config['total_rows'] = $countTransaksi;
        $config['per_page'] = 10;
        $page = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_transaksi']=$this->Web_Transaksi_model->getListTransaksi($config["per_page"],$page);
        $this->load->view('Transaksi_View',$data);
    }

    public function getDetailTransaksi($id_transaksi){
        $transaksi=$this->Web_Transaksi_model->getTransaksiById($id_transaksi);
        $this->load->view('Transaksi_Detail_View',$transaksi);
    }
    public function setSearchTransaksiView(){
        $keyword=$this->input->post('keyword');
        $countTransaksi=$this->Web_Transaksi_model->getCountSearchTransaksi($keyword);
        $config['base_url']=base_url().'Web_Transaksi_Controller/setSearchTransaksiView/';
        $config['total_rows'] = $countTransaksi;
        $config['per_page'] = 'all';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_transaksi']=$this->Web_Transaksi_model->getListSearchTransaksi($keyword,$config['per_page'],$from);
        $this->load->view('Transaksi_Search_View',$data);
    }
}
