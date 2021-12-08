<!--Portfolio Area Start-->
        <div class="portfolio-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                        <h3>Pemesanan Paket Wisata</h3>       
                        </div>
                    </div>
                </div>
            </div>
        </div>

              
<!--End of Portfolio Area-->
<div class="portfolio-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 well">
                    	<?php
  						$id_kustomer = $this->session->userdata('idpelanggan');
						$info= $this->session->flashdata('info');
						if($info!=""){
      						echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
    					}
    					?>
    					<form method="POST" action="<?php if($id_kustomer!="") echo base_url('paket_wisata/pemesanan'); else echo base_url('paket_wisata/register');?>">
    						<input id="id_paket" type="hidden" name="id_paket" value="<?php echo $id_paket;?>">
    						<?php if($id_kustomer==""):?>
    						<h3>Info pelanggan</h3>
    						<table class="table">
    							<tr>
    								<td>No KTP</td>
    								<td>
    									<input  name="ktp" type="text" placeholder="No KTP ANDA" class="form input-sm" required="" >
    								</td>
    							</tr>
    							<tr>
    								<td>Nama Lengkap</td>
    								<td>
    									<input  name="nama" type="text" placeholder="Isikan nama lengkap" class="form input-sm" required="" >
        
    								</td>
    							</tr>
    							<tr>
    								<td>Tanggal Lahir</td>
    								<td>
    									<input id="tgl" name="tgl" type="date" placeholder="" class="form input-sm" required="">
    								</td>
    							</tr>
    							<tr>
    								<td> Jenis Kelamin</td>
    								<td>
    									<input type="radio" name="jk" id="jenis_kelamin-0" value="l" checked="" /> Laki - laki
            							<input type="radio" name="jk" id="jenis_kelamin-1" value="p"/> Perempuan
    								</td>
    							</tr>
    							<tr>
    								<td>Alamat</td>
    								<td>
    									<textarea class="form" name="alamat" required=""></textarea>
    								</td>
    							</tr>
    							<tr>
    								<td>Nomor Telepon</td>
    								<td><input name="hp" type="text" placeholder="" class="form input-sm" required=""></td>
    							</tr>
    						</table>
    						<?php echo br();?>
    						<h3>Email dan Password</h3>

    						<table class="table">
    							<tr>
    								<td>Email</td>
    								<td>
    									
    									<input name="email" type="email" placeholder="xxx@XXX.XX" class="form input-sm" required="">
    								</td>
    							</tr>
    							<tr>
    								<td>Password</td>
    								<td>
    									<input name="pwd" type="password" placeholder="" class="form input-sm" required="">
    								</td>
    							</tr>

    						</table>
    					<?php endif;?>

    					<table class="table">
    						<tr>
    							<td>Dewasa</td>
    							<td>
    								<input  name="jdewasa" type="number" placeholder="" class="form input-sm" required="">
    							</td>
    						</tr>
    						<tr>
    							<td>Anak-anak</td>
    							<td>
    								<input name="janak" type="number" placeholder="" class="form input-sm">
    							</td>
    						</tr>
    					</table>
    					
                         <div class="form-group">
				          <label class="col-md-4 control-label" for="submit"></label>
				          <div class="col-md-8">
				          <input type="submit" name="submit" class="btn btn-default" value="Submit"  onclick="return confirm('Apakah anda yakin data yang anda kirimkan benar dan ingin melanjutkan pemesanan paket wisata ?')" />
				          </div>
				        </div>
    					</form>

                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>