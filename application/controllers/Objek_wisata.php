<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Objek_wisata extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model'); 

	}

	public function index()
	{	
		$data['konten']='objek_wisata';
		$data['judul']='Objek Wisata';
		
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="current"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$config['base_url'] = base_url('objek_wisata/index/');
		$config['per_page'] = 4;
		$config['num_links'] = 3;
		$config['total_rows']=$this->db->get('pariwisata')->num_rows();
		$this->pagination->initialize($config);
		$data['halaman']=$this->pagination->create_links(); 		
		$data['result']=$this->db->get('pariwisata', $config['per_page'], $this->uri->segment(3))->result();
		$this->load->view('index',$data);
	}

	public function post($id)
	{
		$data['konten']='post';
		$data['judul']='informasi';
		$data['result']=$this->crud_model->selectData("pariwisata","*","id_wisata='$id' order by id_wisata desc");		
		$this->load->view('index',$data);
	}


}