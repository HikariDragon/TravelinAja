   <!-- Main content -->
   <section class="content">
     
           
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example3" class="table table-striped">
                <thead>
                <tr>
					          <th style="width:70px;">No</th>
                    <th>Nama</th>
                    <th>Pesan</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
  					foreach ($data->result_array() as $a) :
  					          $no++;
                      $id=$a['idtestimoni'];
                      $nama=$a['nama'];
                      $email=$a['email'];
                      $pesan=$a['pesan'];
                      $status=$a['status'];
                      $tglpost=$a['tgl_post']; 
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $nama; ?></td>
                  <td><?php echo $pesan; ?></td>
                  <td style="text-align:right;">
                      <a class="btn" href="<?php echo base_url().'testimonial/publish/'.$id?>" title="Publish"><span class="fa fa-check"></span></a>
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

    <!-- ./wrapper -->

	
	<?php foreach ($data->result_array() as $a) :
              $id=$a['idtestimoni'];
              $nama=$a['nama'];
              $email=$a['email'];
              $pesan=$a['pesan'];
              $status=$a['status'];
              $tglpost=$a['tgl_post']; 
            ?>
	<!--Modal Hapus Inbox-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Testimonial</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'testimonial/hapus_testimoni'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus testimoni dari <b><?php echo $nama;?></b>?</p>
                               
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