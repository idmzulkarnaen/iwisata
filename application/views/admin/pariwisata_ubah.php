<?php
foreach ($result as $row) {        
        $id = $row->id_wisata;
		$nama = $row->nm_wisata;
		$lokasi = $row->lokasi;
		$url = $row->url;
		$img = $row->img;
		$fasilitas = $row->fasilitas;
		$info = $row->info;
        $tag = $row->id_tag;
        $hotel = $row->hotel;
        $transpot = $row->transpot;
        $harga = $row->harga;
    }
 ?>

 <div class="x_panel">
                        <div class="x_title">
                                    <h2>Tambah Objek Wisata</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    
                                    <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                        <br />
                                    <?php
                                    $info= $this->session->flashdata('info');
                                    $info1= $this->session->flashdata('info1');
                                    $info2= $this->session->flashdata('info2');
                                    ?>
                                    <?php
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
                                    <form action="<?php echo base_url('operator/pariwisata/proses_ubah/'.$id);?>" id="demo-form2" enctype="multipart/form-data" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama wisata<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Lokasi<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="lokasi" name="lokasi" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $lokasi; ?>">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tag">Kategori
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select name="tag" class="form-control">
                                                     <?php
                                                        foreach ($rkat as $kat) {
                                                            echo "<option value='$kat->id_tag' ";
                                                            if(!empty($tag)){
                                                                if($tag==$kat->id_tag) echo "selected";
                                                        }
                                                        echo " >$kat->nama_tag</option>";
                                                    }?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Website
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="url" name="url" class="form-control col-md-7 col-xs-12" value="<?php echo $url; ?>">
                                            </div>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Gambar<sup style="color:red">*</sup>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">    
                                            <?php if(isset($img)) echo "<img src='".base_url('assets/photos/pariwisata/'.$img)."' class='img-responsive' style='max-width:200px;max-height:422;'><br>Ubah :<br> ";?>                                                                                    
                                                <input type="file" id="foto" name="foto"  class="btn btn-default col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label for="fasilitas" class="control-label col-md-3 col-sm-3 col-xs-12">Fasilitas</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea id="fasilitas" class="form-control col-md-7 col-xs-12" name="fasilitas">
                                                	<?php echo $fasilitas;?>
                                                </textarea>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="deskripsi" class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea id="deskripsi" class="form-control col-md-7 col-xs-12" name="deskripsi">
                                                <?php echo trim($row->info);?>                                                    
                                                </textarea>                                                
                                            </div>
                                        </div>                                      



                                        
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>
                                        NB :<BR>
                                        <sup style="color:red">*</sup>  Harus diisi

                                    </form>
                        </div>
<script type="text/javascript">
    if ( typeof CKEDITOR == 'undefined' )
    {
        document.write('CKEditor not found');
    }
    else
    {
        var editor = CKEDITOR.replace( 'fasilitas' );

    }
</script>
</div>