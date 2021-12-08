
        <!--Portfolio Area Start-->
        <div class="portfolio-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <div class="title-border">
                                <h1>Objek <span>Wisata</span></h1>
                            </div>    
                            <p>Untuk memberikan informasi tentang<br> pengetahuan-pengetahuan yang menarik <br>seputar Objek Wisata-wisata yang ada di INDONESIA tercinta</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                <?php foreach($result as $row):?>
                    <div class="col-md-3 col-sm-4">                        
                        <div class="single-portfolio">
                            <a href="<?php echo base_url('home/post/'.$row->id_wisata)?>"><img src="<?php echo base_url('assets/photos/pariwisata/'.$row->img);?>" alt="" style='max-width:285px;max-height:422;'></a>
                            <div class="portfolio-text effect-bottom">
                                <h4><a href="<?php echo base_url('home/post/'.$row->id_wisata)?>"><?php echo trim($row->nm_wisata);?></a></h4>
                                <p><?php echo word_limiter(trim($row->info), 10);?></p>
                                <div class="portfolio-link">                                    
                                    <a href="<?php echo $row->url;?>"><i class="fa fa-rss"></i></a>
                                </div>
                            </div>
                        </div>                                               
                    </div>
                <?php endforeach; ?> 
                    
                    
                </div>
            </div>
        </div>
        <!--End of Portfolio Area-->
        <!--Newsletter Area Start-->
        <div class="newsletter-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-4 col-sm-12">
                        <div class="section-title text-center">
                            <div class="title-border">
                                <h1 class="text-white">Kenapa tentang? <span>KITA</span></h1>
                            </div>    
                            <p class="text-white">karena untuk memberikan informasi yang memadai kita akan 
                            berupaya untuk selalu berkembang demi kenyamanan para pengunjung yang sedang bingung mencari informasi pariwisata.</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!--End of Newsletter Area-->
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
                    <?php foreach($results as $row):?>
                        <div class="col-md-6">
                            <div class="single-blog hover-effect">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="blog-image box-hover">
                                            <a href="<?php echo base_url('home/post_agent/'.$row->id_agent)?>"><img src="<?php echo base_url('assets/photos/agent/'.$row->foto);?>" alt=""></a>
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
                                            <a href="<?php echo base_url('home/post_agent/'.$row->id_agent)?>" class="button-one">Klik Info Lanjut</a>
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

        
        <!--Fun Factor Area Start-->
        <div class="fun-factor-area text-center hidden-xs">
            <div class="container">                
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <div class="title-border">
                                <h1 class="text-white">Sesuatu <span>Info Menarik</span></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 col-sm-3">
                        <div class="single-fun-wrapper">
                            <div class="single-fun-factor">
                                <div class="fun-border-left"></div>
                                <img src="<?php echo base_url('assets/pengunjung/img/icon/5-hover.png');?>" alt="">
                                <h4>TEMPAT TUJUAN</h4>
                                <h5>keaslian wisata</h5>
                                <div class="fun-border-right"></div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <div class="single-fun-wrapper">
                            <div class="single-fun-factor">
                                <div class="fun-border-left"></div>
                                <img src="<?php echo base_url('assets/pengunjung/img/icon/8.png');?>" alt="">
                                <h4>Posisi</h4>
                                <h5>Indonesia</h5>
                                <div class="fun-border-right"></div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <div class="single-fun-wrapper">
                            <div class="single-fun-factor">
                                <div class="fun-border-left"></div>
                                <img src="<?php echo base_url('assets/pengunjung/img/icon/19-hover.png');?>" alt="">
                                <h4>Pelayanan</h4>
                                <h5>untuk pelanggan</h5>
                                <div class="fun-border-right"></div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-2 col-sm-3">
                        <div class="single-fun-wrapper">
                            <div class="single-fun-factor">
                                <div class="fun-border-left"></div>
                                <img src="<?php echo base_url('assets/pengunjung/img/icon/10.png');?>" alt="">
                                <h4>Pengalaman</h4>
                                <h5></h5>
                                <div class="fun-border-right"></div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-2 hidden-sm">
                        <div class="single-fun-wrapper">
                            <div class="single-fun-factor">
                                <div class="fun-border-left"></div>
                                <img src="<?php echo base_url('assets/pengunjung/img/icon/11.png');?>" alt="">
                                <h4>Alama</h4>
                                <h5>Segar dan Asri</h5>
                                <div class="fun-border-right"></div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-2 hidden-sm">
                        <div class="single-fun-wrapper">
                            <div class="single-fun-factor">
                                <div class="fun-border-left"></div>
                                <br>
                                <img src="<?php echo base_url('assets/pengunjung/img/icon/title3-icon-1.png');?>" alt="">
                                <h4>Penginapan</h4>
                                <h5>Yang Memadai</h5>
                                <div class="fun-border-right"></div>
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <!--End of Fun Factor Area-->
        
        
        <!--Team Area Start-->
        <div class="team-area section-padding">
            <div class="container">           
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <div class="title-border">
                                <h1>Anggota tim <span>Penta</span></h1>
                            </div>    
                            <p>orang yang bertanggung jawab atas website ini<br> beranggota sebagai berikut.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="single-member">
                            <div class="team-image">
                                <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/team/4.jpg');?>" alt=""></a>
                                <div class="member-text effect-bottom">
                                    <h4><a href="#">Idham Zulkarnaen | <span>Programmer</span></a></h4>
                                    <p>lahir di Indonesia dan bahasa keseharian bahasa sunda</p>
                                    <div class="member-link">
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

                    <div class="col-md-4 col-sm-6">
                        <div class="single-member">
                            <div class="team-image">
                                <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/team/5.jpg');?>" alt=""></a>
                                <div class="member-text effect-bottom">
                                    <h4><a href="#">Arnand A.F| <span>Analis</span></a></h4>
                                    <p>aku manusia yang mencari kebebasan</p>
                                    <div class="member-link">
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
                    <div class="col-md-4 hidden-sm">
                        <div class="single-member">
                            <div class="team-image">
                                <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/team/6.jpg');?>" alt=""></a>
                                <div class="member-text effect-bottom">
                                    <h4><a href="#">Arma K. | <span>Pemimpin</span></a></h4>
                                    <p>Saya adalah pemimpin tim PENTA.INC</p>
                                    <div class="member-link">
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

                    <div class="col-md-2 hidden-sm">                        
                    </div>

                    <div class="col-md-4 hidden-sm">
                        <div class="single-member">
                            <div class="team-image">
                                <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/team/7.jpg');?>" alt=""></a>
                                <div class="member-text effect-bottom">
                                    <h4><a href="#">Akhmad Fikron H.| <span>Try and Error</span></a></h4>
                                    <p>saya adalah penjelajah dan mengubah kesalahan menjadi benar</p>
                                    <div class="member-link">
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
                    <div class="col-md-4 hidden-sm">
                        <div class="single-member">
                            <div class="team-image">
                                <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/team/9.jpg');?>" alt=""></a>
                                <div class="member-text effect-bottom">
                                    <h4><a href="#">Terry W. | <span>Designer</span></a></h4>
                                    <p>saya adalah keindahan, keindahan menjadikan saya hidup dan nyaman</p>
                                    <div class="member-link">
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
                    <div class="col-md-2 hidden-sm">
                        
                    </div>
                </div>
            </div>
        </div>
        <!--End of Team Area-->
        <!--Partner Area Start-->
        <div class="partner-area section-bottom-padding">
            <div class="container">          
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <div class="title-border">
                                <h1>Our <span>Partners</span></h1>
                            </div>    
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="partner-carousel carousel-style-two">
                        <div class="col-md-3">
                            <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/brand/1.jpg');?>" alt=""></a>
                        </div>
                        <div class="col-md-3">
                            <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/brand/2.jpg');?>" alt=""></a>
                        </div>
                        <div class="col-md-3">
                            <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/brand/3.jpg');?>" alt=""></a>
                        </div>
                        <div class="col-md-3">
                            <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/brand/4.jpg');?>" alt=""></a>
                        </div>
                        <div class="col-md-3">
                            <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/brand/1.jpg');?>" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Partner Area-->