<?php
foreach ($result as $row) {
      $id = $row->id_armada;
      $nama = $row->nama;
      $ket = $row->ket;
      $foto = $row->foto;
    }
?>
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
                                    <br />
                                    <form action="<?php echo base_url('operator/armada/proses_ubah/'.$id);?>" id="demo-form2" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Keterangan
                                            </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                <textarea id="ket" class="form-control col-md-7 col-xs-12" required="required" name="ket"><?php echo $ket;?></textarea>
                                            </div>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto 
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            	<?php if(isset($foto)) echo "<img src='".base_url('assets/photos/armada/'.$foto)."' class='img-responsive' style='max-width:200px;'><br>Ubah :<br> ";?>
                                                <input type="file" id="foto" name="foto"  class="btn btn-default col-md-7 col-xs-12">
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