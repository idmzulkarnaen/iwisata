<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_wisata extends CI_Controller {

	public function __Construct(){
	   parent ::__construct();	   
	   $this->load->model('crud_model');
	   $this->load->model('cek_model');
	   
	}

	public function index()
	{	
		$data['konten']='paket_wisata';
		$data['judul']='Paket Wisata';
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
		$config['base_url'] = base_url('paket_wisata/index/');
		$config['per_page'] = 4;
		$config['num_links'] = 3;
		$config['total_rows']=$this->crud_model->cekData("paket_wisata","where sts='1'");
		$this->pagination->initialize($config);
		$data['halaman']=$this->pagination->create_links();		 		
		$data['result']=$this->crud_model->selectData("paket_wisata where sts='1' order by id_paket desc, ".$config['per_page']);
		$this->load->view('index',$data);
	}

	public function post($id)
	{
		$data['konten']='post';
		$data['judul']='Paket Wisata';		
		$data['abc']='Pilwi';
		$data['aksi']='paket_wisata';		 
		$data['result']=$this->crud_model->selectData("paket_wisata where sts='1' and id_paket='".$id."' order by id_paket desc");
		$this->load->view('index',$data);
	}

	public function pesan($id)
	{
		$data['konten']='input_kustomer';
		$data['judul']='Input Pesan';
		$data['id_paket']=$id;
		$this->load->view('index',$data);
	}

	public function register()
	{
		$nama = $this->input->post('nama');
        $ktp = $this->input->post('ktp');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $pwd = $this->input->post('pwd');
        $hp = $this->input->post('hp');
        $jk = $this->input->post('jk');
        $tgl = $this->input->post('tgl');
        $jdewasa = $this->input->post('jdewasa');
        $janak = $this->input->post('janak');
        $id_paket = $this->input->post('id_paket');
        $id_kustomer = $this->crud_model->newId("kustomer","id_kustomer");

        $savekustomer=$this->crud_model->saveData("kustomer","id_kustomer,no_ktp,nama,alamat,email,pwd,jk,tgl_lahir,hp","'".$id_kustomer."','".$ktp."','".$nama."','".$alamat."','".$email."',md5('".$pwd."'),'".$jk."','".$tgl."','".$hp."'");

        if($savekustomer)
        {
        	$id_pelanggan = $this->session->set_userdata('idpelanggan',$id_kustomer);
        	$nama_pelanggan = $this->session->set_userdata('namapelanggan',$nama);
        	$email_pelanggan = $this->session->set_userdata('emailpelanggan',$email);
        	$id_kustomer=$this->session->userdata('idpelanggan');

        	$savereservasi = $this->crud_model->saveData("reservasi","id_reservasi,id_paket,id_kustomer,tgl,jml_dewasa,jml_anak,sts","null,'".$id_paket."','".$id_kustomer."',now(),'".$jdewasa."','".$janak."','0'");

        	if($savereservasi)
        	{
        		$ambildata=$this->crud_model->selectData("paket_wisata","*","id_paket='$id_paket'");
        		foreach ($ambildata as $row) {
        			$harga=$row->harga;
        		}

        		$tharga=$tharga*($jdewasa+$janak);
        		$this->session->set_flashdata('infobaru',"<h4>Silahkan anda melakukan pembayaran melalui transfer dengan jumlah dana <b>".$tharga."</b> kemudian upload bukti pembayaran anda berupa gambar</h4>");
        		redirect('paket_wisata/tampilkan');
        	}
        	else
        	{
        		$this->session->set_flashdata('info',"Gagal Reservasi");
            	redirect('paket_wisata/pesan/'.$id_paket);
        	}
        }else
        {
        	$this->session->set_flashdata('info',"Gagal Registrasi");
            redirect('paket_wisata/pesan/'.$id_paket);
        }
	}

	public function pemesanan()
	{
		$this->cek_model->cekkustomer();
		$jdewasa=$this->input->post('jdewasa');
		$janak=$this->input->post('janak');
		$id_paket=$this->input->post('id_paket');
		$id_kustomer=$this->session->userdata('idpelanggan');

		$jumlah=$dewasa+$janak;

		$result=$this->crud_model->selectData("paket_wisata","*","id_paket='$id_paket'");
		foreach ($result as $row) {
			$sisa=0;
			$rsisa=$this->crud_model->selectData("reservasi","*","id_paket='$row->id_paket'");
			foreach ($rsisa as $r) {
				$sisa=$sisa+$r->jml_dewasa+$r->jml_anak;
			}
			$sisa=$row->stok-$sisa;
		}

		if($jumlah>$sisa)
		{
			$this->session->set_flashdata('info',"Tiket dengan Jumlah yang anda pesan tidak tersedia. <br>Sisa tiket tersedia : $sisa tiket");
			redirect('paket_wisata/pesan/'.$id);
		}else
		{
			$id_pelanggan=$this->session->set_userdata('idpelanggan',$id_kustomer);
			$nama_pelanggan=$this->session->set_userdata('namapelanggan',$nama);
			$save=$this->crud_model->saveData("reservasi","id_reservasi,id_paket,id_kustomer,tgl,jml_dewasa,jml_anak,sts","null,'".$id_paket."','".$id_kustomer."',now(),'".$jdewasa."','".$janak."','0'");
			if($save)
			{
				redirect('paket_wisata/tampilkan');
			}
			else
			{
				$this->session->set_flashdata('info',"gagal Reservasi");
				redirect('paket_wisata/pesan/'.$id_paket);
			}
		}
	}

	public function tampilkan()
	{
		$this->cek_model->cekkustomer();
		$data['konten']='tampilkan';
		$data['judul']='tampilkan';
		$id_kustomer=$this->session->userdata('idpelanggan');
		$rbank=$this->crud_model->selectData("modul","*","judul = 'bank'");
		$rrek=$this->crud_model->selectData("modul","*"," judul = 'no_rekening'");
		$ratasnama=$this->crud_model->selectData("modul","*"," judul = 'atas_nama'");
		foreach ($rbank as $r) {
			$data['bank']=$r->isi;
		}
		foreach ($rrek as $r) {
			$data['rek']=$r->isi;
		}
		foreach ($ratasnama as $r) {
			$data['atasnama']=$r->isi;
		}
		$data['result']=$this->crud_model->selectData("reservasi a join paket_wisata b on a.id_paket=b.id_paket join armada c on b.id_armada=c.id_armada join admin d on c.id_operator = d.id_admin","*, c.nama as nama_armada, a.sts as sts_pesan","a.id_kustomer='$id_kustomer' order by a.tgl desc");
		$this->load->view('index',$data);
	}

}