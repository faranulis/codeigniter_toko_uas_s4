<div id="rgister">

  <div class="col-md-4">

        <h2 class="my-4">Register
        </h2>

  <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
  <?php echo form_open('user/register-proses',''); ?>

  <div class="form-group">
    <label for="exampleInputEmail1">Nama</label>
    <input type="text" name="nama"class="form-control" id="exampleInputEmail1">
    <?php echo form_error('nama', '<div class="text-danger"><small>', '</small></div>');?>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">e-mail</label>
    <input type="email" name="email"class="form-control" id="exampleInputEmail1">
    <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>');?>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control">
    <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>');?>
  </div>

  <button type="submit" class="btn btn-primary">Register Now!</button>
<?php echo form_close(); ?>
<p>
Punya Akun ? <?php echo anchor('user', 'Login', 'attributes'); ?>
</p>
</div>
</div>