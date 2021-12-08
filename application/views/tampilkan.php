<?php
$this->load->helper("tanggalku_helper");
?>
		
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="section-title st-center">
							<br>
							<p>Pesanan Paket Wisata</p>
							<hr class="hr-style">
						</div>
					</div>
				</div>

				<?php 
			    
				foreach ($result as $row) {
					$tharga = $row->harga*( $row->jml_dewasa+ $row->jml_anak);
				?>
				<div style="background:#fff;padding: 1px 10px 0px 10px">
				<div class="row" >
					<div class="col-md-6 text-center">
					<h3 class="bottom-line">Data Pesanan</h3>
						<table class="table" style="background:#fff">
							<tr><td>ID Pesanan </td><td>:</td><td><b><?php echo $row->id_reservasi;?></b></td></tr>
							
							<tr><td>Jumlah orang dewasa</td><td>:</td><td><?php echo  $row->jml_dewasa." Orang";?></td></tr>
							<tr><td>Jumlah anak - anak </td><td>:</td><td><?php if($row->jml_anak!="0") echo $row->jml_anak." Anak"; else echo "-";?></td></tr>
							<tr><td>Total Harga </td><td>:</td><td><b><?php echo rupiah($tharga);?></b></td></tr>
							<tr><td>Status </td><td>:</td><td><?php 
							switch ($row->sts_pesan) {
								case '0':
									echo "Belum mengirim bukti pembayaran";
									break;

								case '1':
									echo "Menunggu konfirmasi agent travel";
									break;
								
								case '2':
									echo "Pembayaran Lunas";
									break;

								case '3':
									echo "Bukti pembayaran tidak valid";
									break;
								default:
									# code...
									break;
							}
							?></td></tr> 
						</table>
					</div>
					<div class="col-md-6">
						<h3 class="bottom-line">Data Paket Wisata</h3>
						<table class="table" style="background:#fff">

							<tr><td>Nama Paket </td><td>:</td><td><?php echo $row->nama_paket;?></td></tr>
							<tr><td>Aramada </td><td>:</td><td><?php echo $row->nama_armada;?></td></tr>
							<tr><td>Tanggal Berangakat </td><td>:</td><td><?php echo tanggal($row->tgl_berangkat);?></td></tr>
							<tr><td>Tanggal Kembali</td><td>:</td><td><?php echo tanggal($row->tgl_kembali);?></td></tr>
							<tr><td>Lama Tour </td><td>:</td><td><?php if(!empty($hotel)) echo $hotel; else echo "-";?></td></tr>
							<tr><td>Wisata </td><td>:</td><td><?php 
							$no=1;
							$rwisata=$this->crud_model->selectData("detail_paket a join pariwisata b on a.id_wisata=b.id_wisata","*","a.id_paket='$row->id_paket' order by b.nm_wisata asc");
							foreach ($rwisata as $r) {
								echo $no.". <a href='".base_url('wisata/detail_wisata/'.$r->id_wisata)."' >$r->nm_wisata</a><br>";
								$no++;
							}
							?></td></tr>
							<tr><td>Harga/Orang </td><td>:</td><td><?php echo rupiah($row->harga);?></td></tr>
							</table>
						

					</div>
				</div>
				<hr>
				<?php
				if($row->sts_pesan=="0"){
					echo "
				      <div class='row'>
						<div class='col-md-12'>
						<div class='alert alert-warning alert-dismissable' ><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4>
						Silahkan anda melakukan pembayaran melalui transfer ke bank $bank no rekening $rek A/N $atasnama dengan jumlah dana 
						<b>".rupiah($tharga)."</b> kemudian upload bukti pembayaran anda berupa gambar</h4></div>
						</div>
					  </div>";
				}
				  ?>
				  </div>
				<br>
				<hr>
				<?php 
				}
				?>
			</div>
