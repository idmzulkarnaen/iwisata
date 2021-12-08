<div class="portfolio-area">
    <div class="container">
        <div class="row">
    	    <div class="col-md-12">
                <div class="section-title text-center">
                        <h3>Kirim Bukti Pembayaran</h3>       
                </div>
            </div>
        </div>
    </div>
</div>


<div class="portfolio-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 well">
        <?php 
		    $info= $this->session->flashdata('info');
			if($info!=""){
		      echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
		    }
		    $info1= $this->session->flashdata('info1');
			if($info1!=""){
		      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
		      foreach ($info1 as $i) {
		      	echo $i;
		      }
		      echo "</div>";
		    }
		    $info2= $this->session->flashdata('info2');
			if($info2!=""){
		      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info2."</div>";
		    }
	    ?>
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('kirimpembayaran/pembayaran');?>">

		<table class="table">
			<tr>
			<td>ID Pemesanan :  </td>
			<td><input type="text" name='id' class="form" ></td>
			</tr><tr>
			<td>Email :  </td>
			<td><input type="email" name='email' class="form" ></td>
			</tr><tr>
			<td>Nama Pemilik Rekening:  </td>
			<td><input type="text" name='nama' class="form"></td>
			</tr><tr>
			<td>Pembayaran dari bank :  </td>
			<td><select name='bank' class="form" required >
			<option value="Bank BRI">Bank BRI</option>
			<option value="Bank BNI">Bank BNI</option>
			<option value="Bank BCA">Bank BCA</option>
			<option value="Bank BII">Bank BII</option>
			<option value="Bank Mandiri">Bank Mandiri</option>
			<option value="Bank Syariah Mandiri">Bank Syariah Mandiri</option>
			<option value="Bank Niaga">Bank Niaga</option>
			<option value="Bank Mega">Bank Mega</option>
			<option value="Lippo Bank">Lippo Bank</option>
			<option value="Lainnya">Lainnya</option>
			</select></td>
			</tr><tr>
			<td>Jumlah dana :  </td>
			<td><div class="input-group"><span class="input-group-addon" id="basic-addon2">Rp. </span><input type="number" name='dana' class="form"  /></div></td>
			</tr><tr>
			<td>Tanggal pembayaran :  </td>
			<td><input type="date" name='tgl' class="form" required /></td>
			</tr><tr>
			<td>Scan/foto bukti pembayaran :  </td>
			<td><input type="file" name='foto' class="btn btn-default btn-sm" required /></td>
			</tr><tr>
			<td colspan="3" align="center" style="padding-top:30px"><input type="submit" name="submit" value="Konfirmasi" class="btn btn-default btn-sm" /></td>
			</tr>
			</table>
		</form>

                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>

