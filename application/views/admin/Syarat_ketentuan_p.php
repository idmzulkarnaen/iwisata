<?php
if(isset($result)){
    foreach ($result as $row) {
    	$konten2 = $row->isi;
    }
}

$info=$this->session->flashdata('info');
?>
<div class="row">
    <div class="col-md-12"><?php
    if($info!=""){
      echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
    }
    ?>
    <form method="post" action="<?php echo base_url('admin/Syarat_ketentuan_p');?>">
    	<textarea name="konten" id="konten" required placeholder='Post'><?php if(!empty($konten2))echo $konten2;?></textarea>
        <input type="hidden" value="<?php if(!empty($aksi))echo $aksi;?>" name="judul" class="btn btn-primary">
    	<br><input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
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
        var editor = CKEDITOR.replace( 'konten' );
    }
</script>