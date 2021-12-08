<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	  
	   
	}

	public function index()
	{	
		$data['konten']='home';
		$data['judul']='beranda';
		$data['result']=$this->crud_model->selectData("pariwisata ORDER BY RAND() LIMIT 4");
		$data['results']=$this->crud_model->selectData("agent ORDER BY RAND() LIMIT 5");	
		$this->load->view('index',$data);
	}

	public function post($id)
	{
		$data['konten']='post';
		$data['judul']='informasi';
		$data['abc']="info";
		$data['aksi']='pariwisata';	
		$data['result']=$this->crud_model->selectData("pariwisata","*","id_wisata='$id' order by id_wisata desc");
		$this->load->view('index',$data);
	}

	public function post_agent($id)
	{
		$data['konten']='post';
		$data['judul']='agent';
		$data['abc']="agent";
		$data['aksi']='agent';
		$data['result']=$this->crud_model->selectData("agent","*","id_agent='$id' order by id_agent desc");
		$this->load->view('index',$data);
	}


}
