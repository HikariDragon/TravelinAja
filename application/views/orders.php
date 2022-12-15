 <!-- Main content -->
 <section class="content">

     <div class="card">
         <!-- /.card-header -->
         <div class="card-body">
             <table id="example3" class="table table-striped">
                 <thead>
                     <tr>
                         <th style="text-align:center;width: 130px;">No Invoice</th>
                         <th style="text-align:center;">Tgl Invoice</th>
                         <th style="text-align:center;">Atas Nama</th>
                         <th style="text-align:center;">Dewasa</th>
                         <th style="text-align:center;">Anak-Anak</th>
                         <th style="text-align:center;">Keberangkatan</th>
                         <th style="text-align:center;">Kepulangan</th>
                         <th style="text-align:center;">Total Bayar</th>
                         <th style="text-align:center;width:100px;">Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        $no = 0;
                        foreach ($data->result_array() as $a) :
                            $no++;
                            $id = $a['id_order'];
                            $tgl = $a['tanggal'];
                            $nama = $a['nama'];
                            $jenkel = $a['jenkel'];
                            $alamat = $a['alamat'];
                            $notelp = $a['notelp'];
                            $berangkat = $a['berangkat'];
                            $kembali = $a['kembali'];
                            $total = $a['total'];
                            $dewasa = $a['adult'];
                            $anak = $a['kids'];
                            $status = $a['status'];

                        ?>
                         <tr>
                             <td style="vertical-align: middle;"><?php echo $id; ?></td>
                             <td style="vertical-align: middle;"><?php echo $tgl; ?></td>
                             <td style="vertical-align: middle;"><?php echo $nama; ?></td>
                             <td style="vertical-align: middle;"><?php echo $dewasa; ?></td>
                             <td style="vertical-align: middle;"><?php echo $anak; ?></td>
                             <td style="vertical-align: middle;"><?php echo $berangkat; ?></td>
                             <td style="vertical-align: middle;"><?php echo $kembali; ?></td>
                             <td style="text-align: right;vertical-align: middle;"><?php echo 'Rp ' . number_format($total); ?></td>
                             <td style="text-align: center;vertical-align: middle;">
                                 <?php
                                    if ($status == 'LUNAS') : ?>
                                     <label class="label label-success">LUNAS</label>
                                 <?php else : ?>

                                     <a class="btn btn-xs btn-info" href="<?php echo base_url() . 'orders/pembayaran_selesai/' . $id ?>" title="Pembayaran Selesai"><span class="fa fa-check" data-toggle="modal"></span> </a>
                                     <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id ?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> </a>
                                     <a class="btn btn-xs btn-danger" href="#ModalHapus<?php echo $id; ?>" data-toggle="modal" title="Batalkan"><span class="fa fa-trash"></span> </a>
                                 <?php endif ?>
                             </td>
                         </tr>
                     <?php endforeach; ?>
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
    foreach ($data->result_array() as $a) :
        $no++;
        $id = $a['id_order'];
        $tgl = $a['tanggal'];
        $nama = $a['nama'];
        $jenkel = $a['jenkel'];
        $alamat = $a['alamat'];
        $notelp = $a['notelp'];
        $berangkat = $a['berangkat'];
        $kembali = $a['kembali'];
        $dewasa = $a['adult'];
        $anak = $a['kids'];
    ?>
     <div id="modalEdit<?php echo $id ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                     <h3 class="modal-title" id="myModalLabel">Edit Order</h3>
                 </div>
                 <form class="form-horizontal" method="post" action="<?php echo base_url() . 'orders/edit_orders' ?>">
                     <div class="modal-body">
                         <input name="kode" type="hidden" value="<?php echo $id; ?>">

                         <div class="form-group">
                             <label class="control-label col-xs-3">Dewasa</label>
                             <div class="col-xs-9">
                                 <input name="dewasa" class="form-control" min="1" type="number" value="<?php echo $dewasa; ?>" style="width:280px;" required>
                             </div>
                         </div>

                         <div class="form-group">
                             <label class="control-label col-xs-3">Anak-Anak</label>
                             <div class="col-xs-9">
                                 <input name="anaks" class="form-control" min="0" type="number" value="<?php echo $anak; ?>" style="width:280px;" required>
                             </div>
                         </div>

                     </div>
                     <div class="modal-footer">
                         <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                         <button type="submit" class="btn btn-primary">Update</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 <?php endforeach; ?>


 <?php foreach ($data->result_array() as $a) :
        $id = $a['id_order'];
        $tgl = $a['tanggal'];
        $nama = $a['nama'];
        $jenkel = $a['jenkel'];
        $alamat = $a['alamat'];
        $notelp = $a['notelp'];
        $berangkat = $a['berangkat'];
        $kembali = $a['kembali'];
        $total = $a['total'];
        $dewasa = $a['adult'];
        $anak = $a['kids'];
        $status = $a['status'];
    ?>
     <!--Modal Hapus Order-->
     <div class="modal fade" id="ModalHapus<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                     <h4 class="modal-title" id="myModalLabel">Hapus Order</h4>
                 </div>
                 <form class="form-horizontal" action="<?php echo base_url() . 'orders/hapus_order' ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">
                         <input type="hidden" name="kode" value="<?php echo $id; ?>" />
                         <p>Apakah Anda yakin mau menghapus orderan dari <b><?php echo $nama; ?></b>?</p>

                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 <?php endforeach; ?>