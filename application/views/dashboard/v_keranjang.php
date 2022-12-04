<!DOCTYPE html>
<html lang="en">

<head>
	<style type="text/css">
		#Bayar select {
    padding: 9px;
    border-radius: 10px;
    background: #2a51c4;
    color: #fff;
    border: 0;
}
input[type="submit"] {
    padding: 9px;
    border-radius: 10px;
    background: #2ac476;
    color: #fff;
    border: 0;
}
#Bayar {
    float: right;
}
	</style>
</head>

<body id="page-top">

	<div id="wrapper">

		<div id="content-wrapper">

			<div class="container-fluid">

<h4> 
<?php if ($this->session->userdata('email') == "admin@gmail.com") { ?>
Kelola Keranjang Users
<?php }else{?>
Keranjang <?php echo $this->session->userdata('email');  ?>
<?php } ?>
</h4>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('/') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
<?php if ($this->session->userdata('email') != "admin@gmail.com") { ?>
         <th>Pilih Bayar</th>  
<?php }?>
	
	<th>Gambar</th>
	<?php if ($this->session->userdata('email') == "admin@gmail.com") { ?>
    <th>User</th>
<?php }?>

	<th>Nama Barang</th>
	<th>Nama Pembeli</th>
	<th>Nama Alamat</th>
	<th>Nomor Telpon</th>
	<th>Harga</th>
	<th>Action</th>
									</tr>
								</thead>
								<tbody>
<form action="<?= base_url() ?>Keranjang/addPembayaran" method="post">

<?php
if( ! empty($cart_tb)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
	foreach($cart_tb as $data){ // Lakukan looping pada variabel gambar dari controller
		echo "<tr>";
		?>

		<input type="hidden" name="input_gambar" value="<?php echo $data->gambar ?>">
<input type="hidden" name="input_emailpembeli" value="<?php echo $data->emailpembeli ?>">
<input type="hidden" name="input_namabarang" value="<?php echo $data->namabarang ?>">
<input type="hidden" name="input_harga" value="<?php echo $data->harga ?>">
<input type="hidden" name="input_linkbarang" value="<?php echo $data->linkbarang ?>">
<input type="hidden" name="input_namapembeli" value="<?php echo $data->namapembeli ?>">
<input type="hidden" name="input_nomorpembeli" value="<?php echo $data->nomor_telp ?>">
<input type="hidden" name="input_alamat" value="<?php echo $data->alamat ?>">
	<?php if ($this->session->userdata('email') != "admin@gmail.com") { ?>
    <td><input type="checkbox" name="id[]" value="<?php echo $data->id_cart ?>"></td>
<?php }?>
		 <?php
		echo "<td><img src='".base_url("assets/images/".$data->gambar)."' width='100' height='100'></td>";
?>
<?php if ($this->session->userdata('email') == "admin@gmail.com") { ?>
         <?php echo "<td>".$data->emailpembeli."</td>"; ?>   
<?php }?>
<?php  
		echo "<td>".$data->namabarang."</td>";
		echo "<td>".$data->namapembeli."</td>";
		echo "<td>".$data->alamat."</td>";
		echo "<td>".$data->nomor_telp."</td>";
		echo "<td>".$data->harga."</td>";
		echo "<td><a href='".$data->linkbarang."'>Cek Barang</a><br>";
		echo anchor('Keranjang/hapus/'.$data->id_cart,'Hapus');?>
		<?php
		echo "</tr>";
	}


}else{ // Jika data tidak ada
	echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>


<!------- PEMBAYARAN-->
								</tbody>
							</table>
          <?php if ($this->session->userdata('email') == "admin@gmail.com") { ?>

<?php }else{?>
	<div id="Bayar">
<select name="input_bank" id="cars">
<?php
if( ! empty($bank_tb)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
	foreach($bank_tb as $data){ // Lakukan looping pada variabel gambar dari controller
		echo "<tr>";
		?>
<?php  
		echo "<option>".$data->nama_bank.", Biaya : ".$data->biaya_bank."</option>";
		?>
		<?php
		echo "</tr>";
	}
}else{ // Jika data tidak ada
	echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>
</select>
<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
	</div>
</form>
<?php } ?>

						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- /.content-wrapper -->

	</div>
<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    $("#check-all").click(function(){ // Ketika user men-cek checkbox all
      if($(this).is(":checked")) // Jika checkbox all diceklis
        $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
      else // Jika checkbox all tidak diceklis
        $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
  });
  </script>

	<?php $this->load->view("admin/product/js.php") ?>

</body>

</html>
