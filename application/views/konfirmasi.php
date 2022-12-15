 <!-- Main content -->
 <section class="content">
           
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-striped" style="font-size:12px;">
                <thead>
                <tr>
					          <th style="text-align:center;width: 120px;vertical-align:middle;">No Invoice</th>
                    <th style="text-align:center;width: 160px;vertical-align:middle;">Tgl Transfer</th>
                    <th style="text-align:center;width: 140px;vertical-align:middle;">Total Bayar</th>
                    <th style="text-align:center;width: 140px;vertical-align:middle;">Jumlah Transfer</th>
                    <th style="text-align:center;width: 200px;vertical-align:middle;">Pengirim</th>
                    <th style="text-align:center;width:100px;">Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$no=0;
  					foreach ($data->result_array() as $a) :
  					    $no++;
                $id=$a['id_bayar'];
                $tgl_bayar=$a['tgl_bayar'];
                $metode=$a['metode'];
                $bank=$a['bank'];
                $invoice=$a['order_id'];
                $jml=$a['jumlah'];
                $bukti=$a['bukti_transfer'];
                $status=$a['status'];
                $pengirim=$a['pengirim'];
                $total=$a['total'];
                           
          ?>
            <tr>
                <td style="text-align: center;vertical-align:middle;"><?php echo $invoice; ?></td>
                <td style="text-align: center;vertical-align:middle;"><?php echo $tgl_bayar; ?></td>
                <td style="text-align: right;vertical-align:middle;"><b><?php echo 'Rp. '.number_format($total); ?></b></td>
                <td style="text-align: right;vertical-align:middle;"><b><?php echo 'Rp. '.number_format($jml); ?></b></td>
                <td style="text-align: center;vertical-align:middle;"><?php echo $pengirim; ?></td>
                <td style="text-align: center;vertical-align: middle;">
                    <a class="btn" href="#ModalCheckBukti<?php echo $id?>" data-toggle="modal" title="Lihat Bukti Transfer"><span class="fa fa-eye"></span> </a>
                    <a class="btn" href="#ModalHapus<?php echo $id;?>" data-toggle="modal" title="Hapus"><span class="fa fa-trash"></span> </a>
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

    <!-- ============ MODAL EDIT ORDER =============== -->
<?php
    foreach($data->result_array() as $a):
            $no++;
            $id=$a['id_bayar'];
            $tgl_bayar=$a['tgl_bayar'];
            $metode=$a['metode'];
            $bank=$a['bank'];
            $invoice=$a['order_id'];
            $jml=$a['jumlah'];
            $bukti=$a['bukti_transfer'];
            $status=$a['status'];
            $pengirim=$a['pengirim'];
            $total=$a['total'];
        ?>
        <div id="ModalCheckBukti<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                <h3 class="modal-title" id="myModalLabel">Bukti Transfer</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'konfirmasi/pembayaran_selesai'?>">
                <div class="modal-body">
                    <input name="kode" type="hidden" value="<?php echo $invoice;?>">
                    <img height="500" src="<?php echo base_url().'assets/images/'.$bukti;?>">

          </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button type="submit" class="btn btn-primary">Ok</button>
                </div>
            </form>
        </div>
        </div>
        </div>
    <?php endforeach;?>

	
	<?php foreach ($data->result_array() as $a) :
        $id=$a['id_bayar'];
        $tgl_bayar=$a['tgl_bayar'];
        $metode=$a['metode'];
        $bank=$a['bank'];
        $invoice=$a['order_id'];
        $jml=$a['jumlah'];
        $bukti=$a['bukti_transfer'];
        $status=$a['status'];
        $pengirim=$a['pengirim'];
        $total=$a['total'];
  ?>
	<!--Modal Hapus Order-->
        <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Konfirmasi</h4>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'konfirmasi/hapus_konfirmasi'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">       
							       <input type="hidden" name="kode" value="<?php echo $id;?>"/> 
                            <p>Apakah Anda yakin mau menghapus konfirmasi dari <b><?php echo $pengirim;?></b>?</p>
                               
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