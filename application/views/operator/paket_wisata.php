<?php 
$this->load->helper("tanggalku_helper");
?>
<div class="x_panel">
    <div class="x_title">
        <h2>Data Paket Wisata</h2>
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
    <a href="<?php echo base_url('operator/paket_wisata/tambah');?>" class="btn btn-primary"><i class="fa fa-plus-square"></i> Tambah</a>
    <table id="example" class="table table-striped responsive-utilities jambo_table">
        <thead>
            <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Nama Paket</th>
            <th>Keterangan</th>
            <th>Stok</th>
            <th>Sisa</th>
            <th>Status</th>
            <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no=1;
        foreach ($result as $row) {
            $sisa = 0;
            $rsisa = $this->crud_model->selectData("reservasi","*","id_paket='$row->id_paket'");
            foreach ($rsisa as $r) {
                $sisa = $sisa+$r->jml_dewasa+$r->jml_anak;
            }

            $sisa = $row->stok-$sisa;

            echo "<tr><td>$no</td><td><img src='".base_url('assets/photos/paket/'.$row->img)."' class='img-responsive' style='max-width:170px'/></td><td><a data-toggle='modal' data-target='#myModal".$no."' href='#'><b>$row->nama_paket</b>  <i class='fa fa-external-link' style='font-size:8px'></i></a></td><td>";
            echo substr(strip_tags($row->ket_paket),0,150);
            if(strlen(strip_tags($row->ket_paket))>150)echo "............";
            echo "</td><td>$row->stok</td><td>$sisa</td><td>";
            if($row->sts=="0"){ echo "<a href='".base_url('operator/paket_wisata/ubah_sts_paket?sts=1&id='.$row->id_paket)."' title='aktifkan' class='btn btn-default'>Tidak aktif &nbsp;&nbsp;&nbsp;<i class='fa fa-toggle-off'></i>";
            }else{ echo "<a href='".base_url('operator/paket_wisata/ubah_sts_paket?sts=0&id='.$row->id_paket)."' title='tidak aktifkan' class='btn btn-default'>Aktif &nbsp;&nbsp;&nbsp;<i class='fa fa-toggle-on'></i>";}
            echo "</a></td><td>";
            if($row->tgl_berangkat>date('Y-m-d')){
            echo "<a href='".base_url('operator/ubah_paket/'.$row->id_paket)."' class='btn btn-sm btn-success'><i class='fa fa-fw fa-edit'></i> Ubah</a>";
            ?>
            <a href="<?php echo base_url('operator/paket_wisata/hapus?url=paket_wisata&tb=paket_wisata&fd=id_paket&id='.$row->id_paket);?>" class='btn btn-sm btn-danger'  onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class='fa fa-fw fa-trash'></i> Hapus</a>
            <?php
            }
            if($row->tgl_kembali<date('Y-m-d')){
            echo "<a href='".base_url('operator/laporan_paket/'.$row->id_paket)."' class='btn btn-sm btn-warning'><i class='fa fa-fw fa-file-pdf-o'></i> Laporan</a>";
            }
            echo "</td></tr>";
            ?>

<div class="modal fade" id="myModal<?php echo $no;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $no;?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="post">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $row->nama_paket;?></h4>
      </div>
      <div class="modal-body">
        <?php 
        echo "
        <img src='".base_url('assets/photos/paket/'.$row->img)."' class='img-responsive' style='max-width:450px'/><br /><br />
        <label>Armada :</label><br />$row->nama<br /><br />
        <label>Objek Wisata :</label><br />";
            $wisata = $this->crud_model->selectData("detail_paket a join pariwisata b on a.id_wisata = b.id_wisata","*","a.id_paket='".$row->id_paket."'");
            foreach ($wisata as $rw) {
                echo $rw->nm_wisata.", ";
            }
            echo "<br /><br />
            <label>Tanggal Berangkat :</label><br />".tanggal($row->tgl_berangkat)."<br /><br />
            <label>Tanggal Kembali :</label><br />".tanggal($row->tgl_kembali)."<br /><br />
            <label>Harga :</label><br />".rupiah($row->harga)."<br /><br />
            <label>Deskripsi :</label>";
            echo $row->ket_paket;?>
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
 <script type="text/javascript" src="js/moment.min2.js"></script>
    <script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>