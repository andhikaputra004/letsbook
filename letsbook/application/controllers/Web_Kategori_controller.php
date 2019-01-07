<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Kategori_controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $models = array(
        'Web_Kategori_model' => 'Web_Kategori_model',
        );
        $this->load->model($models);
    }
    public function setKategoriView(){
        $countKategori=$this->Web_Kategori_model->getcountKategori();
        $config['base_url']=base_url().'index.php/Web_Kategori_controller/setKategoriView/';
        $config['total_rows'] = $countKategori;
        $config['per_page'] = 100;
        $page = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_kategori']=$this->Web_Kategori_model->getListKategori($config["per_page"],$page);
        $this->load->view('Kategori_View',$data);
    }
    public function insert_kategori(){
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_kategori'=>$this->input->post('nama_kategori'),
        );
        $this->Web_Kategori_model->insert($data);
        
        $this->session->set_flashdata('message', 'Tambah Kategori Sukses');
        redirect(site_url('kategori'));
    }
    public function update_kategori(){
        $data = array(
            'id_kategori' => $this->input->post('id_kategori'),
            'nama_kategori'=>$this->input->post('nama_kategori'),
            );
        $this->Web_Kategori_model->updateKategori($this->input->post('id_kategori',TRUE), $data);
        redirect('Web_Kategori_controller/setKategoriView','refresh');
    }
    public function ajax_edit($id_kategori){
		$data = $this->Web_Kategori_model->get_by_id($id_kategori);
		echo json_encode($data);
    }
    public function GetIdKategori(){
		$id_kategori=$this->input->get('id_kategori');
		$this->session->set_flashdata('id_kategori',$id_kategori);
    }
}