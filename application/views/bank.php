  <!-- Main content -->
  <section class="content">
           
          <div class="card">
             <div class="card-header">
              <a class="btn btn-success btn-flat" data-toggle="modal" data-target="#ModalAddNew"><span class="fa fa-plus"></span> Add New</a>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
					          <th style="width:70px;">Metode</th>
                    <th>No Rek.</th>
                    <th>Bank</th>
                    <th>Atas Nama</th>
                    <th style="text-align:right;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
  					foreach ($data->result_array() as $i) :
  					   $no++;
                       $id=$i['id_metode'];
                       $metode=$i['metode'];
                       $bank=$i['bank'];
                       $norek=$i['norek'];
                       $atasnama=$i['atasnama'];
                       
                    ?>
                <tr>
                  <td><b><?php echo $metode;?></b></td>
                  <td><?php echo $norek;?></td>
                  <td><?php echo $bank;?></td>
                  <td><?php echo $atasnama;?></td>
                  <td style="text-align:right;">
                        <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $id;?>"><span class="fa fa-edit"></span></a>
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

    <!--Modal Add New Rekening-->
    <div class="modal fade" id="ModalAddNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Add New</h4>
            </div>
              <form class="form-horizontal" action="<?php echo base_url().'bank/simpan_rekening'?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">          

                  <div class="form-group">
                      <label class="control-label col-xs-3" >No Rek.</label>
                      <div class="col-xs-8">
                          <input name="norek" class="form-control" type="text" placeholder="No Rek." required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Bank</label>
                      <div class="col-xs-8">
                          <input name="bank" class="form-control" type="text" placeholder="Bank" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-xs-3" >Atas Nama</label>
                      <div class="col-xs-8">
                          <input name="atasnama" class="form-control" type="text" placeholder="Atas Nama" required>
                      </div>
                  </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                </div>
              </form>
          </div>
        </div>
    </div>

<?php foreach ($data->result_array() as $i) :
              $id=$i['id_metode'];
              $metode=$i['metode'];
              $bank=$i['bank'];
              $norek=$i['norek'];
              $atasnama=$i['atasnama'];
            ?>
  <!--Modal Add New Rekening-->
    <div class="modal fade" id="ModalEdit<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
              <h4 class="modal-title" id="myModalLabel">Update Rekening</h4>
            </div>
              <form class="form-horizontal" action="<?php echo base_url().'bank/update_rekening'?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">          

                  <div class="form-group">
                      <label class="control-label col-xs-3" >No Rek.</label>
                      <div class="col-xs-8">
                          <input name="norek" value="<?php echo $norek;?>" class="form-control" type="text" placeholder="No Rek." required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Bank</label>
                      <div class="col-xs-8">
                          <input name="bank" value="<?php echo $bank;?>" class="form-control" type="text" placeholder="Bank" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label col-xs-3" >Atas Nama</label>
                      <div class="col-xs-8">
                          <input name="atasnama" value="<?php echo $atasnama;?>" class="form-control" type="text" placeholder="Atas Nama" required>
                      </div>
                  </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="kode" value="<?php echo $id;?>">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat">Update</button>
                </div>
              </form>
          </div>
        </div>
    </div>
<?php endforeach;?>

	<?php foreach ($data->result_array() as $i) :
              $id=$i['id_metode'];
              $metode=$i['metode'];
              $bank=$i['bank'];
              $norek=$i['norek'];
              $atasnama=$i['atasnama'];
            ?>
	<!--Modal Hapus Rekening-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Bank</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'bank/hapus_rekening'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus rekening bank <b><?php echo $bank;?></b>?</p>
                               
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