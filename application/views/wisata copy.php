<?= $this->session->flashdata('pesan'); ?>


<div class="card">
  <div class="card-header">
    <a href="<?= base_url('wisata/tambah') ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah wisata</a>
    <a href="<?= base_url('wisata/print') ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i>Print</a>
    <a href="<?= base_url('wisata/pdf') ?>" class="btn btn-success btn-sm"><i class="fas fa-file"></i>Export PDF</a>

  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr class="text-center">
          <th>ID</th>
          <th>GAMBAR</th>
          <th>WISATA</th>
          <th>DESKRIPSI</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <?php $no = 1;
      foreach ($wisata as $wisa) : ?>
        <tbody>
          <tr class="text-center">
            <td><?= $no++ ?></td>
            <td><?= $wisa->gambar ?></td>         
            <td><?= $wisa->nama_wisata ?></td>
            <td><?= $wisa->deskripsi ?></td>
            <td>
              <button data-toggle="modal" data-target="#edit<?= $wisa->id_wisata ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
              <a href="<?= base_url('wisata/delete/' . $wisa->id_wisata) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini?')"><i class="fas fa-trash"></i></a>
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
<?php foreach($wisata as $wisa): ?>
<div class="modal fade" id="edit<?= $wisa->id_wisata ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit wisata</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('wisata/edit/' . $wisa->id_wisata)?>" method="POST">
    <div class="form-group">
      <label>Gambar</label>
      <input type="file" name="gambar" class="form-control">
      <?= form_error('gambar','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <input type="text" name="deskripsi" class="form-control"  value="<?=  $wisa->deskripsi ?>">
      <?= form_error('deskripsi','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Wisata</label>
      <input type="text" name="nama_wisata" class="form-control"  value="<?=  $wisa->nama_wisata; ?>">
      <?= form_error('nama_wisata','<div class="text-small text-danger">','</div>');  ?>
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