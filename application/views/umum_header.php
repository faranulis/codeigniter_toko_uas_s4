<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Faran Ramdan</title>	
	
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</head>

<style type="text/css">
.card {
    overflow: hidden;
    height: 440px;
    padding: 5px;
    margin: 5px;
    display: inline-block;
    width: 240px;
    border-radius: 7px;
}

.card-img-top {
    border-radius: 10px;
}
#gambar {
    overflow: hidden;
    padding: 18px;
    height: 240px;
    border-radius: 7px;
}
a.btn {
    width: -webkit-fill-available;
    margin-bottom: 5px;
}
img.card-img-top {
    width: 250px;
    margin-left: -30px;
}
h4.card-title {
    font-size: 16px;
    font-family: arial;
    height: 40px;
    color: #000;
}
#card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
#imagecard1 img {
    float: left;
    margin-left: 20px;
    width: 30%;
    border-radius: 20px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 52%);
}

.kotakcard1 {
    text-align: left;
    width: 57%;
    float: left;
    margin-left: 20px;
}
#card {
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 32%);
    transition: 0.3s;
    padding: 20px;
    text-align: left;
    margin-top: 20px;
    float: left;
    width: 100%;
    background: white;
}
@media only screen and (max-width: 600px){
#card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
}
#imagecard1 img {
    width: 85%;
    margin: 0 auto;
    border-radius: 20px;
    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 52%);
}
#card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.kotakcard1 {
  padding: 2px 16px;
    width: auto;
    float: none;
}

}
.no-banner .thumb-text {
    margin-top: 60px;
}

.thumb-text li {
    vertical-align: top;
    display: inline-block;
    list-style: none;
    margin-left: -3px;
    color: #f9f9f9;
    font-size: 16px;
    line-height: 24px;
    width: 24.9%;
}
.thumb-text li .box-1 {
    background: #4886FF;
}
.thumb-text li .box-2 {
    background: #FF6F6F;
}
.thumb-text li .box-3 {
    background: #B5D56A;
}
.box-1, .box-2, .box-3 {
    height: 300px;
    border-radius: 7px;
    margin: 5px;
    padding: 5px;
}
div#selengkapnya {
    background: #00a1ff;
    text-decoration: none;
    width: 30%;
    padding: 20px;
    color: #fff;
    font-weight: 700;
    border-radius: 10px;
    box-shadow: 1px 2px 8px 0px #6f6f6f;
    position: relative;
    margin-top: -80px;
}
@media only screen and (max-width: 612px){
.fotopembukaan img {
    float: none;
    width: auto;
}
}
@media only screen and (max-width: 612px){
    .fotopembukaan {
    width: 100%;
}
div#imagecard1 {
    display: -webkit-box;
}
.thumb-text li {
    color: #f9f9f9;
    font-size: 16px;
    line-height: 24px;
    width: 100%;
}
ul.thumb-text {
    padding: 0;
}
.box-1, .box-2, .box-3 {
    height: fit-content;
}
}
#pembukaan1 {
    background-image: linear-gradient( 
179deg, #6bd5af 0%, #2ba997 100%);
    padding: 12px;
    border-radius: 10px;
    color: #fff;
            float: left;
            width: 100%
}
.fotopembukaan img {
    float: left;
    width: 100%;
    margin-right: 15px;
    border-radius: 20px;
}
.fotopembukaan {
    width: 40%;
}
</style>
<body>
	<div id="wrapper">
<nav class="navbar navbar-expand-lg navbar-light bg-warning" style="background: #6bd5af!important">
   <div class="container">

        <a class="navbar-brand" href="#">Dropshipper</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= base_url('/') ?>">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact</a>
                </li>

                <?php 
//cek session dari `nama` jika ada. jika tidak ada menu dashboard tidak akan tampil
if($this->session->userdata('nama')) : ?>
            <li class="nav-item active ">
                <a class="nav-link" href="<?php echo site_url('user'); ?>">Dashboard</a>
            </li>
            <li class="nav-item active ">
                <a class="nav-link" href="<?php echo site_url('user/Logout'); ?>">Logout</a>
            </li>
<?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('user'); ?>">Login</a>
            </li>
<?php endif;?>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Kata Kunci" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
            </form>
        </div>
    </div>
</nav>
			<div class="clear"></div>