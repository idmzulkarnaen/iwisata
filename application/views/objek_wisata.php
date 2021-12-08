<div class="container">
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li>Obta</li>
                        </ul>
                    </div>
                </div>
</div>
<!--Portfolio Area Start-->
        <div class="portfolio-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                               
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
                <div class="clearfix"></div>
                        <div class="pagination-content">
                            <div class="pagination-button">
                            <?php 
                            echo $halaman                
                            ?>
                            </div>
                        </div>                                             
                </div>
            </div>
        </div>
<!--End of Portfolio Area-->
<div class="blog-comments">                           
                            
</div>