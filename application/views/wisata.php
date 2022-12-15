<?= $this->session->flashdata('pesan'); ?>

<section class="content">
      
      
          <div class="card">
            <div class="card-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span>Tambah Wisata</a>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
          					<th>Gambar</th>
          					<th>Wisata</th>
          					<th>Deskripsi</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
          				<?php
                    $no=0;
                        foreach($data->result_array() as $a):
                            $no++;
                            $id=$a['id_wisata'];
                            $gambar=$a['gambar'];
                            $deskripsi=$a['deskripsi'];
                            $nama_wisata=$a['nama_wisata'];
                    ?>
                <tr>
                  <td><img src="<?php echo base_url().'uploads/'.$gambar;?>" style="width:90px;"></td>
                  <td><?php echo $nama_wisata;?></td>
                  <td><?php echo $deskripsi;?></td>
                  <td   style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalUpdate<?php echo $id;?>"><span class="fas fa-edit"></span></a>
                        <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
				      <?php endforeach;?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- ============ MODAL ADD WISATA =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Tambah Wisata</h3>                  
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'wisata/simpan_wisata'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-2" >Wisata</label>
                <div class="col-xs-8">
                    <input name="nama_wisata" class="form-control" type="text" placeholder="Objek Wisata..." required>
                </div>
            </div>
                   

            <div class="form-group">
                <label class="control-label col-xs-2" >Deskripsi</label>
                <div class="col-xs-8">
                    <textarea class="form-control" name="deskripsi" rows="10" cols="10"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Gambar</label>
                <div class="col-xs-8">
                    <input type="file" name="filefoto" required>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-primary btn-flat">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php
    $no=0;
    foreach($data->result_array() as $a):
      $no++;
      $id=$a['id_wisata'];
      $gambar=$a['gambar'];
      $deskripsi=$a['deskripsi'];
      $nama_wisata=$a['nama_wisata'];
?>
<!-- ============ MODAL EDIT WISATA =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Update Wisata</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'wisata/update_wisata'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-2" >Wisata</label>
                <div class="col-xs-8">
                    <input name="nama_wisata" value="<?php echo $nama_wisata;?>" class="form-control" type="text" placeholder="Objek Wisata..." required>
                </div>
            </div>
                   

            <div class="form-group">
                <label class="control-label col-xs-2" >Deskripsi</label>
                <div class="col-xs-8">
                    <textarea class="form-control" name="deskripsi" rows="10" cols="10"><?php echo $deskripsi;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Gambar</label>
                <div class="col-xs-8">
                    <input type="file" name="filefoto">
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <input type="hidden" name="kode" value="<?php echo $id;?>">
            <button class="btn btn-flat" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-primary btn-flat">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>

<?php endforeach;?>
	
	<?php
        $no=0;
        foreach($data->result_array() as $a):
            $no++;
            $id=$a['id_wisata'];
            $gambar=$a['gambar'];
            $nama_wisata=$a['nama_wisata'];
  ?>
	<!--Modal Hapus Post-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Wisata</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'wisata/hapus_wisata'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                          <p>Apakah Anda yakin mau menghapus wisata <b><?php echo $nama_wisata;?></b> ?</p>
                               
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
	<?php endforeach;?>