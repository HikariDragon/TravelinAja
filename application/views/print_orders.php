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

                                     <a class="btn btn-xs btn-info" href="<?php echo base_url() . 'orders/pembayaran_selesai/' . $a['id_order'] ?>" title="Pembayaran Selesai"><span class="fa fa-check" data-toggle="modal"></span> </a>
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

 <script type="text/javascript">
        window.print();
    </script>