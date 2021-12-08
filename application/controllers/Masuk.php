<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	   

	}

	public function index()
	{	
		$data['konten']='masuk';
		$data['judul']='Login/Masuk';
		$this->load->view('index',$data);
	}

	public function proses_tambah_kustomer()
	{

		$nama = $this->input->post('nama');
		$ktp=$this->input->post('ktp');
		$tgl = $this->input->post('tgl');
		$jk = $this->input->post('jk');
		$email = $this->input->post('email');
		$pwd = $this->input->post('pwd');
		$pwd2=$this->input->post('pwd2');
		$alamat=$this->input->post('alamat');
		$hp=$this->input->post('hp');
		
		if($pwd!=$pwd2)
		{
			$this->session->set_flashdata('info','Maaf Password beda');
			redirect('masuk');
		}
		else{
		
        		$save = $this->crud_model->saveData("kustomer","id_kustomer,nama,no_ktp,tgl_lahir,jk,email,pwd,hp,alamat","null,'".$nama."','".$ktp."','".$tgl."','".$jk."','".$email."','".md5($pwd)."','".$hp."','".$alamat."'");
        		if($save)
        		{
		    		$this->session->set_flashdata('info',"berhasil Daftar");
					redirect(base_url());                        
				}else{
		    		$this->session->set_flashdata('info',"gagal mendaftar");
		    		redirect('masuk');
	    		} 
	    }		
	}

	public function login_kustomer()
	{
		$email = trim($this->input->post('email'));
	    $pwd = md5($this->input->post('pwd'));

	        $cek = $this->crud_model->cekData("kustomer","WHERE BINARY email='".$email."'");
	        $ambildata = $this->crud_model->selectData("kustomer","*","BINARY email='".$email."'");

	        foreach ($ambildata as $data) {
	            $id = $data->id_kustomer;
	            $nama = $data->nama;
	            $email = $data->email;            
	            
	        }

	        if($cek == 0) {
	            
	            $this->session->set_flashdata('info2',"email atau password Salah");
	            redirect('masuk/index');
	            
	        } else {
	        	$this->session->set_flashdata('info2',"selamat datang");	             
	            $this->session->set_userdata('idpelanggan',$id);
	            $this->session->set_userdata('namapelanggan',$nama);
	            $this->session->set_userdata('emailpelanggan',$email);
	            redirect('home/index');	            
	        }
	}

	public function keluar_kustomer()
	{		
	    $this->session->unset_userdata('idpelanggan');
	    $this->session->unset_userdata('namapelanggan');
	    $this->session->unset_userdata('emailpelanggan');
	    redirect(base_url());
	}

}