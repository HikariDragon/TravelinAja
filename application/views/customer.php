<?= $this->session->flashdata('pesan'); ?>


<div class="card">
  <div class="card-header">
    <a href="<?= base_url('customer/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Customer</a>
    <a href="<?= base_url('customer/print') ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i>Print</a>
    <a href="<?= base_url('customer/pdf') ?>" class="btn btn-success btn-sm"><i class="fas fa-file"></i>Export PDF</a>
  
    
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
      foreach ($customer as $cust) : ?>
        <tbody>
          <tr class="text-center">
            <td><?= $no++ ?></td>
            <td><?= $cust->nama_customer ?></td>
            <td><?= $cust->tujuan ?></td>
            <td><?= $cust->nama_kendaraan ?></td>
            <td>
              <button data-toggle="modal" data-target="#edit<?= $cust->id_customer ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
              <a href="<?= base_url('customer/delete/' . $cust->id_customer) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
        </tbody>
      <?php endforeach ?>
    </table>
  </div>
</div>
</div>
</div>



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal Edit-->
<?php foreach($customer as $cust): ?>
<div class="modal fade" id="edit<?= $cust->id_customer ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('customer/edit/' . $cust->id_customer)?>" method="POST">
    <div class="form-group">
      <label>Nama Customer</label>
      <input type="text" name="nama_customer" class="form-control" value="<?=  $cust->nama_customer ?>">
      <?= form_error('nama_customer','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Tujuan</label>
      <input type="text" name="tujuan" class="form-control"  value="<?=  $cust->tujuan ?>">
      <?= form_error('tujuan','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Kendaraan</label>
      <input type="text" name="nama_kendaraan" class="form-control" value="<?=  $cust->nama_kendaraan; ?>">
      <?= form_error('nama_kendaraan','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
      <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
    </div>
    </form>
      </div>      
    </div>
  </div>
</div>
<?php endforeach  ?>