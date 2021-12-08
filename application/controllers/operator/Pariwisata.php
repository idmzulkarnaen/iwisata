<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pariwisata extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	   $this->load->model('cek_model');
	   $this->cek_model->cekoperator();  

	}

	public function index()
	{		
		$data['konten']="operator/pariwisata";
		$data['title']="Dashboard";
		$data['judul']="Pariwisata";
		$data['result']=$this->crud_model->selectData("pariwisata order by nm_wisata asc");		
		$this->load->view('operator/index',$data);
	}

	public function tambah_pariwisata()
	{
		$data['konten']="operator/pariwisata_tambah";
		$data['title']="Tambah Objek Pariwisata";
		$data['judul']="Objek Wisata";
		$data['rkat']=$this->crud_model->selectData("tag");
		$this->load->view('operator/index',$data);
	}

	public function proses_tambah()
	{

		$nama = $this->input->post('nama');
        $lokasi = $this->input->post('lokasi');
        $tag = $this->input->post('tag');
        $url = $this->input->post('url');
        $fasilitas = $this->input->post('fasilitas');
        $deskripsi = $this->input->post('deskripsi');
        


		if( $_FILES['foto']['tmp_name']!=""){
	        $config['upload_path']          = BASEPATH.'../assets/photos/pariwisata/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1800;

	        $upload= $this->load->library('upload');
	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('foto'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->session->set_flashdata('info1',$error);
	                        redirect('operator/pariwisata/tambah_pariwisata');
	                }
	                else
	                {

	                        $data =  $this->upload->data();	                        
	                        $save = $this->crud_model->saveData("pariwisata","id_wisata,nm_wisata,url,lokasi,fasilitas,img,info,id_tag","null,'".$nama."','".$url."','".$lokasi."','".$fasilitas."','".$data['file_name']."','".$deskripsi."','".$tag."'");
	                        
	                }
	       	}
        else{
           	$save = $this->crud_model->saveData("pariwisata","id_wisata,nm_wisata,url,lokasi,fasilitas,info,id_tag","null,'".$nama."','".$url."','".$lokasi."','".$fasilitas."','".$deskripsi."','".$tag."'");
        }
	    
		if($save){
		    $this->session->set_flashdata('info',"Objek Wisata berhasil ditambah");
			redirect('operator/pariwisata');                        
		}else{
		    $this->session->set_flashdata('info2',"Objek wisata gagal ditambah");
		    redirect('operator/tambah_pariwisata');
	    }            

	}

	public function ubah($id)
	{
		$data['konten']="operator/pariwisata_ubah";
		$data['title']="Ubah objek pariwisata ";
		$data['judul']='';		
		$data['result']=$this->crud_model->selectData("pariwisata","*","id_wisata='$id' order by id_wisata desc");
		$this->load->view('operator/index',$data);
	}

	public function proses_ubah($id)
	{
		$nama = $this->input->post('nama');
        $lokasi = $this->input->post('lokasi');
        $tag = $this->input->post('tag');
        $url = $this->input->post('url');
        $fasilitas = $this->input->post('fasilitas');
        $deskripsi = $this->input->post('deskripsi');
        

		if( $_FILES['foto']['tmp_name']!=""){
	        $config['upload_path']          = BASEPATH.'../assets/photos/pariwisata/';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 1000;

	        $upload= $this->load->library('upload');
	        $this->upload->initialize($config);

	        if ( ! $this->upload->do_upload('foto'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->session->set_flashdata('info1',$error);
	                        redirect('operator/pariwisata/ubah');
	                }
	                else
	                {
	                		$data =  $this->upload->data();
	                		$query = $this->crud_model->selectData('pariwisata',"*","id_wisata='$id'");
							foreach ($query as $row) {
								unlink(BASEPATH.'../assets/photos/pariwisata/'.$row->foto);
							}	                                              
	                        $update = $this->crud_model->updateData("pariwisata","nm_wisata='".$nama."',url='".$url."',lokasi='".$lokasi."',fasilitas='".$fasilitas."',img='".$data['file_name']."',info='".$deskripsi."',id_tag='".$tag."'","id_wisata='".$id."'");
	                }
	       	}
        else{
           	 $update = $this->crud_model->updateData("pariwisata","nm_wisata='".$nama."',url='".$url."',lokasi='".$lokasi."',fasilitas='".$fasilitas."',info='".$deskripsi."',id_tag='".$tag."'","id_wisata='".$id."'");  
        }

	    if($update){
	            $this->session->set_flashdata('info',"Objek wisata berhasil diubah");
	            redirect('operator/pariwisata');                        
	        }else{
	            $this->session->set_flashdata('info2',"Objek wisata gagal diubah");
	            redirect('operator/pariwisata/'.$id);
	        }
	}


	public function hapus($id)
	{
		$query = $this->crud_model->selectData('pariwisata',"*","id_wisata='$id'");
			foreach ($query as $row) {
				unlink(BASEPATH.'../assets/photos/pariwisata/'.$row->foto);
			}

		$hapus = $this->crud_model->deleteData("pariwisata","id_wisata='$id'");

		if($hapus){
	            $this->session->set_flashdata('info',"Data Objek Wisata  berhasil dihapus");
	            redirect('operator/pariwisata/');                        
	        }else{
	            $this->session->set_flashdata('info2',"Data Objek Wisata  gagal dihapus");
	            redirect('operator/pariwisata/ubah/'.$id);
	        }
	}

}
