 <!-- Main content -->
 <section class="content">
          <div class="card">
            <div class="card-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Add New</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Id Paket</th>
                    <th>Gambar</th>
                    <th>Paket</th>
                    <th>Deskripsi</th>
                    <th style="text-align: right;">Tarif Dewasa</th>
                    <th style="text-align: right;">Tarif Anak-Anak</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $no=0;
                        foreach($data->result_array() as $a):
                            $no++;
                            $id=$a['idpaket'];
                            $gambar=$a['gambar'];                               
                            $nama_paket=$a['nama_paket'];
                            $deskripsi=$a['deskripsi'];
                            $kategori_id=$a['kategori_id'];
                            $hrg_dewasa=$a['hrg_dewasa'];
                            $hrg_anak=$a['hrg_anak'];
                            
                    ?>
                <tr>
                  <td><?php echo $id;?></td>
                  <td><img src="<?php echo base_url().'uploads/'.$gambar;?>" style="width:90px;"></td>                
                  <td><?php echo $nama_paket;?></td>
                  <td><?php echo $deskripsi;?></td>
                  <td style="text-align: right;"><?php echo 'Rp '.number_format($hrg_dewasa);?></td>
                  <td style="text-align: right;"><?php echo 'Rp '.number_format($hrg_anak);?></td>
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

    <!-- ============ MODAL ADD PAKET TOUR =============== -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="myModalLabel">Tambah Paket</h3>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'paket_tour/simpan_paket'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-2" >Paket</label>
                <div class="col-xs-8">
                    <input name="nama_paket" class="form-control" type="text" placeholder="Nama Paket" required>
                </div>
            </div>
                   

            <div class="form-group">
                <label class="control-label col-xs-2" >Deskripsi</label>
                <div class="col-xs-8">
                    <textarea class="form-control" name="deskripsi" rows="10" cols="10"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Kategori</label>
                <div class="col-xs-8">
                    <select name="kategori" class="form-control" required>
                      <option value="">-PILIH-</option>
                      <?php foreach($kat->result_array() as $k):
                        $idkat=$k['id_kategori'];
                        $kate=$k['kategori'];
                      ?>
                      <option value="<?php echo $idkat;?>"><?php echo $kate;?></option>
                      <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Tarif Dewasa</label>
                <div class="col-xs-8">
                    <input name="hrg_dewasa" class="form-control" type="text" placeholder="Tarif Dewasa" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Tarif Anak</label>
                <div class="col-xs-8">
                    <input name="hrg_anak" class="form-control" type="text" placeholder="Tarif Anak-Anak" required>
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
      $id=$a['idpaket'];
      $gambar=$a['gambar'];
      $nama_paket=$a['nama_paket'];
      $deskripsi=$a['deskripsi'];
      $hrg_dewasa=$a['hrg_dewasa'];
      $hrg_anak=$a['hrg_anak'];
      $kategori_id=$a['kategori_id'];
?>
<!-- ============ MODAL EDIT PAKET TOUR =============== -->
<div class="modal fade" id="ModalUpdate<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Paket</h3>
    </div>
    <form class="form-horizontal" method="post" action="<?php echo base_url().'paket_tour/update_paket'?>" enctype="multipart/form-data">
        <div class="modal-body">

            <div class="form-group">
                <label class="control-label col-xs-2" >Paket</label>
                <div class="col-xs-8">
                    <input name="nama_paket" value="<?php echo $nama_paket;?>" class="form-control" type="text" placeholder="Nama Paket" required>
                </div>
            </div>
                   

            <div class="form-group">
                <label class="control-label col-xs-2" >Deskripsi</label>
                <div class="col-xs-8">
                    <textarea class="form-control" name="deskripsi" rows="10" cols="10"><?php echo $deskripsi;?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Kategori</label>
                <div class="col-xs-8">
                    <select name="kategori" class="form-control" required>
                      <option value="">-PILIH-</option>
                      <?php foreach($kat->result_array() as $k):
                        $idkat=$k['id_kategori'];
                        $kate=$k['kategori'];
                      ?>
                      <?php if($idkat==$kategori_id):?>
                        <option value="<?php echo $idkat;?>" selected><?php echo $kate;?></option>
                      <?php else:?>
                        <option value="<?php echo $idkat;?>"><?php echo $kate;?></option>
                      <?php endif;?>
                      <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Tarif Dewasa</label>
                <div class="col-xs-8">
                    <input name="hrg_dewasa" value="<?php echo $hrg_dewasa;?>" class="form-control" type="text" placeholder="Tarif Dewasa" required>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-2" >Tarif Anak</label>
                <div class="col-xs-8">
                    <input name="hrg_anak" value="<?php echo $hrg_anak;?>" class="form-control" type="text" placeholder="Tarif Anak-Anak" required>
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
            $id=$a['idpaket'];
            $gambar=$a['gambar'];
            $nama_paket=$a['nama_paket'];
            $deskripsi=($a['deskripsi']);
            $hrg_dewasa=$a['hrg_dewasa'];
            $hrg_anak=$a['hrg_anak'];
            $kategori_id=$a['kategori_id'];
  ?>
  <!--Modal Hapus Post-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Paket</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'paket_tour/hapus_paket'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
                     <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                          <p>Apakah Anda yakin mau menghapus Paket <b><?php echo $nama_paket;?></b> ?</p>
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