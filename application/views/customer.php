<?= $this->session->flashdata('pesan'); ?>

<div class="card">
              <div class="card-header">
                <a href="<?= base_url('customer/tambah')?>"class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Customer</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="text-center">
                    <th>ID</th>
                    <th>NAMA</th>
                    <th>TUJUAN</th>
                    <th>KENDARAAN</th>
                    <th>ACTION</th>
                  </tr>
                  </thead>
                  <?php $no = 1;
                  foreach($customer as $cust) : ?>
                    <tbody>
                    <tr class="text-center">
                        <td><?= $no++ ?></td>
                        <td><?= $cust->nama_customer ?></td>
                        <td><?= $cust->tujuan ?></td>
                        <td><?= $cust->nama_kendaraan ?></td>
                        <td>
                            <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    </tbody>
                  <?php endforeach ?>
                </table>
            </div>
</div>          
           