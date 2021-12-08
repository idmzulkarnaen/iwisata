<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends CI_Controller {

	public function __Construct()
	{
	   parent ::__construct();	   
	   $this->load->model('crud_model'); 
	   $this->load->model('cek_model');
	   $this->cek_model->cekoperator(); 
	}

	public function index()	
	{
		$data['konten']="operator/agent";
		$data['title']="agent";
		$data['judul']="agent";
		$id_operator=$this->session->userdata('idoperator');
		$data['result']=$this->crud_model->selectData("agent","*","id_agent='$id_operator'");		
		$this->load->view('operator/index',$data);
	}

	public function proses_ubah($id)
	{

		$nama=$this->input->post('nama');
		$alamat=$this->input->post('alamat');
		$hp=$this->input->post('hp');
		$ket=$this->input->post('ket');


		if( $_FILES['foto']['tmp_name']!=""){
	        $config['upload_path']          = BASEPATH.'../assets/photos/agent/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;

	        $upload= $this->load->library('upload');
	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('foto'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->session->set_flashdata('info1',$error);
	                        redirect('operator/agent/index');
	                }
	                else
	                {
	                		$data =  $this->upload->data();
	                		$query = $this->crud_model->selectData('agent',"*","id_agent='$id'");
							foreach ($query as $row) {
								unlink(BASEPATH.'../assets/photos/agent/'.$row->foto);
							}	                                              
	                        $update = $this->crud_model->updateData("agent","nama_agent='".$nama."',alamat='".$alamat."',foto='".$data['file_name']."',hp='".$hp."',ket='".$ket."'","id_agent='".$id."'");
	                }
	       	}
        else{
           	 $update = $this->crud_model->updateData("agent","nama_agent='".$nama."',alamat='".$alamat."',hp='".$hp."',ket='".$ket."'","id_agent='".$id."'");  
        }

	    if($update){
	            $this->session->set_flashdata('info',"Profil telah diubah berhasil");
	            redirect('operator/agent');                        
	        }else{
	        	$update=$this->crud_model->saveData("agent","id_agent,nama_agent,alamat,hp,ket,foto","null,'".$nama."','".$alamat."','".$hp."','".$ket."','".$data['file_name']."'");
	            $this->session->set_flashdata('info1',"profil disimpan");
	            redirect('operator/agent/');
	        }
	}

}
