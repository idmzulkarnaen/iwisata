 <?php 
$this->load->helper("tanggalku_helper");
?>
 <!--Banner Area Start-->
        
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <div class="title-border">
                                <h1>Data-data <span>Paket Wisata</span></h1>
                            </div>    
                            <p class="text-white">Cek dan Lihatlah</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li>PaWi</li>
                        </ul>
                    </div>
                </div>
            </div>
        
        <!--End of Banner Area-->





        
        <!--Adventures Grid Start-->
        <div class="adventures-grid section-padding">
            <div class="container">
                <div class="row">
                    
                    <div class="clearfix"></div>
                    <?php foreach($result as $row):?>
                    <?php $sisa = 0;
                        $rsisa = $this->crud_model->selectData("reservasi","*","id_paket='$row->id_paket'");
                                    foreach ($rsisa as $r) {
                                        $sisa = $sisa+$r->jml_dewasa+$r->jml_anak;
                                    }
                        ?> 
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-adventure">
                            <a href="<?php echo base_url('paket_wisata/post/'.$row->id_paket)?>"><img src="<?php echo base_url('assets/photos/paket/'.$row->img);?>" alt="" style="max-height:560px;max-width:375px"></a>
                            <div class="adventure-text effect-bottom">
                                <div class="transparent-overlay">
                                    <h4><a href="<?php echo base_url('paket_wisata/post/'.$row->id_paket)?>"><?php echo $row->nama_paket;?> | <span> <?php if($sisa==0):?><?php echo "kosong";?><?php else: ?>Terisi:<?php echo $sisa?><?php endif;?></span></a></h4>
                                    <span class="trip-time"><i class="fa fa-clock-o"></i><?php echo tanggal($row->tgl_berangkat)."-".tanggal($row->tgl_kembali);?></span>
                                    <span class="trip-level"><i class="fa fa-send-o"></i><?php if($sisa==0):?><?php echo "kosong";?><?php else: ?>terisi:<?php echo $sisa?><?php endif;?></span>
                                    <p><?php echo word_limiter(trim($row->ket), 10);?> </p>
                                </div>
                                <div class="adventure-price-link">
                                    <span class="">Harga:</span>
                                    <?php echo rupiah($row->harga);?>
                                    <div class="adventure-link">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-rss"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>              
    
                       
                </div>
                
            </div>
        </div>

        <!--End of Adventures Grid-->

        <div class="clearfix"></div>
                        <div class="pagination-content">
                            <div class="pagination-button">
                            <?php 
                            echo $halaman                
                            ?>
                            </div>
                        </div> 