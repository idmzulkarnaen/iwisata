<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

	public function __Construct()
	{
	   parent ::__construct();	   
	   $this->load->model('crud_model');  
	}

	public function index()
	{	
		$data['konten']='Agent';
		$data['judul']='Agent';
		$data['result']=$this->crud_model->selectData("agent");	
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
