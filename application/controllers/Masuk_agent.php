<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk_agent extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	   

	}

	public function index()
	{	
		$data['konten']='masuk_agent';
		$data['judul']='Login/Masuk';
		$this->load->view('index',$data);
	}

	public function proses_tambah_agent()
	{

		$nama = $this->input->post('nama');
		$user=$this->input->post('user');
		$email = $this->input->post('email');
		$pwd = $this->input->post('pwd');
		$pwd2=$this->input->post('pwd2');
		$alamat=$this->input->post('alamat');
		$hp=$this->input->post('hp');
		$id = $this->crud_model->newId("admin","id_admin");
		
		if($pwd!=$pwd2)
		{
			$this->session->set_flashdata('info','Maaf Password beda');
			redirect('masuk_agent');
		}
		else{
		
        		$save = $this->crud_model->saveData("admin","id_admin,nama,user,email,pwd,hp,level,sts,alamat","'".$id."','".$nama."','".$user."','".$email."','".md5($pwd)."','".$hp."',1,0,'".$alamat."'");
        		if($save)
        		{
		    		$this->session->set_flashdata('info',"berhasil Daftar");
		    		$this->session->set_userdata('idoperator',$id);
                	$this->session->set_userdata('useroperator',$user);
               		$this->session->set_userdata('namaoperator',$nama);
					redirect(base_url('operator/operator'));                        
				}else{
		    		$this->session->set_flashdata('info',"gagal mendaftar");
		    		redirect('masuk');
	    		} 
	    }		
	}

}