<!doctype html>
<html class="no-js" lang="">
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $judul;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/pengunjung/img/favicon.ico');?>">
		
		<!-- Google Fonts
		============================================ -->		
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,800' rel='stylesheet' type='text/css'>
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link href="<?php echo base_url('assets/pengunjung/css/bootstrap.min.css');?>" rel="stylesheet">
        
		<!-- Fontawsome CSS
		============================================ -->
        <link  href="<?php echo base_url('assets/pengunjung/css/font-awesome.min.css');?>" rel="stylesheet">
        
		<!-- owl.carousel CSS
		============================================ -->
        <link  href="<?php echo base_url('assets/pengunjung/css/owl.carousel.css');?>" rel="stylesheet">
        
		<!-- jquery-ui CSS
		============================================ -->
        <link  href="<?php echo base_url('assets/pengunjung/css/jquery-ui.css');?>" rel="stylesheet">
        
		<!-- meanmenu CSS
		============================================ -->
        <link  href="<?php echo base_url('assets/pengunjung/css/meanmenu.min.css');?>" rel="stylesheet">
        
		<!-- animate CSS
		============================================ -->
        <link  href="<?php echo base_url('assets/pengunjung/css/animate.css');?>" rel="stylesheet">
        
        <!-- nivo slider CSS
		============================================ -->
		<link  href="<?php echo base_url('assets/pengunjung/lib/nivo-slider/css/nivo-slider.css');?>" rel="stylesheet" type="text/css" />
		<link  href="<?php echo base_url('assets/pengunjung/lib/nivo-slider/css/preview.css');?>" rel="stylesheet" type="text/css" media="screen" />
        
		<!-- style CSS
		============================================ -->
        <link  href="<?php echo base_url('assets/pengunjung/style.css');?>" rel="stylesheet">
        
		<!-- responsive CSS
		============================================ -->
        <link  href="<?php echo base_url('assets/pengunjung/css/responsive.css');?>" rel="stylesheet">
        
		<!-- modernizr JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/vendor/modernizr-2.8.3.min.js');?>"></script>
    </head>
    <body>
        
        
        <!--Header Area Start-->
        <header>
              
            <!--Logo Mainmenu Start-->
            <div class="header-logo-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="logo-menu-bg">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <div class="logo">
                                            <a href="<?php base_url();?>"><img src="<?php echo base_url('assets/pengunjung/img/logo/logo.png');?>" alt="ADVENTURES"></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 hidden-sm hidden-xs">
                                        <div class="mainmenu">
                                            <nav>
                                                <ul id="nav">
                                                    <li><a href="<?php echo base_url();?>">Home</a></li>

                                                    <li><a href="<?php echo base_url('agent');?>">Agent</a></li>

                                                    <li><a href="<?php echo base_url('paket_wisata');?>">Paket Wisata</a></li>
                                                    
                                                    
                                                    <li><a href="<?php echo base_url('objek_wisata');?>">Objek Wisata</a></li>
                                                    <?php if(!$this->session->userdata('emailpelanggan')):?>
                                                    <li><a href="shop-grid-no-sidebar.html">Layanan</a>
                                                        <div class="megamenu">
                                                            <div class="megamenu-list clearfix">
                                                                <span class="border-hover">
                                                                    <a href="#" class="mega-image">                                                                                                                                         
                                                                        <?php echo img('assets/pengunjung/wow.jpg');?>   
                                                                    </a>
                                                                </span>
                                                                <span>                                          
                                                                    <p class="mega-title">Pelanggan</p>
                                                                    <a href="<?php echo base_url('masuk');?>">Login/Daftar</a>
                                                                    <a href="<?php echo base_url('kirimpembayaran');?>">Kirim Pembayaran</a>
                                                                    
                                                                </span>
                                                                <span>                                          
                                                                    <p class="mega-title">Agent Travel</p>
                                                                    <a href="<?php echo base_url('operator/login');?>">Login</a>
                                                                    <a href="<?php echo base_url('masuk_agent');?>">Daftar</a>                                                                   
                                                                </span>                                                               
                                                                
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php endif;?>
                                                    

                                                   
                                                <?php if($this->session->userdata('emailpelanggan')):?>
                                                    <li><a >Akun saya</a>
                                                        <div class="megamenu">
                                                            <div class="megamenu-list clearfix">
                                                                <span class="border-hover">
                                                                    <a href="#" class="mega-image">
                                                                    <?php echo img('assets/pengunjung/logout.jpg');?>
                                                                        
                                                                    </a>
                                                                </span>
                                                                <span>                                          
                                                                    <p class="mega-title">akun saya(<?php echo $this->session->userdata('namapelanggan');?>)</p>
                                                                    <a href="<?php echo base_url('masuk/ubah');?>">Ubah Akun</a>                                                                    
                                                                    <a href="<?php echo base_url('kirimpembayaran');?>">Kirim bayaran</a>
                                                                    <a href="<?php echo base_url('masuk/keluar_kustomer');?>">Log Out</a>
                                                                    
                                                                </span>                                                                                                                             
                                                                
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php endif;?>
                                                </ul>
                                            </nav>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
            <!--End of Logo Mainmenu-->
            <!-- Mobile Menu Area start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="<?php echo base_url();?>">Home</a></li>

                                        <li><a href="<?php echo base_url('agent');?>">Agent</a></li>

                                        <li><a href="<?php echo base_url('paket_wisata');?>">Paket Wisata</a></li>                                                 
                                        <li><a href="<?php echo base_url('objek_wisata');?>">Objek Wisata</a></li>
                                        <?php if(!$this->session->userdata('emailpelanggan')):?>
                                        <li class="drop-down"><a href="blog-1.html">layanan</a>
                                            <ul class="sub-menu">
                                                <li><a class="mega-title">Pelanggan</a></li>
                                                <li><a href="<?php echo base_url('masuk');?>">Login dan daftar</a></li>
                                                <li><a href="">Kirim Pembayaran</a></li>
                                                <li><a class="mega-title">Agent Travel</a></li>
                                                <li><a href="">Login dan daftar</a></li>
                                            </ul>                                            
                                        </li>                                                   
                                        <?php endif;?>                                        
                                         <?php if($this->session->userdata('emailpelanggan')):?>
                                        <li class="drop-down"><a href="">Akunku</a>
                                            <ul class="sub-menu">
                                                <li><a class="mega-title">Pelanggan</a></li>
                                                <li><a href="<?php echo base_url('kirimbayaran');?>">Kirim Pembayaran</a></li>
                                                <li><a href="">LogOut</a></li>
                                            </ul>                                            
                                        </li>
                                        <?php endif;?>
                                    </ul>
                                </nav>
                            </div>                  
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area end -->
        </header>
        <!--End of Header Area-->
        <!--Slider Area Start-->
        <div class="slider-area">
            <div class="preview-2">
            
                <div id="nivoslider" class="slides">                   
                    
                    <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/slider/slider-12.jpg');?>" alt="" title="#slider-1-caption1"/></a>
                    
                    <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/slider/slider-15.jpg');?>" alt="" title="#slider-1-caption1"/></a>
                    
                    <a href="#"><img src="<?php echo base_url('assets/pengunjung/img/slider/slider-16.jpg');?>" alt="" title="#slider-1-caption1"/></a>
                   
                </div> 
                <div id="slider-1-caption1" class="nivo-html-caption nivo-caption">
                    <div class="banner-content slider-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-content">
                                        <h1 class="title1">Adventures</h1>
                                        <h2 class="sub-title">Pesona Indonesia</h2>
                                        <h2 class="sub-title">AYO Pergi Bersama <span>kita</span></h2>
                                        <h4 class="sub-title"><?php $date="%Y - %m - %d";
                                                                $time = time();
                                                                echo br(2);
                                                                echo mdate($date,$time);                                                                
                                                                ?> </h2>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <!--End of Slider Area-->
        <?php 
            $info = $this->session->flashdata('info2');
            if($info!="")
            {
                echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
            }
        ?>  
        
        <?php $this->load->view($konten);?>
        
        <!--Footer Widget Area Start-->
        <div class="footer-widget-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4">
                        <div class="single-footer-widget contact-text-info">
                            <h4>Kontak Kami</h4>
                            <div class="footer-widget-list">
                                <ul>
                                    <li class="icon send">Kota Purwokerto selatan no 528 depan kampus STIMIK AMIKOM PURWOKERTO</li>
                                    <li class="icon envelope">admin@penta.com</li>
                                    <li class="icon phone">+ 628 666 8989 55</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 hidden-sm">
                        <div class="single-footer-widget">
                            <h4>Tentang Kami</h4>
                            <div class="footer-widget-list">
                                <ul class="widget-lists">
                                    <li>Meluas</li>
                                    <li>website uptodate</li>
                                    <li>website responsive</li>
                                    <li>memiliki tim yang jelas</li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-2 col-md-3 col-sm-3">
                        <div class="single-footer-widget">
                            <h4>Agent Terpercaya</h4>
                            <div class="footer-widget-list">
                                <ul class="widget-lists">
                                    <li><a href="#">Adventure</a></li>
                                    
                                    <li><a href="#">Safari Trip</a></li>
                                    <li><a href="#">Polar</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-link">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-rss"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="payment-image">
                            <img src="img/payment.png" alt="">
                        </div>    
                    </div>
                </div>
            </div>
        </div>
        <!--End of Footer Widget Area-->
        <!--Footer Area Start-->
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <span>Copyright © <?php $date="%Y";
                                            $time = time();                                                                
                                            echo mdate($date,$time);                                                                
                                            ?>  <a href="#">PENTA.INC</a>. All rights reserved.</span>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <nav>
                            <ul id="footer-menu">                          
                                                    
                                                
                                <li><a href="<?php echo base_url();?>">Home</a></li>
                                <li><a href="#">Agent</a></li>
                                <li><a href="<?php echo base_url('paket_wisata');?>">Paket Wisata</a></li>
                                <li><a href="<?php echo base_url('objek_wisata');?>">Objek Wisata</a></li>
                                <li><a href="#">layanan</a></li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Footer Area-->
        
        
		<!-- jquery
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/vendor/jquery-1.11.3.min.js');?>"></script>
        
		<!-- bootstrap JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/bootstrap.min.js');?>"></script>
        
        <!-- nivo slider js
		============================================ -->       
		<script src="<?php echo base_url('assets/pengunjung/lib/nivo-slider/js/jquery.nivo.slider.js');?>" type="text/javascript"></script>
		<script src="<?php echo base_url('assets/pengunjung/lib/nivo-slider/home.js');?>" type="text/javascript"></script>
		
		<!-- wow JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/wow.min.js');?>"></script>
        
		<!-- meanmenu JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/jquery.meanmenu.js');?>"></script>
        
		<!-- owl.carousel JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/owl.carousel.min.js');?>"></script>
        
		<!-- price-slider JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/jquery-price-slider.js');?>"></script>
        
		<!-- scrollUp JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/jquery.scrollUp.min.js');?>"></script>
        
		<!-- Waypoints JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/waypoints.min.js');?>"></script>
        
		<!-- Counter Up JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/jquery.counterup.min.js');?>"></script>
        
		<!-- plugins JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/plugins.js');?>"></script>
        
		<!-- main JS
		============================================ -->		
        <script src="<?php echo base_url('assets/pengunjung/js/main.js');?>"></script>
    </body>


</html>