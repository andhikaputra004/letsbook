<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_login_controller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $models = array(
      'Web_Admin_model'=>'Web_Admin_model',
    );
    $this->load->model($models);
    $this->load->library('form_validation');
		$this->load->helper('text');
    $this->load->library('pagination');
  }

  public function index()
  {
    $this->load->view('LoginView');
  }

  public function Login_web(){
    $email = $this->input->post('email');
    $kata_sandi = $this->input->post('kata_sandi');
    $where = array(
          'email' => $email,
          'kata_sandi' => $kata_sandi
          );
    $cek = $this->Web_Admin_model->cek_login("tbl_admin",$where)->num_rows();
    echo $password;
    if($cek > 0){
        $data_session = array(
        'nama' => $email,
        'status' => "login",
          );
    $this->session->set_userdata($data_session);
    redirect(site_url("penyelenggara"));
    }else{
        $this->session->set_flashdata('message', 'Inputan Email Dan kata sandi tidak cocok !');
        redirect(site_url(''));
    }
  }

function logout(){
  $this->session->sess_destroy();
  redirect(site_url(''));
}

}
