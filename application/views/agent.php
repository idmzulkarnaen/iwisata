<div class="container">
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li>Agent</li>
                        </ul>
                    </div>
                </div>
</div>
<!--Blog Area Start-->
        <div class="blog-area section-padding">
            <div class="container">              
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <div class="title-border">
                                <h1>TIM <span>AGENSI</span></h1>
                            </div>
                            <p>memberikan informasi tentang agensi-agensi yang ada di Indonesia<br> dari tahap pelayanan, harga, sektor objek wisata dan pelayanan khusus lainnya.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="blog-carousel">
                    <?php foreach($result as $row):?>
                        <div class="col-md-6">
                            <div class="single-blog hover-effect">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="blog-image box-hover">
                                            <a href="<?php echo base_url('agent/post_agent/'.$row->id_agent)?>"><img src="<?php echo base_url('assets/photos/agent/'.$row->foto);?>" alt=""></a>
                                            <div class="date-time">
                                                <span class="month">Agent</span>
                                                <?php echo br(2);?>
                                                <span class="month">Kami</span>
                                            </div>
                                        </div>
                                        <div class="blog-link">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-linkedin"></i></a>
                                            <a href="#"><i class="fa fa-rss"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 margin-left">
                                        <div class="blog-text">
                                            <h4><a href=""><?php echo $row->nama_agent;?></a></h4>
                                            <p>keterangan : <?php echo word_limiter(trim($row->ket), 3);?><br/>
                                            No handphone : <?php echo $row->hp;?><br/>
                                            </p>
                                            <a href="<?php echo base_url('agent/post_agent/'.$row->id_agent)?>" class="button-one">Klik Info Lanjut</a>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    <?php endforeach;?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--End of Blog Area-->
<div class="blog-comments">                           
                            
</div>