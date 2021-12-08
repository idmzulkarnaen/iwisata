<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Syarat_ketentuan_a extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');  
	   $this->load->model('cek_model');
	   $this->cek_model->cekadmin();
	}

	public function index()
	{		
		$data['konten']="admin/syarat_ketentuan_a";
		$data['title']="Syarat & Ketentuan Agent Travel ";
		$data['judul']="Syarat & Ketentuan Agent Travel";
		$data['aksi']="syarat_ketentuan_agent";
		$data['result']=$this->crud_model->selectData("modul","*"," judul = 'syarat_ketentuan_agent'");
		$this->load->view('admin/index',$data);
	}

	public function modul()
	{
		$konten = $this->input->post('konten');
		$judul = $this->input->post('judul');
	    $cek = $this->crud_model->cekData("modul","WHERE judul='".$judul."'");
	    if($cek>0){
	    	$this->crud_model->updateData("modul","isi='".$konten."'","judul='".$judul."'");
	    }else{
	    	$this->crud_model->saveData("modul","id_modul,judul,isi","null,'".$judul."','".$konten."'");
	    }
	    $this->session->set_flashdata("info","Data disimpan");
	    redirect('admin/'.$judul);
	}


}
