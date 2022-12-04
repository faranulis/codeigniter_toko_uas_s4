<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" <!DOCTYPE html>
<html lang="en">
 
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 
 <?php if ($this->session->userdata('email') == "admin@gmail.com") { ?>
<title>Admin - Alpha Shoes</title>
<?php } else{?>
<title>User - Alpha Shoes</title>
<?php } ?>



  <link rel="icon"  href="<?php echo base_url() ?>assets/img/logoSC.png">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
 
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
 
</head>