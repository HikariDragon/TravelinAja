<form action="<?= base_url('customer/tambah_aksi')?>" method="POST">
    <div class="form-group">
      <label>Nama Customer</label>
      <input type="text" name="nama_customer" class="form-control">
      <?= form_error('nama_customer','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Tujuan</label>
      <input type="text" name="tujuan" class="form-control">
      <?= form_error('tujuan','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Kendaraan</label>
      <input type="text" name="nama_kendaraan" class="form-control">
      <?= form_error('nama_kendaraan','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>