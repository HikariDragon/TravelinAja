<!-- Main content -->
<section class="content">

<!-- SELECT2 EXAMPLE -->
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Judul</h3>
  </div>
  
  <form action="<?php echo base_url().'backend/post/update_post'?>" method="post" enctype="multipart/form-data">
    <?php 
  $b=$data->row_array();
?>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-md-10">
        <input type="hidden" name="kode" value="<?php echo $b['idberita'];?>">
        <input type="text" name="judul" value="<?php echo $b['judul'];?>" class="form-control" placeholder="Judul berita atau artikel" required/>
      </div>
      <!-- /.col -->
      <div class="col-md-2">
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-upload"></span> Update</button>
        <!-- /.form-group -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.box-body -->
 
</div>
</div>
<!-- /.box -->

<div class="row">
  <div class="col-md-8">

    <div class="box box-danger">
      <div class="box-header">
        <h3 class="box-title">Isi</h3>
      </div>
      <div class="box-body">
      
             <textarea id="ckeditor" name="berita" required><?php echo $b['isi'];?></textarea>
        
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  </div>
  <!-- /.col (left) -->
  <div class="col-md-4">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Pengaturan Lainnya</h3>
      </div>
      <div class="box-body">
        
              <div class="form-group">
          <label>Gambar</label>
          <input type="file" name="filefoto">
        </div>
        <!-- /.form group -->
           
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </form>
    
    <!-- /.box -->
  </div>
  <!-- /.col (right) -->
</div>
<!-- /.row -->

</section>