
<?php
$this->load->helper("Tanggalku_helper");
if($aksi=="daftar"){
?>

<div class="x_panel">
    <div class="x_title">
        <h2>Periode</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="#" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a href="#" class="close-link"><i class="fa fa-close"></i></a></li>
        </ul>
         <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <form action="<?php echo base_url('operator/pemesanan');?>" method="post">
        <div class="col-md-3">Bulan 
        <select name="bln" class="form-control">
            <?php
            $thn = date('Y');
            $sthn = $thn - 10;
            for ($i=1; $i <= 12; $i++) {
            if($i>9){
                echo "<option value='$i' ";
                if(date('m')==$i) echo "selected";
            } else{
                echo "<option value='0$i' ";
                if(date('m')=="0".$i) echo "selected";
            }
                
                echo " >".$this->cek_model->bulan("0".$i)."</option>";
            }
            
            ?>
        </select>
        </div>
        <div class="col-md-3">Tahun 
        <select name="thn" class="form-control">
            <?php
            $thn = date('Y');
            $sthn = $thn - 10;
            for ($i=$thn; $i >= $sthn; $i--) { 
                echo "<option value='$i'>$i</option>";
            }
            
            ?>
        </select>
        </div>

        <div class="col-md-6"><br>
        <button type="submit" class="btn btn-info" name="cari"><i class="fa fa-search"></i> Cari</button>
        <a href="<?php echo base_url('operator/pemesanan');?>" class="btn btn-default">Tampilkan Semua</a>
        
        </div>
    </form>
    
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <h2>Data Pemesanan Paket Wisata</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="#" class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a href="#" class="close-link"><i class="fa fa-close"></i></a></li>
        </ul>
         <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br />
    <?php
    $info= $this->session->flashdata('info');
    $info1= $this->session->flashdata('info1');
    $info2= $this->session->flashdata('info2');
    if($info!=""){
      echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
    }
    if($info1!=""){
      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
      foreach ($info1 as $in) {
      	echo $in;
      }
      echo "</div>";
    }
    if($info2!=""){
      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info2."</div>";
    }
    ?>

    <div class="col-md-6">
    <?php
    if(isset($label)) echo $label;
    ?>
    &nbsp;
    </div>
    <div class="col-md-6 text-right">
    <form action="<?php echo base_url('operator/pemesanan/cetak');?>" method="post">
        <input type="hidden" value="<?php echo $sql1;?>" name="sql1">
        <input type="hidden" value="<?php echo $sql2;?>" name="sql2">
        <input type="hidden" value="<?php echo $sql3;?>" name="sql3">
        <input type="hidden" value="<?php if(isset($label)) echo $label;else echo " ";?>" name="label">
        <button type="submit" class="btn btn-info" name="cari"><i class="fa fa-print"></i> Cetak</button>

        </form>
    </div>
    <br><hr>
    <table id="example" class="table table-striped responsive-utilities jambo_table">
        <thead>
            <tr>
            <th>No</th>
            <th>ID Pemesanan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pesan</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        foreach ($result as $row) {
            $tharga = $row->harga*($row->jml_dewasa+$row->jml_anak);
            echo "<tr><td>$no</td><td>$row->id_reservasi</td><td>$row->nama_kustomer</td><td>$row->nama_paket</td><td>".rupiah($tharga)."</td><td>";
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


            echo "</td><td><a href='".base_url('operator/pemesanan/detail_pemesanan/'.$row->id_reservasi)."' class='btn btn-sm btn-success'><i class='fa fa-fw fa-list-alt'></i> Detail</a>";
            ?>
            <a href="<?php echo base_url('operator/pemesanan/hapus?url=pemesanan&tb=reservasi&fd=id_reservasi&id='.$row->id_reservasi);?>" class='btn btn-sm btn-danger'  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class='fa fa-fw fa-trash'></i> Hapus</a>
            <?php
            echo "</td></tr>";
            
            $no++;
        }
        ?>
            
        </tbody>
    </table>
    </div>
</div>
<?php

}else{

foreach ($result as $row) {
$tharga = $row->harga*($row->jml_dewasa+$row->jml_anak);
?>
<div class="col-md-6">
<div class="x_panel">
                                <div class="x_title">
                                    <h2>Data Pemesanan</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#" class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a href="#" class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <table class="table">
                                        <tr><td>ID Pemesanan</td><td>:</td><td><b><?php echo $row->id_reservasi;?></b></td></tr>
                                        <tr><td>Nama Kustomer</td><td>:</td><td><?php echo $row->nama_kustomer;?></td></tr>
                                        <tr><td>Paket Wisata</td><td>:</td><td><?php echo $row->nama_paket;?></td></tr>
                                        <tr><td>Armada</td><td>:</td><td><?php echo $row->nama_armada;?></td></tr>
                                        <tr><td>Jumlah Orang Dewasa</td><td>:</td><td><?php echo $row->jml_dewasa." Orang";?></td></tr>
                                        <tr><td>Jumlah Anak - Anak</td><td>:</td><td><?php if($row->jml_anak!="0") echo $row->jml_anak." Anak"; else echo "-";?></td></tr>
                                        <tr><td>Jumlah Harga</td><td>:</td><td><b><?php echo rupiah($tharga);?></b></td></tr>
                                        
                                    </table>
                                </div>
                            </div>

</div>
<div class="col-md-6">
<div class="x_panel">
                                <div class="x_title">
                                    <h2>Status Pembayaran</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a href="#" class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a href="#" class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <?php
                                $info= $this->session->flashdata('info');
                                if($info!=""){
                                  echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
                                }
                                ?>
                                    <form action="<?php echo base_url('operator/pemesanan/ubah_sts_pesan/'.$row->id_reservasi);?>" method="post">
                                    <select name="sts" class="form-control" <?php if($row->sts_pesan=="2") echo "disabled";?>>
                                        <option value="0" <?php if($row->sts_pesan=="0") echo "selected";?>>Belum mengirim bukti pembayaran</option>
                                        <option value="1" <?php if($row->sts_pesan=="1") echo "selected";?>>Menunggu konfirmasi agent travel</option>
                                        <option value="2" <?php if($row->sts_pesan=="2") echo "selected";?>>Pembayaran Lunas</option>
                                        <option value="3" <?php if($row->sts_pesan=="3") echo "selected";?>>Bukti pembayaran tidak valid</option>
                                    </select><br>
                                    <input type="submit" name="ubah" value="Ubah" class="btn btn-success">
                                    </form>
                                </div>
                            </div>

</div>


<?php
foreach ($result2 as $row2) {

?>
<div class="col-md-12">
<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-fw fa-money"></i> Data Pembayaran</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="#" class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a href="#" class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <div class="row">
    <div class="col-md-6">
        <table class="table table-striped">
        <tr><td>ID Pembayaran</td><td>:</td><td><?php echo $row2->id_pembayaran;?></td></tr>
        <tr><td>Dari Bank</td><td>:</td><td><?php echo $row2->bank;?></td></tr>
        <tr><td>Nama Pemilik Rekening</td><td>:</td><td><?php echo $row2->pemilik_rek;?></td></tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped">
        <tr><td>Jumlah Dana</td><td>:</td><td><?php echo rupiah($row2->dana);?></td></tr>
        <tr><td>Tanggal Bayar</td><td>:</td><td><?php echo konverstanggal($row2->tgl_bayar)?></td></tr>
        <tr><td>Tanggal Konfirmasi Pembayaran</td><td>:</td><td><?php echo konverstanggal($row2->tgl);?></td></tr>
        </table>
    </div>
    </div>
    <div class="row">
    <div class="col-md-12"><label>Gambar Bukti Pembayaran :</label><img src="<?php echo base_url('assets/images/bukti_bayar/'.$row2->foto);?>" class="img-responsive"></div>
    </div>


    </div>
</div>

</div>


<div class="col-md-12">
<div class="x_panel">
    <div class="x_title">
        <h2><i class="fa fa-fw fa-envelope"></i>Kirim Email Konfirmasi</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a href="#" class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>
            <li><a href="#" class="close-link"><i class="fa fa-close"></i></a>
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <?php
      
                $info2 = $this->session->flashdata('info2');
                if($info2!=""){
                  echo "<div class='alert alert-success  alert-dismissable' style='margin-top:5px'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info2."</div>";
                }
                ?>
        <form method="post" action="<?php echo base_url('aksi_operator/konfirmasi_email/'.$row->id_reservasi);?>">
        <table class="table">
        <tr>
        <td>Kepada </td><td>: </td><td><?php echo $row->email_kustomer;?>
        <input type="hidden" value="<?php echo $row->email_kustomer;?>" name="email_kustomer" class="form-control">
        <input type="hidden" value="<?php echo $row->email_operator;?>" name="email_operator" class="form-control">
        <input type="hidden" value="<?php echo $row->pwd_email;?>" name="pwd_email" class="form-control"></td></tr>
        <tr>
        <td>Subjek </td><td>: </td><td>
        <input type="text" name="subjek" value="Konfirmasi Pembayaran Pemesanan Paket Wisata" class="form-control"></td></tr>
        <tr>
        <td colspan="3">Pesan :
<textarea class="form-control" name="pesan" id="pesan">
<?php
if(!isset($pesan)){
    echo "<p><u><strong>Konfirmasi Pembayaran Berhasil</strong></u></p>

<p>Konfirmasi pembayaran paket wisata telah kami terima.<br /> Silahkan download kwitansi dan print kwitansi tersebut. kemudian bawa print kwitansi tersebut saat pemberangkatan, sebagai tanda bukti bahwa anda sudah membayar paket wisata.<br><br>
Terima kasih atas kepercayaan anda.</p>

<p>&nbsp;</p>

<p>Agent Travel,</p>";
}else{
    echo $pesan;
}
?>
</textarea><br>
        <input type="submit" name="submit" value="Kirim" class="btn btn-success"/></td></tr>
        </table>
        </form>

    </div>
    </div>
</div>
<?php
}
?>
</div>
<script type="text/javascript">
    if ( typeof CKEDITOR == 'undefined' )
    {
        document.write('CKEditor not found');
    }
    else
    {
        var editor = CKEDITOR.replace( 'pesan' );
    }
</script>

<?php
}
}
?>

<br>
