<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();
	   
	   $this->load->model('crud_model');   

	}

    public function index()
    {
        $data['aksi']="admin";       
        $this->load->view('admin/login',$data);
    }

	public function proses_login()
	{
			$username = $this->input->post('user');
	        $password = md5($this->input->post('pwd'));

	        $cek = $this->crud_model->cekData("admin","WHERE level='0' and BINARY user='".$username."'");
	        $ambildata = $this->crud_model->selectData("admin","*","level='0' and BINARY user='".$username."'");

	        foreach ($ambildata as $data) {
	            $idadmin = $data->id_admin;
	            $useradmin = $data->user;
	            $passadmin = $data->pwd;
	            $leveladmin = $data->level;

	        }

	        if($cek == 0) {
	            
	            $this->session->set_flashdata('info',"Username Salah");
	            redirect('admin/login');
	            
	        } else {
	            if($password != $passadmin) {
	                $this->session->set_flashdata('info',"Password salah");
	            	redirect('admin/login');
	            } else {
	                $this->session->set_userdata('idadmin',$idadmin);
	                $this->session->set_userdata('useradmin',$useradmin);
	                $this->session->set_userdata('namaadmin',$leveladmin);
	                redirect('admin/home');
	            }
	        }

	}


	public function signout()
	{
		$this->session->unset_userdata('idadmin');
	    $this->session->unset_userdata('useradmin');
	    redirect(base_url());
	}


}
?>