<?php 
if($aksi=="pariwisata"):
?>
<?php
foreach ($result as $row) {        
        $id = $row->id_wisata;
		$nama = $row->nm_wisata;
		$lokasi = $row->lokasi;
		$url = $row->url;
		$img = $row->img;
		$fasilitas = $row->fasilitas;
		$info = $row->info;
        
        
    }
 ?>
<div class="container">
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li><?php echo $abc;?></li>
                        </ul>
                    </div>
                </div>
</div>

        <!--Blog Post Area Start-->
        <div class="blog-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <div class="sidebar-widget">
                            
                            <div class="clearfix"></div>
                            
                          
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="single-blog-post blog-post-details">
                            <div class="single-blog-post-img">
                            	
                            	

                            	<?php for ($x=1; $x <=3 ; $x++): ?>
                            		<img src="<?php echo base_url('assets/photos/pariwisata/'.$img);?>"  alt="" style='max-width:285px;max-height:422;'>
                            	<?php endfor; ?>                          	
                            	

                               
                                                               
                            </div>
                            <div class="single-blog-post-text">
                                <p class="dark-bold"><?php echo $nama?></p>
                                
                                <p><?php echo $fasilitas;?></p>
                                <?php echo $info;?>

                                
                                
                            </div>
                            
                        </div>
                        <div class="blog-comments">
                            
                            
                        </div>
                        
                    </div>       
                </div>
            </div>
        </div>
        <!--End of Blog Post Area -->
<?php elseif ($aksi=="agent"):?>
<?php
foreach ($result as $row) {        
        $id=$row->id_agent;
        $nama = $row->nama_agent;
        $alamat = $row->alamat;
        $ket = $row->ket;
        $foto=$row->foto;
        $hp = $row->hp;
    }
 ?>
<div class="container">
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li><?php echo $abc;?></li>
                        </ul>
                    </div>
                </div>
</div>

        <!--Blog Post Area Start-->
        <div class="blog-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <div class="sidebar-widget">
                            
                            <div class="clearfix"></div>
                            
                          
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="single-blog-post blog-post-details">
                            <div class="single-blog-post-img">
                                
                                

                                <?php for ($x=1; $x <=3 ; $x++): ?>
                                    <img src="<?php echo base_url('assets/photos/agent/'.$foto);?>"  alt="" style='max-width:285px;max-height:422;'>
                                <?php endfor; ?>                            
                                

                               
                                                               
                            </div>
                            <div class="single-blog-post-text">
                                <p class="dark-bold"><?php echo $nama;?></p>
                                
                                <p><?php echo "keterangan :".$ket.br();?></p>
                                <?php echo "no hp:".$hp.br();?>
                                <?php echo "alamat :".$alamat;?>
                                

                                
                                
                            </div>
                            
                        </div>
                        <div class="blog-comments">
                            
                            
                        </div>
                        
                    </div>       
                </div>
            </div>
        </div>
        <!--End of Blog Post Area -->

<?php elseif ($aksi=="paket_wisata"):?>
<?php 
$this->load->helper("tanggalku_helper");
?>
<?php foreach($result as $row):?>
    <?php
    $foto=$row->img;
    $jemput=$row->tmpt_jemput;
    $harga=$row->harga;
    $kursi=$row->stok;
    $id_paket=$row->id_paket;
    ?>
<?php endforeach;?>
    <?php $sisa = 0;
    $rsisa = $this->crud_model->selectData("reservasi","*","id_paket='$row->id_paket'");
    foreach ($rsisa as $r) {
        $sisa = $sisa+$r->jml_dewasa+$r->jml_anak;
    }
    ?> 


<div class="container">
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url('paket_wisata');?>">Home</a></li>
                            <li><?php echo $abc;?></li>
                        </ul>
                    </div>
                </div>
</div>

        <!--Blog Post Area Start-->
        <div class="blog-post-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-1">
                        <div class="sidebar-widget">
                            
                            <div class="clearfix"></div>
                            
                          
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="single-blog-post blog-post-details">
                            <div class="single-blog-post-img">
                                
                                

                                <?php for ($x=1; $x <=3 ; $x++): ?>
                                    <img src="<?php echo base_url('assets/photos/paket/'.$foto);?>"  alt="" style='max-width:285px;max-height:422;'>
                                <?php endfor; ?>                            
                                

                               
                                                               
                            </div>
                            <div class="single-blog-post-text">

                                <p class="dark-bold"></p>

                                <h3 class="bottom-line">Detail Paket Wisata</h3>
                                <table class="table" style="background:#fff">

                                <tr><td>Armada </td><td>:</td><td><?php if(!empty($armada)) echo $armada; else echo "-";?></td></tr>
                                <tr><td>Tanggal Berangkat </td><td>:</td><td><?php if(!empty(tanggal($row->tgl_berangkat))) echo tanggal($row->tgl_berangkat); else echo "-";?></td></tr>
                                <tr><td>Tanggal Kembali</td><td>:</td><td><?php if(!empty(tanggal($row->tgl_kembali))) echo tanggal($row->tgl_kembali); else echo "-";?></td></tr>
                                <tr><td>Tempat Penjemputan </td><td>:</td><td><?php if(!empty($jemput)) echo $jemput; else echo "-";?></td></tr>
                                <tr><td>Sisa </td><td>:</td><td><?php if(!empty($sisa)) echo $sisa." Tiket"; else echo "-";?></td></tr>
                                <tr><td>Total Kursi </td><td>:</td><td><?php if(!empty($kursi)) echo $kursi; else echo "-";?></td></tr>
                                <tr><td>Harga </td><td>:</td><td><?php if(!empty($harga)) echo $harga; else echo "-";?></td></tr>
                                </table>

                                
                                
                            </div>
                            <a href='<?php echo base_url('paket_wisata/pesan/'.$id_paket);?>' class='btn btn-default'> Pesan <i class='fa fa-shopping-cart'></i></a>
                            
                        </div>
                        <div class="blog-comments">
                            
                            
                        </div>
                        
                    </div>       
                </div>
            </div>
        </div>
        <!--End of Blog Post Area -->
<?php else:?>
<?php endif;?>