
<div class="x_panel">
    <div class="x_title">
        <h2>Data Armada</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
        </ul>
         <div class="clearfix"></div>
    </div>
    <div class="x_content">
    <br />
    <?php
    $info= $this->session->flashdata('info');
    $info1= $this->session->flashdata('info1');
    $info2= $this->session->flashdata('info2');
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
    <a href="<?php echo base_url('operator/armada/tambah');?>" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
    <table id="example" class="table table-striped responsive-utilities jambo_table">
        <thead>
            <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>Opsi</th></tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        foreach ($result as $row) {
            echo "<tr><td>$no</td><td><img src='".base_url('assets/photos/armada/'.$row->foto)."' class='img-responsive' style='max-width:200px'/></td><td><a data-toggle='modal' data-target='#myModal".$no."' href='#'><b>$row->nama</b>  <i class='fa fa-external-link' style='font-size:8px'></i></a></td><td>";
            echo substr(strip_tags($row->ket),0,250);
            if(strlen(strip_tags($row->ket))>250)echo "............";
            echo "</td><td>";
            echo "<a href='".base_url('operator/armada/ubah_armada/'.$row->id_armada)."' class='btn btn-sm btn-success'><i class='fa fa-fw fa-edit'></i> Ubah</a>";
            ?>
            <a href="<?php echo base_url('aksi_operator/hapus?url=armada&tb=armada&fd=id_armada&id='.$row->id_armada);?>" class='btn btn-sm btn-danger'  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class='fa fa-fw fa-trash'></i> Hapus</a>
            <?php
            echo "</td></tr>";

            ?>

<div class="modal fade" id="myModal<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $no;?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $row->nama;?></h4>
      </div>
      <div class="modal-body">
        <?php 
        echo "
        <img src='".base_url('assets/photos/armada/'.$row->foto)."' class='img-responsive' style='max-width:450px'/><br /><br />
        
            <label>Keterangan :</label>";
            echo $row->ket;?>
      </div>
      <div class="modal-footer">
      

    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
    
      </div>
      </form>
    </div>
  </div>
</div>

            <?php
            $no++;
        }
        ?>
            
        </tbody>
    </table>
    </div>
</div>