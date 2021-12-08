<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Armada extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model'); 
	   $this->load->model('cek_model');  

	}

	public function index()
	{		
		$this->cek_model->cekoperator();
		$data['konten']="operator/armada";
		$data['title']="Armada";
		$data['judul']="Armada";
		$id_operator = $this->session->userdata('idoperator');
		$data['result']=$this->crud_model->selectData("armada","*","id_operator='$id_operator' order by id_armada asc");
		$this->load->view('operator/index',$data);
	}

	public function tambah()
	{		
		$this->cek_model->cekoperator();
		$data['konten']="operator/armada_tambah";
		$data['title']="Armada Tambah";
		$data['judul']="Armada Tambah";
		$this->load->view('operator/index',$data);
	}

	public function proses_tambah()
	{
		$nama = $this->input->post('nama');
        $ket = $this->input->post('ket');
        $id_operator=$this->session->userdata('idoperator');
        $config['upload_path']          = BASEPATH.'../assets/photos/armada/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;

        $upload= $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('info1',$error);
                        redirect('operator/armada');
                }
                else
                {
                	
                        $data =  $this->upload->data();
                        $save = $this->crud_model->saveData("armada","id_armada,id_operator,nama,ket,foto","null,'".$id_operator."','".$nama."','".$ket."','".$data['file_name']."'");
                        
                        if($save){
                        	$this->session->set_flashdata('info',"Armada berhasil ditambah");
                        	redirect('operator/armada');
                        }else{
                        	$this->session->set_flashdata('info',"Armada gagal ditambah");
                        	redirect('operator/armada/tambah');
                        }
                        
                }
	}

	public function ubah_armada($id)
	{
		$this->cek_model->cekoperator();
		$data['konten']="operator/armada_ubah";
		$data['title']="Ubah Armada";
		$data['judul']="Armada";
		$data['result']=$this->crud_model->selectData("armada","*","id_armada='$id'");
		$this->load->view('operator/index',$data);
	}

	public function proses_ubah($id)
	{
		$nama = $this->input->post('nama');
        $ket = $this->input->post('ket');

        if( $_FILES['foto']['tmp_name']!=""){
	        $config['upload_path']          = BASEPATH.'../assets/photos/armada/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;

	        $upload= $this->load->library('upload');
	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('foto'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->session->set_flashdata('info1',$error);
	                        redirect('operator/armada/ubah');
	                }
	                else
	                {
	                		$data =  $this->upload->data();
	                		$query = $this->crud_model->selectData('armada',"*","id_armada='$id'");
							foreach ($query as $row) {
								unlink(BASEPATH.'../assets/photos/armada/'.$row->foto);
							}	                                              
	                         $update = $this->crud_model->updateData("armada","nama='".$nama."',ket='".$ket."',foto='".$data['file_name']."'","id_armada='$id'");
	                }
	       	}
        else{
           	  $update = $this->crud_model->updateData("armada","nama='".$nama."',ket='".$ket."'","id_armada='$id'"); 
        }

	    if($update){
	            $this->session->set_flashdata('info',"Objek wisata berhasil diubah");
	            redirect('operator/armada');                        
	        }else{
	            $this->session->set_flashdata('info2',"Objek wisata gagal diubah");
	            redirect('operator/ubah_armada/'.$id);
	        }
		
	}

}
