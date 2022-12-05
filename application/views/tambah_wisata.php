<form action="<?= base_url('wisata/tambah_aksi')?>" method="POST">
    <div class="form-group">
      <label>Gambar</label>
      <input type="file" name="gambar" class="form-control">
      <?= form_error('gambar','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Wisata</label>
      <input type="text" name="nama_wisata" class="form-control">
      <?= form_error('nama_wisata','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Deskripsi</label>
      <input type="text" name="deskripsi" class="form-control">
      <?= form_error('deskripsi','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>