<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model'); 
	   $this->load->model('cek_model');  

	}

	public function index()
	{		
		$this->cek_model->cekoperator();
		$data['konten']="operator/utama";
		$data['title']="Dashboard";
		$data['judul']="Dashboard";
		$data['pembuka']="Silahkan klik menu pilihan yang berada di sebelah kiri untuk mengelola content website.";
		$this->load->view('operator/index',$data);
	}

}
