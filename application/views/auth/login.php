<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a class="h1"><b>Travelin</b>Aja </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><?= $this->session->flashdata('message');?></p>
      <form class="user" method="post" action="<?= base_url('auth'); ?>">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?=set_value('email')?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div> <small class="text-danger"> <?= form_error('email');?></small>
       </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div> <small class="text-danger"> <?= form_error('password');?></small>
       </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="<?=  base_url('auth/registration');?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->