<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web_Penyelenggara_controller extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $models = array(
        'Web_Penyelenggara_model' => 'Web_Penyelenggara_model',
        );
        $this->load->model($models);
    }
    public function insert_penyelenggara(){
        $this->load->library('upload');
        $this->_rules();
        $nmfile = "logo_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './images/penyelenggara/logo/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        // $config['max_size'] = '2048'; //maksimum besar file 2M
        // $config['max_width']  = '2000'; //lebar maksimum 1288 px
        // $config['max_height']  = '2000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['logo_organisasi']['name'])        {
            $role=2;
            $status='AKTIF';
            if ($this->upload->do_upload('logo_organisasi'))
            {
                $gbr = $this->upload->data();
                $DataPenyelenggara = array(
                    'logo_organisasi' =>$gbr['file_name'],
                    'nama_organisasi' => $this->input->post('nama_organisasi',TRUE),
                    'nama_pengelola' => $this->input->post('nama_pengelola',TRUE),
                    'email' => $this->input->post('email',TRUE),
                    'role' => $role,
                    'status' => $status,
                    'no_telepon' => $this->input->post('no_telepon',TRUE),
                    'alamat' => $this->input->post('alamat',TRUE),
                    'kata_sandi' => $this->input->post('no_telepon',TRUE),
                    'nama_bank' => $this->input->post('nama_bank',TRUE),
                    'nomor_rekening' => $this->input->post('nomor_rekening',TRUE),
                    'nama_pemilik_rekening' => $this->input->post('nama_pemilik_rekening',TRUE),
                    'deskripsi_penyelenggara' => $this->input->post('deskripsi_penyelenggara',TRUE),
                );
                $this->Web_Penyelenggara_model->insertPenyelenggara($DataPenyelenggara);
				$this->session->set_flashdata('message', 'Tambah Data Penyelenggara  Sukses');
                redirect(site_url('Web_Penyelenggara_controller/setPenyelenggaraView'));
            }
        }
    }
    public function update($id_penyelenggara){
        $row = $this->Web_Penyelenggara_model->get_by_id($id_penyelenggara);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('penyelenggara/update_penyelenggara'),
                'id_penyelenggara' => set_value('id_penyelenggara', $row->id_penyelenggara),
                'nama_organisasi' => set_value('nama_organisasi', $row->nama_organisasi),
        		'nama_pengelola' => set_value('nama_pengelola', $row->nama_pengelola),
        		'email' => set_value('email', $row->email),
        		'role' => set_value('role', $row->role),
        		'status' => set_value('status', $row->status),
        		'no_telepon' => set_value('no_telepon', $row->no_telepon),
        		'alamat' => set_value('alamat', $row->alamat),
        		'kata_sandi' => set_value('kata_sandi', $row->kata_sandi),
				'nama_bank' => set_value('nama_bank', $row->nama_bank),
				'nomor_rekening' => set_value('nomor_rekening', $row->nomor_rekening),
				'nama_pemilik_rekening' => set_value('nama_pemilik_rekening', $row->nama_pemilik_rekening),
				'deskripsi_penyelenggara' => set_value('deskripsi_penyelenggara', $row->deskripsi_penyelenggara),
				'logo_organisasi' => set_value('logo_organisasi', $row->logo_organisasi),
        	    );
            $this->load->view('Penyelenggara_Edit_View', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('penyelenggara'));
        }
    }
    public function update_penyelenggara()	{
        $this->load->library('upload');
        $this->_rules();
		$nmfile = "logo_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './images/penyelenggara/logo/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			// $config['max_size'] = '2048'; //maksimum besar file 2M
			// $config['max_width']  = '2000'; //lebar maksimum 1288 px
			// $config['max_height']  = '2000'; //tinggi maksimu 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya
			$this->upload->initialize($config);
			if($_FILES['logo_organisasi']['name'])
			{
                $role=2;
				if ($this->upload->do_upload('logo_organisasi'))
				{
					$gbr = $this->upload->data();
					$DataPenyelenggara = array(
                        'logo_organisasi' =>$gbr['file_name'],
                        'nama_organisasi' => $this->input->post('nama_organisasi',TRUE),
                        'nama_pengelola' => $this->input->post('nama_pengelola',TRUE),
                        'email' => $this->input->post('email',TRUE),
                        'role' => $role,
                        'status' => $this->input->post('status',TRUE),
                        'no_telepon' => $this->input->post('no_telepon',TRUE),
                        'alamat' => $this->input->post('alamat',TRUE),
                        'kata_sandi' => $this->input->post('no_telepon',TRUE),
                        'nama_bank' => $this->input->post('nama_bank',TRUE),
                        'nomor_rekening' => $this->input->post('nomor_rekening',TRUE),
                        'nama_pemilik_rekening	' => $this->input->post('nama_pemilik_rekening',TRUE),
                    );
                    $this->Web_Penyelenggara_model->updatePenyelenggara($this->input->post('id_penyelenggara',TRUE), $DataPenyelenggara);
					redirect('Web_Penyelenggara_controller/setPenyelenggaraView','refresh');
				}
				else{
					$this->session->set_flashdata('message', 'Gagal upload foto');
					redirect('Admin_Donatur/donatur','refresh');
				}
			}
			else
			{
                $role=2;
				$DataPenyelenggara=array(
					'nama_organisasi' => $this->input->post('nama_organisasi'),
                    'nama_pengelola' => $this->input->post('nama_pengelola'),
                    'email' => $this->input->post('email'),
                    'role' => $role,
                    'status' => $this->input->post('status'),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'alamat' => $this->input->post('alamat'),
                    'kata_sandi' => $this->input->post('kata_sandi'),
                    'nama_bank' => $this->input->post('nama_bank'),
                    'nomor_rekening' => $this->input->post('nomor_rekening'),
                    'nama_pemilik_rekening	' => $this->input->post('nama_pemilik_rekening'),
					);
                    $this->Web_Penyelenggara_model->updatePenyelenggara($this->input->post('id_penyelenggara',TRUE), $DataPenyelenggara);
					redirect('Web_Penyelenggara_controller/setPenyelenggaraView','refresh');
			}
    }  
    public function update_identitas(){
        $this->load->library('upload');
        $nmfile = "identitas_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './images/penyelenggara/identitas/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        // $config['max_size'] = '2048'; //maksimum besar file 2M
        // $config['max_width']  = '2000'; //lebar maksimum 1288 px
        // $config['max_height']  = '2000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['foto_kartu_identitas']['name'])
        {
            if ($this->upload->do_upload('foto_kartu_identitas'))
            {
                $gbr = $this->upload->data();
                $DataPenyelenggara = array(
                  'foto_kartu_identitas' =>$gbr['file_name'],
                );
                $this->Web_Penyelenggara_model->updatePenyelenggara($this->input->post('id_penyelenggara',TRUE), $DataPenyelenggara);
				
				//  $this->session->set_flashdata('message', 'Ubah Data Kartu Identitas Penyelenggara  Sukses');
                redirect('Web_Penyelenggara_controller/setPenyelenggaraView','refresh');
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                // $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect('Web_Penyelenggara_controller/setPenyelenggaraView','refresh');

            }
        }
    }
    public function update_legalitas(){
        $this->load->library('upload');
        $this->_rules();
		$nmfile = "Legalitas_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './images/penyelenggara/legalitas/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|pdf'; //type yang dapat diakses bisa anda sesuaikan
			// $config['max_size'] = '2048'; //maksimum besar file 2M
			// $config['max_width']  = '2000'; //lebar maksimum 1288 px
			// $config['max_height']  = '2000'; //tinggi maksimu 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya
			$this->upload->initialize($config);
			if($_FILES['foto_legalitas']['name'])
			{
                $role=2;
				if ($this->upload->do_upload('foto_legalitas'))
				{
					$gbr = $this->upload->data();
					$DataPenyelenggara = array(
                    'foto_legalitas' =>$gbr['file_name'],
                    );
                    $this->Web_Penyelenggara_model->updatePenyelenggara($this->input->post('id_penyelenggara',TRUE), $DataPenyelenggara);
					redirect('Web_Penyelenggara_controller/setPenyelenggaraView','refresh');
				}
				else{
					$this->session->set_flashdata('message', 'Gagal upload foto');
					redirect('penyelenggara','refresh');
				}
			}
    }
    public function setPenyelenggaraView(){
        $countPenyelenggara=$this->Web_Penyelenggara_model->getcountPenyelenggara();

        $config['base_url']=base_url().'index.php/Web_Penyelenggara_controller/setPenyelenggaraView/';
        $config['total_rows'] = $countPenyelenggara;
        $config['per_page'] = 10;
        $page = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_penyelenggara']=$this->Web_Penyelenggara_model->getListPenyelenggara($config["per_page"],$page);
        $this->load->view('Penyelenggara_View',$data);
    }
    public function getDetailPenyelenggara($id_penyelenggara){
        $penyelenggara=$this->Web_Penyelenggara_model->getPenyelenggaraById($id_penyelenggara);
        $this->load->view('Penyelenggara_Detail_View',$penyelenggara);
    }
    public function setSearchPenyelenggaraView(){
        $keyword=$this->input->post('keyword');
        $countPenyelenggara=$this->Web_Penyelenggara_model->getCountSearchPenyelenggara($keyword);
        $config['base_url']=base_url().'Web_Penyelenggara_controller/setSearchPenyelenggaraView/';
        $config['total_rows'] = $countPenyelenggara;
        $config['per_page'] = 'all';
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['list_penyelenggara']=$this->Web_Penyelenggara_model->getListSearchPenyelenggara($keyword,$config['per_page'],$from);
        $this->load->view('penyelenggara_Search_View',$data);
    }
    public function ajax_edit($id_penyelenggara){
        $data = $this->Web_Penyelenggara_model->get_by_id($id_penyelenggara);
        echo json_encode($data);
    }
    public function GetIdPenyelenggara(){
		$id_penyelenggara=$this->input->get('id_penyelenggara');
		$this->session->set_flashdata('id_penyelenggara',$id_penyelenggara);
    }
    function _rules(){
        $this->form_validation->set_rules('nama_organisasi', 'nama_organisasi', 'trim|required');
        $this->form_validation->set_rules('no_telepon', 'no_telepon', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('foto_donatur', 'foto_donatur', 'trim|required');
    }    
}