<div id="login">
<div class="col-md-4">
<div id="tengah2">
        <h2 class="my-4">Login
        </h2>

  <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
  <?php echo form_open('user/login_proses',''); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">e-mail</label>
    <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>');?>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>');?>
  </div>

  <button type="submit" class="btn btn-primary">Sign In</button>
<?php echo form_close(); ?>
<br>
<p>
Buat akun baru: <?php echo anchor('user/register', 'Register!', 'attributes'); ?>
</p>
</div>
</div>
</div>