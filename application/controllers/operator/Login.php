<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	}

	public function index()
	{
		$data['aksi']="Operator";		
		$this->load->view('operator/login',$data);
	}

	public function proses_login()
	{
			$username = trim($this->input->post('user'));
	        $password = md5($this->input->post('pwd'));

	        $cek = $this->crud_model->cekData("admin","WHERE BINARY user='".$username."'");
	        $ambildata = $this->crud_model->selectData("admin","*","BINARY user='".$username."'");

	        foreach ($ambildata as $data) {
	            $id = $data->id_admin;
	            $user = $data->username;
	            $nama = $data->nama;
	            $pwd = $data->pwd;	            
	            $sts = $data->sts;
	        }

	        if($cek == 0) {
	            
	            $this->session->set_flashdata('info',"Username Salah");
	            redirect('operator/login');
	            
	        } else {
	            if($password != $pwd) {
	                $this->session->set_flashdata('info',"Password salah");
	            	redirect('operator/login');
	            } else if($sts != "1") {
	                $this->session->set_flashdata('info',"Akun belum aktif. Tunggu hingga akun diaktifkan atau hubungi admin");
	            	redirect('operator/login');
	            } else {
	                $this->session->set_userdata('idoperator',$id);
	                $this->session->set_userdata('useroperator',$user);
	                $this->session->set_userdata('namaoperator',$nama);
	                redirect('operator/operator');
	            }
	        }

	}

	public function signout()
	{		
	    $this->session->unset_userdata('idoperator');
	    $this->session->unset_userdata('useroperator');
	    redirect(base_url().'operator/login');
	}

}
