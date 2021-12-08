<div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $title?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php
                                    $info= $this->session->flashdata('info');
                                    if($info!=""){
                                      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
                                    }
                                    ?>
                                    <br />
                                    <form action="<?php echo base_url('operator/paket_wisata/proses_tambah');?>" id="demo-form2" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Paket Wisata
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Armada
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select id="armada" name="armada" required="required" class="form-control col-md-7 col-xs-12">
                                                <?php
                                                foreach ($rarmada as $row) {
                                                	echo "<option value='$row->id_armada' ";
                                                    if(isset($id_armada)){ if ($row->id_armada==$id_armada) echo "selected";}
                                                    echo " >$row->nama</option>";
                                                }
                                                ?>
                                                	
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tgklb">Tgl Berangkat
                                            </label>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <input type="date" id="tglb" name="tglb" required="required" class="form-control col-md-3 col-xs-12" value="">
                                            </div>
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tglk">Tgl Kembali
                                            </label>
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <input type="date" id="tglk" name="tglk" required="required" class="form-control col-md-3 col-xs-12" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Harga
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="input-group"><span class="input-group-addon" id="basic-addon2">Rp. </span><input type="text" id="harga" name="harga" required="required" class="form-control col-md-7 col-xs-12" value=""></div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Tujuan Wisata
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12"  style="padding:3px;overflow:auto;width:auto;max-height:500px">
                                            <table class="table table striped ">
                                                <?php
                                                foreach ($rwisata as $row) {

                                                	echo "<tr><td><input type='checkbox' name='wisata[]' ";
                                                    if(isset($id)){
                                                        $cek = $this->crud_model->cekData("detail_paket","where id_paket='$id' and id_wisata='$row->id_wisata'");
                                                        if($cek>0) echo " checked ";
                                                    }
                                                    echo " value='$row->id_wisata'/>&nbsp;&nbsp;&nbsp;$row->nm_wisata</td></tr>";
                                                }
                                                ?>
                                            </table> 
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Tempat Penjemputan
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="nama" name="jemput" required="required" class="form-control col-md-7 col-xs-12" value="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="stok">Stok
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="stok" name="stok" required="required" class="form-control col-md-7 col-xs-12" value="">
                                            </div>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Gambar
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<?php if(isset($foto)) echo "<img src='".base_url('assets/photos/paket/'.$foto)."' class='img-responsive' style='max-width:200px;'><br>Ubah :<br> ";?>
                                                <input type="file" id="foto" name="foto" required="required" class="btn btn-default col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Keterangan
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea id="ket" class="form-control col-md-7 col-xs-12" required="required" name="ket"></textarea>
                                            </div>
                                        </div>

                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>



<script type="text/javascript">
    if ( typeof CKEDITOR == 'undefined' )
    {
        document.write('CKEditor not found');
    }
    else
    {
        var editor = CKEDITOR.replace( 'ket' );
    }
</script>
