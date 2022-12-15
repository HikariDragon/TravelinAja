<form action="<?= base_url('customer/tambah_aksi')?>" method="POST">
    <div class="form-group">
      <label>Nama Customer</label>
      <input type="text" name="nama_customer" class="form-control">
      <?= form_error('nama_customer','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Paket</label>
     <select id="nama_paket" name="nama_paket" class="form-control">
      <?php foreach ($paket as $p) :?>
        <option value="<?= $p['nama_paket']?>"><?= $p['nama_paket']?></option>
<?php endforeach ?>
     </select> 
      <?= form_error('nama_paket','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Dewasa</label>
      <input type="number" name="adult" min="1" max="4" class="form-control">
      <?= form_error('adult','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Anak-anak</label>
      <input type="number" name="kids" min="0" class="form-control">
      <?= form_error('kids','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Keberangkatan</label>
      <input type="date" name="berangkat" class="form-control">
      <?= form_error('berangkat','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Kepulangan</label>
      <input type="date" name="kembali" class="form-control">
      <?= form_error('kembali','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <div class="form-group">
      <label>Kendaraan</label>
     <select id="nama_kendaraan" name="nama_kendaraan" class="form-control">
      <?php foreach ($tbl_kendaraan as $k) :?>
        <option value="<?= $k['nama_kendaraan']?>"><?= $k['nama_kendaraan']?></option>
<?php endforeach ?>
     </select> 
      <?= form_error('nama_paket','<div class="text-small text-danger">','</div>');  ?>
    </div>
    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan</button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset</button>
</form>