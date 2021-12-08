<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_wisata extends CI_Controller {

	public function __Construct()
	{
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	   $this->load->model('cek_model');
	}

	public function index()
	{
		$data['konten']="operator/paket_wisata";
		$data['title']="paket wisata";
		$data['judul']="Paket Wisata";
		$id_operator=$this->session->userdata('idoperator');
		$data['result']=$this->crud_model->selectData("paket_wisata a join armada b on a.id_armada=b.id_armada","*, a.ket as ket_paket","b.id_operator='$id_operator' order by sts desc, id_paket asc");
		$this->load->view('operator/index',$data);
	}

	public function tambah()
	{
		$data['konten']="operator/paket_wisata_tambah";
		$data['title']="paket wisata";
		$data['judul']="Paket Wisata";
		$id_operator=$this->session->userdata('idoperator');
		$data['rarmada']=$this->crud_model->selectData("armada","*","id_operator='$id_operator' order by nama");
		$data['rwisata']=$this->crud_model->selectData("pariwisata order by nm_wisata");
		$this->load->view('operator/index',$data);
	}

	public function proses_tambah()
	{
        $nama = $this->input->post('nama');
        $armada = $this->input->post('armada');
        $harga = $this->input->post('harga');
        $ket = $this->input->post('ket');
        $wisata = $this->input->post('wisata');
        $jemput = $this->input->post('jemput');
        $stok = $this->input->post('stok');
        $id_operator=$this->session->userdata('idoperator');
		$tglb = $this->input->post('tglb');
        $tglk = $this->input->post('tglk');    

        if($tglb>=strtotime('+14 days', strtotime(date('Y-m-d')))){
            $this->session->set_flashdata('info',"Tanggal berangkat minimal 2 minggu setelah pembuatan paket wisata");
            redirect('operator/tambah_paket');
        }

        if($tglk>strtotime('+7 days', strtotime($tglb))){
            $this->session->set_flashdata('info',"Lama wisata maksimal 1 minggu");
            redirect('operator/tambah_paket');
        }

        if($tglb>$tglk){
            $this->session->set_flashdata('info',"Lama wisata minimal 1 hari");
            redirect('operator/tambah_paket');
        }

        $config['upload_path']          = BASEPATH.'../assets/photos/paket/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;

        $upload= $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('info1',$error);
                        redirect('operator/paket_wisata');
                }
                else
                {
                	
                    $id_paket = $this->crud_model->newId("paket_wisata","id_paket");

                        $data =  $this->upload->data();
                        $save = $this->crud_model->saveData("paket_wisata","id_paket,id_armada,nama_paket,tgl_berangkat,tgl_kembali,harga,ket,img,sts,stok,tmpt_jemput","'".$id_paket."','".$armada."','".$nama."','".$tglb."','".$tglk."','".$harga."','".$ket."','".$data['file_name']."','1','".$stok."','".$jemput."'");
                        
                        if($save){
                            foreach ($wisata as $row) {
                                $save2 = $this->crud_model->saveData("detail_paket","id_detailpaket,id_paket,id_wisata","null,'".$id_paket."','".$row."'");
                            }
                        	$this->session->set_flashdata('info',"Paket wisata berhasil ditambah");
                        	redirect('operator/paket_wisata');
                        }else{
                        	$this->session->set_flashdata('info',"Paket wisata gagal ditambah");
                        	redirect('operator/paket_wisata/tambah');
                        }
                        
                }
	}

    public function ubah_sts_paket()
    {
        $sts = $this->input->get('sts');
        $id = $this->input->get('id');
        $this->crud_model->updateData("paket_wisata","sts='".$sts."'","id_paket='".$id."'");
        $this->session->set_flashdata("info","Status Diubah");
        redirect('operator/paket_wisata');
    }

    public function hapus()
    {
        $url = $this->input->get('url');
        $tb = $this->input->get('tb');
        $fd = $this->input->get('fd');
        $id = $this->input->get('id');


        if($tb=="paket_wisata"){
            $query = $this->crud_model->selectData('paket_wisata',"*","id_paket='$id'");
                        foreach ($query as $row) {
                            unlink(BASEPATH.'../assets/photos/paket/'.$row->img);
                        }
            $del = $this->crud_model->deleteData("detail_paket","id_paket='$id'");

        }

        $this->crud_model->deleteData($tb,$fd."='".$id."'");
        
        $this->session->set_flashdata("info","Data dihapus");
        redirect('operator/'.$url);
    }

}
