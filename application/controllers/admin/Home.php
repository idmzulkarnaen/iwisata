<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');  
	   $this->load->model('cek_model');
	   $this->cek_model->cekadmin();
	}

	public function index()
	{		
		$data['konten']="admin/utama";
		$data['title']="Dashboard";
		$data['judul']="Dashboard";
		$data['pembuka']="Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola content website.";
		$this->load->view('admin/index',$data);
	}


}
