<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	public function __Construct()
	{
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	   $this->load->model('cek_model');
	   $this->cek_model->cekoperator();	   
	}

	public function index()
	{
		$data['konten']="operator/pemesanan";
		$data['title']="Pemesanan";
		$data['judul']="Pemesanan";
		$data['aksi']="daftar";
		$id_operator=$this->session->userdata('idoperator');
		$bln = $this->input->post('bln');
		if($bln!=""){
			$thn = $this->input->post('thn');
			$data['label'] = "Periode : ".$this->cek_model->bulan($bln)." ".$thn;
			$sql1 = "reservasi a join paket_wisata b on a.id_paket=b.id_paket join armada c on b.id_armada=c.id_armada join admin d on c.id_operator = d.id_admin join kustomer e on a.id_kustomer = e.id_kustomer";
			$sql2 = "*, c.nama as nama_armada, a.sts as sts_pesan, e.nama as nama_kustomer";
			$sql3 = "d.id_admin='$id_operator' and date_format(a.tgl, '%m')='$bln' and date_format(a.tgl, '%Y')='$thn' order by a.tgl desc";
			
		}else{
			$sql1 = "reservasi a join paket_wisata b on a.id_paket=b.id_paket join armada c on b.id_armada=c.id_armada join admin d on c.id_operator = d.id_admin join kustomer e on a.id_kustomer = e.id_kustomer";
			$sql2 = "*, c.nama as nama_armada, a.sts as sts_pesan, e.nama as nama_kustomer";
			$sql3 = "d.id_admin='$id_operator' order by a.tgl desc";
			
		}
		$data['sql1']=$sql1;
		$data['sql2']=$sql2;
		$data['sql3']=$sql3;
		$data['result']=$this->crud_model->selectData($sql1,$sql2,$sql3);
		
		$this->load->view('operator/index',$data);
	}

	public function detail_pemesanan($id)
	{
		$data['konten']="operator/pemesanan";
		$data['title']="Pemesanan";
		$data['judul']="Pemesanan";
		$data['aksi']="detail";
		$id_operator=$this->session->userdata('idoperator');
		$data['result']=$this->crud_model->selectData("reservasi a join paket_wisata b on a.id_paket=b.id_paket join armada c on b.id_armada=c.id_armada join admin d on c.id_operator = d.id_admin join kustomer e on a.id_kustomer = e.id_kustomer","*, c.nama as nama_armada, a.sts as sts_pesan, e.nama as nama_kustomer, d.email as email_operator, e.email as email_kustomer","d.id_admin='$id_operator' and a.id_reservasi='$id' order by a.tgl desc");
		$data['result2']=$this->crud_model->selectData("pembayaran","*","id_reservasi='$id'");
		$this->load->view('operator/index',$data);
	}

	public function ubah_sts_pesan($id)
    {
        $sts = $this->input->post('sts');
        $this->crud_model->updateData("reservasi","sts='".$sts."'","id_reservasi='".$id."'");
        $this->session->set_flashdata("info","Status Diubah");
        redirect('operator/pemesanan/detail_pemesanan/'.$id);
    }

    public function hapus()
	{
		$url = $this->input->get('url');
		$tb = $this->input->get('tb');
		$fd = $this->input->get('fd');
		$id = $this->input->get('id');
        if($tb=="reservasi"){
            $cekres = $this->crud_model->cekData('pembayaran',"where id_reservasi='$id'");
            if($cekres>0){
                $query = $this->crud_model->selectData('pembayaran',"*","id_reservasi='$id'");
                            foreach ($query as $row) {
                                unlink(BASEPATH.'../assets/images/bukti_bayar/'.$row->foto);
                            }
                $del = $this->crud_model->deleteData("pembayaran","id_reservasi='$id'");
            }
        }

		$this->crud_model->deleteData($tb,$fd."='".$id."'");	    
	    $this->session->set_flashdata("info","Data dihapus");
	    redirect('operator/'.$url);
	}

	public function cetak()
	{
		$sql1 = $this->input->post('sql1');
		$sql2 = $this->input->post('sql2');
		$sql3 = $this->input->post('sql3');
		$data['label'] = $this->input->post('label');
		$id_operator = $this->session->userdata('idoperator');
		$data['result']=$this->crud_model->selectData($sql1,$sql2,$sql3);
		$this->load->view('operator/print',$data);
	}

}