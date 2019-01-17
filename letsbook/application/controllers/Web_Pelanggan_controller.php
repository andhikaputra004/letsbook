<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Pelanggan_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $models = array(
        'Web_Pelanggan_model' => 'Web_Pelanggan_model',
        );
        $this->load->model($models);
    }
    public function setPelangganView()
    {
        $countPelanggan=$this->Web_Pelanggan_model->getCountPelanggan();
        $config['base_url']=base_url().'index.php/Web_Pelanggan_controller/setPelangganView/';
        $config['total_rows'] = $countPelanggan;
        $config['per_page'] = 10;
        $page = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_pelanggan']=$this->Web_Pelanggan_model->getListPelanggan($config["per_page"],$page);
        $this->load->view('Pelanggan_View',$data);
    }
    public function getDetailPelanggan($id_pelanggan){
        $pelanggan=$this->Web_Pelanggan_model->getPelangganById($id_pelanggan);
        $this->load->view('Penyelenggara_Detail_View',$pelanggan);
    }
    public function ajax_edit($id_pelanggan){
        $data = $this->Web_Pelanggan_model->get_by_id($id_pelanggan);
        echo json_encode($data);
    }
    public function setSearchPelangganView(){
        $keyword=$this->input->post('keyword');
        $countPelanggan=$this->Web_Pelanggan_model->getCountSearchPelanggan($keyword);
        $config['base_url']=base_url().'Web_Pelanggan_controller/setSearchPelangganView/';
        $config['total_rows'] = $countPelanggan;
        $config['per_page'] = 'all';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_pelanggan']=$this->Web_Pelanggan_model->getListSearchPelanggan($keyword,$config['per_page'],$from);
        $this->load->view('Pelanggan_Search_View',$data);
    }

    public function update_Pelanggan()
    {
        $password="12345678";
        $data = array(
            'id_pelanggan' => $this->input->post('id_pelanggan'),
            'kata_sandi' =>  $password,
        );
        $this->Web_Pelanggan_model->updatePelanggan($data);
        redirect('pelanggan','refresh');

    }
}