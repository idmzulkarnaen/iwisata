<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	   $this->load->model('cek_model');
	   $this->cek_model->cekadmin();  
	}

	public function index()
	{		
		$data['konten']="admin/operator";
		$data['title']="operator";
		$data['judul']="operator";
		$data['result']=$this->crud_model->selectData("admin","*","level!='0'");
		$this->load->view('admin/index',$data);
	}

	public function ubah_sts_admin()
	{
		$sts = $this->input->get('sts');
		$id = $this->input->get('id');
	    $this->crud_model->updateData("admin","sts='".$sts."'","id_admin='".$id."'");
	    $this->session->set_flashdata("info","Status Diubah");
	    redirect('admin/operator');
	}
}
