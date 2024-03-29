<!-- Main content -->
<section class="content">

           
          <div class="card">
            <div class="card-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Galeri</a>
            </div>
            <!-- /.box-header -->
            <div class="card-body">
              <table id="example3"  class="table table-bordered table-striped">
                <thead>
                <tr>
          					<th>Gambar</th>
                    <th>Judul</th>
          					<th>Album</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
          				<?php
                    $no=0;
                        foreach($data->result_array() as $a):
                            $no++;
                            $id=$a['id_galeri'];
                            $jdl_galeri=$a['jdl_galeri'];
                            $gambar=$a['gbr_galeri'];
                            $idalbum=$a['albumid'];
                            $jdl_album=$a['jdl_album'];
                    ?>
                <tr>
                  <td><img class="img-thumbnail" width="90" height="80" src="<?php echo base_url().'uploads/'.$gambar; ?>"></td>
                  <td style="vertical-align:middle;"><?php echo $jdl_galeri; ?></td>
                  <td style="vertical-align:middle;"><?php echo $jdl_album; ?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalUpdate<?php echo $id;?>"><span class="fa fa-edit"></span></a>
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

  <!-- ============ MODAL ADD PHOTO =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Add Photo</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button> 
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'galeri/simpan_galeri'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >Judul</label>
                <div class="col-xs-8">
                    <input name="judul" class="form-control" type="text" placeholder="Judul" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Album</label>
                <div class="col-xs-8">
                    <select name="album" class="form-control" required>
                        <?php               
                            foreach($alm->result_array() as $i){
                              $kode=$i['idalbum'];
                              $nama=$i['jdl_album'];
                        ?>
                            <option value='<?php echo $kode?>'><?php echo $nama?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Gambar</label>
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
      $id=$a['id_galeri'];
      $jdl_galeri=$a['jdl_galeri'];
      $gambar=$a['gbr_galeri'];
      $idalbum=$a['albumid'];
      $jdl_album=$a['jdl_album'];
?>
<!-- ============ MODAL UPDATE PHOTO =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Update Photo</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'galeri/update_galeri'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-3" >Judul</label>
                <div class="col-xs-8">
                    <input name="judul" value="<?php echo $jdl_galeri;?>" class="form-control" type="text" placeholder="Judul" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Album</label>
                <div class="col-xs-8">
                    <select name="album" class="form-control" required>
                        <?php               
                            foreach($alm->result_array() as $i):
                              $kode=$i['idalbum'];
                              $nama=$i['jdl_album'];
                        ?>
                          <?php if($idalbum==$kode):?>
                            <option value='<?php echo $kode?>' selected><?php echo $nama?></option>
                          <?php else:?>
                            <option value='<?php echo $kode?>'><?php echo $nama?></option>
                          <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3" >Gambar</label>
                <div class="col-xs-9">
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
            $id=$a['id_galeri'];
            $jdl_galeri=$a['jdl_galeri'];
            $gambar=$a['gbr_galeri'];
            $idalbum=$a['albumid'];
            $jdl_album=$a['jdl_album'];
  ?>
	<!--Modal Hapus PHOTO-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Photo</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'galeri/hapus_galeri'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                          <p>Apakah Anda yakin mau menghapus Photo <b><?php echo $jdl_galeri;?></b> ?</p>
                               
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