
<?php
    $id=$this->session->userdata('idoperator');
		foreach ($result as $row) {
            
			$nama = $row->nama_agent;
			$alamat = $row->alamat;
			$ket = $row->ket;
            $foto=$row->foto;
			$hp = $row->hp;
			
		}

?>
<div class="x_panel">
                                <div class="x_title">
                                    <h2>Profil Agent Travel</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br /><?php
    $info= $this->session->flashdata('info');
    $info1= $this->session->flashdata('info1');
    $info2= $this->session->flashdata('info2');
    if($info!=""){
      echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
    }
    if($info1!=""){
      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
      foreach ($info1 as $in) 
      {
      	echo $in;
      }
      echo "</div>";
    }
    if($info2!=""){
      echo "<div class='alert alert-danger  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info2."</div>";
    }
    ?>
                                    <form action="<?php echo base_url('operator/agent/proses_ubah/'.$id);?>" id="demo-form2" name='form1' data-parsley-validate class="form-horizontal form-label-left" method="post" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Agent
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="nama" name="nama" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(!empty($nama)) echo $nama;?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Alamat
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="lokasi" name="alamat" required="required" class="form-control col-md-7 col-xs-12" value="<?php if(!empty($alamat)) echo $alamat;?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="url">Kontak
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" id="hpl" name="hp" class="form-control col-md-7 col-xs-12" value="<?php if(!empty($hp)) echo $hp;?>">
                                            </div>
                                        </div>
                                       

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="foto">Foto
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <?php if(isset($foto)) echo "<img src='".base_url('assets/photos/agent/'.$foto)."' class='img-responsive' style='max-width:200px;'><br>Ubah :<br> ";?>
                                                <input type="file" id="foto" name="foto"  class="btn btn-default col-md-7 col-xs-12">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="fasilitas" class="control-label col-md-3 col-sm-3 col-xs-12">Keterangan</label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                            	<textarea id="fasilitas" class="form-control col-md-7 col-xs-12" name="ket"><?php if(!empty($ket)) echo $ket;?></textarea>
                                                
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
