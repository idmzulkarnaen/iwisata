<div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
   
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-users"></i>&nbsp;&nbsp;Daftar Semua Operator</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href="#"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a href="#"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
                                    
    <?php
    $info= $this->session->flashdata('info');
    if($info!=""){
      echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
    }
    ?>
    <a href="<?php echo base_url('admin/tambah');?>" class='btn btn-sm btn-primary'><i class='fa fa-fw fa-plus'></i> Tambah</a>
    <hr>
    <table id="example" class="table table-striped responsive-utilities jambo_table">
    	<thead class="heading">
    		<tr><th>No</th><th>Username</th><th>Nama</th><th>Alamat</th><th>Email</th><th>Kontak</th><th>Status</th><th>Aksi</th></tr>
    	</thead>
    	<tbody>
    	<?php
    	$no=1;
    	foreach ($result as $row) {

    		echo "<tr><td>$no</td><td>$row->user</td><td>$row->nama</td><td>$row->alamat</td><td>$row->email</td><td>$row->hp</td><td>";
            if($row->sts=="0"){ echo "<a href='".base_url('admin/operator/ubah_sts_admin?sts=1&id='.$row->id_admin)."' title='aktifkan' class='btn btn-default'>Tidak aktif &nbsp;&nbsp;&nbsp;<i class='fa fa-toggle-off'></i>";
            }else{ echo "<a href='".base_url('admin/operator/ubah_sts_admin?sts=0&id='.$row->id_admin)."' title='tidak aktifkan' class='btn btn-default'>Aktif &nbsp;&nbsp;&nbsp;<i class='fa fa-toggle-on'></i>";}
           
            ?>
            <?php echo "</td></tr>";
    		$no++;
    	}
    	?>
    		
    	</tbody>
    </table>
    </div>
    </div>
    
    </div>
</div>