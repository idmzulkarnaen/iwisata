<div class='row'>

    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-users"></i>&nbsp;&nbsp;Daftar Data Wisata</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link" href="#"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li><a class="close-link" href="#"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

        



        <div class="x_content">
            <div class='col-md-12'>
            <a href='<?php echo base_url('operator/pariwisata/tambah_pariwisata');?>' class='btn btn-sm btn-primary'><i class='fa fa-fw fa-plus-square'></i> Tambah</a>

            <?php
                $info = $this->session->flashdata('info');
                if($info!=""){
                echo "<div class='alert alert-success  alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>".$info."</div>";
                }
            ?>
            
            <div class="box-body table-responsive">
                <table  id="example" class="table table-striped responsive-utilities jambo_table">
                    <thead>
                        <tr><th>No</th><th>Nama Wisata</th><th>Lokasi</th><th>Aksi</th></tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                        $sts ="";
                        foreach ($result as $row) {
                            
                            echo "<tr><td>$no</td><td>$row->nm_wisata</td><td>$row->lokasi</td><td><a href='".base_url('operator/pariwisata/ubah/'.$row->id_wisata)."' class='btn btn-sm btn-warning' title='Ubah'><i class='fa fa-fw fa-edit'></i> </a>";
                            ?>
                            <a href='<?php echo base_url('operator/pariwisata/hapus/'.$row->id_wisata);?>' class='btn btn-sm btn-danger' onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" title='Hapus' ><i class='fa fa-fw fa-trash'></i> </a>
                            <?php
                            echo "</td></tr>";
                            $no++;
                    }
                    ?>                        
                    </tbody>
                </table>
            </div>
    </div>
</div>




