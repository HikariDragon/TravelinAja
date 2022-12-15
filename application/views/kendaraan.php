<div class="container-fluid">
  <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah"><i class="fas fa-fw fa-plus"></i>Tambah Kendaraan</button>
  <div class="row text-center">

    <?php foreach ($kendaraan as $kenda) : ?>

      <div class="card ml-2 mb-3" style="width: 16rem;">
        <img class="card-img-top" src="<?php echo base_url() . 'uploads/' . $kenda->gambar; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $kenda->nama_kendaraan ?> </h5><br>
          <small><?php echo $kenda->keterangan ?></small>
        </div>
        <div class="card-body">
          <button data-toggle="modal" data-target="#edit<?= $kenda->id_kendaraan ?>" class="btn btn-sm btn-warning"> <i class="fas fa-fw fa-edit"></i>Edit</button>
          <button data-toggle="modal" data-target="#hapus<?= $kenda->id_kendaraan ?>" class="btn btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i>Hapus</button>
        </div>
      </div>

    <?php endforeach ?>


  </div>
</div>


<div class="modal" id="tambah" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() . 'kendaraan/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama Kendaraan</label>
            <input type="text" name="nama_kendaraan" class="form-control">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" name="keterangan" class="form-control">
          </div>
          <div class="form-group">
            <label>Gambar</label><br>
            <input type="file" name="gambar" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Edit-->
<?php foreach ($kendaraan as $kenda) : ?>
  <div class="modal fade" id="edit<?= $kenda->id_kendaraan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Kendaraan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('kendaraan/update/' . $kenda->id_kendaraan) ?>" method="POST"  enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama Kendaraan</label>
              <input type="text" name="nama_kendaraan" class="form-control" value="<?php echo $kenda->nama_kendaraan ?>">
              <?= form_error('nama_kendaraan', '<div class="text-small text-danger">', '</div>');  ?>
            </div>
            <div class="form-group">
              <label>Deskripsi</label>
              <input type="text" name="keterangan" class="form-control" value="<?php echo  $kenda->keterangan ?>">
              <?= form_error('keterangan', '<div class="text-small text-danger">', '</div>');  ?>
            </div>
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="gambar" class="form-control" value="<?php echo  $kenda->gambar; ?>">
              <?= form_error('gambar', '<div class="text-small text-danger">', '</div>');  ?>
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




<?php foreach ($kendaraan as $kenda) : ?>
  <div class="modal fade" id="hapus<?= $kenda->id_kendaraan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Hapus Kendaraan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
        </div>
        <form class="form-horizontal" action="<?php echo base_url('kendaraan/hapus/' . $kenda->id_kendaraan) ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="id_kendaraan" value="<?php echo $kenda->id_kendaraan; ?>" />
            <p>Apakah Anda yakin mau hapus kendaraan <b><?php echo $kenda->nama_kendaraan; ?></b> ?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach  ?>