<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kirimpembayaran extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	  
	   
	}

	public function index()
	{	
		$data['konten']="bukti_bayar";
		$data['judul']='membayar';
		$this->load->view('index',$data);
	}

	public function pembayaran()
    {
    	$id = $this->input->post('id');
        $tgl = $this->input->post('tgl');
        $bank = $this->input->post('bank');
        $nama = $this->input->post('nama');
        $dana = $this->input->post('dana');
        $email = $this->input->post('email');
    	$cek = $this->crud_model->cekData("reservasi a join kustomer b on a.id_kustomer=b.id_kustomer","where b.email='$email'");
    	if($cek>0){
        $config['upload_path']          = BASEPATH.'../assets/images/bukti_bayar/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;

        $upload= $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('foto'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('info1',$error);
                        redirect('Kirimpembayaran');
                }
                else
                {
                        $data =  $this->upload->data();
                        $save = $this->crud_model->saveData("pembayaran","id_pembayaran,id_reservasi,email,tgl,tgl_bayar,pemilik_rek,dana,bank,foto","null,'".$id."','".$email."',now(),'".$tgl."','".$nama."','".$dana."','".$bank."','".$data['file_name']."'");
                        
                        if($save){
                            $ubah = $this->crud_model->updateData("reservasi","sts='1'","id_reservasi='".$id."'");
                            $this->session->set_flashdata('info',"Bukti Pembayaran berhasil dikirim, Silahkan tunggu email konfirmasi dari Agent travel kami.<br> Jika dalam 3 hari setelah melakukan kirim bukti pembayaran anda tidak menerima email konfirmasi maka hendak menghubungi pihak Agent travel, agar email konfirmasi pembayaran dikirimkan");
                            redirect('Kirimpembayaran');
                        }else{
                            $this->session->set_flashdata('info2',"Bukti Pembayaran gagal dikirim");
                            redirect('Kirimpembayaran');
                        }
                        
                }

        }else{
        	$this->session->set_flashdata('info2',"Email atau ID Pemesanan tidak tersedia");
            redirect('Kirimpembayaran');
        }
    }
}