<!--Banner Area Start-->
        
            <div class="container">
                
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="breadcrumb">
                            <li><a href="<?php echo base_url()?>">Home</a></li>
                            <li>Sign Up</li>
                        </ul>
                    </div>
                </div>
            </div>
        
        <!--End of Banner Area-->
        <!--Sign In Form Start-->
        <div class="sign-in-area section-padding">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-12">
                        <div class="section-title text-center title-right">
                            <div class="title-border">
                                <h1>Buat <span>Akun</span> baru</h1>
                            </div>
                            <p>Daftar sekarang dan nikmati semua feature yang akan menjadi pengalaman indah anda <i class="fa fa-heart"></i></p>
                        </div>
                        <div class="sign-up-form">
                            <form action="<?php echo base_url('masuk_agent/proses_tambah_agent')?>" method="post">
                            <?php 
                            $info = $this->session->flashdata('info');
                            if($info!="")
                            {
                                echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
                            }
                            ?>
                                <input type="text" name="nama" type="text" class="form-box required" placeholder="nama Lengkap" value="<?php echo set_value('nama'); ?>">
                                <input type="text" name="user" type="text" class="form-box required" placeholder="username" value="<?php echo set_value('user'); ?>">
                                <input type="email" name="email" class="form-box required" placeholder="Email Address" value="<?php echo set_value('email'); ?>">
                                <input type="password" name="pwd" class="form-box" placeholder="Password" value="<?php echo set_value('pwd'); ?>">
                                <input type="password" name="pwd2" class="form-box" placeholder="Ulangi Password" value="<?php echo set_value('pwd2'); ?>">
                                <input type="text" name="hp" type="text" class="form-box required" placeholder="No Telp" value="<?php echo set_value('hp'); ?>">
                                <textarea class="form-control" placeholder="Alamat" name="alamat"><?php echo set_value('alamat'); ?></textarea> 
                                <?php echo br(2);?>                            
                                <input type="submit" class="submit-button" value="Signup">
                            </form>
                        </div>    
                    </div>
                </div>   
            </div>
        </div>
        <!--End of Sign In Form-->