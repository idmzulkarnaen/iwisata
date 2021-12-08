<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_transaksi extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');  
	   $this->load->model('cek_model');
	   $this->cek_model->cekadmin();
	}

	public function index()
	{		
		$data['konten']="admin/profil_transaksi";
		$data['title']="transaksi";
		$data['judul']="transaksi";
		$data['rbank']=$this->crud_model->selectData("modul","*"," judul = 'bank'");
		$data['rrek']=$this->crud_model->selectData("modul","*"," judul = 'no_rekening'");
		$data['ratasnama']=$this->crud_model->selectData("modul","*"," judul = 'atas_nama'");
		$this->load->view('admin/index',$data);
	}

	public function profil_transaksi()
	{
		$bank = $this->input->post('bank');
		$rek = $this->input->post('rek');
		$an = $this->input->post('an');

	    $cek = $this->crud_model->cekData("modul","WHERE judul='bank'");
	    $cek2 = $this->crud_model->cekData("modul","WHERE judul='no_rekening'");
	    $cek3 = $this->crud_model->cekData("modul","WHERE judul='atas_nama'");

	    if($cek>0)
	    {
	    	$this->crud_model->updateData("modul","isi='".$bank."'","judul='bank'");
	    }else
	    {
	    	$this->crud_model->saveData("modul","id_modul,judul,isi","null,'bank','".$bank."'");
	    }

	    if($cek2>0)
	    {
	    	$this->crud_model->updateData("modul","isi='".$rek."'","judul='no_rekening'");
	    }else
	    {
	    	$this->crud_model->saveData("modul","id_modul,judul,isi","null,'no_rekening','".$rek."'");
	    }

	    if($cek3>0)
	    {
	    	$this->crud_model->updateData("modul","isi='".$an."'","judul='atas_nama'");
	    }else{
	    	$this->crud_model->saveData("modul","id_modul,judul,isi","null,'atas_nama','".$an."'");
	    }

	    $this->session->set_flashdata("info","Data disimpan");
	    redirect('admin/profil_transaksi');
	}

}
