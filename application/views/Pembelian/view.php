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
Status Pembelian <?php echo $this->session->userdata('email');  ?>
<?php } ?>
</h4>
				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
					
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
<?php if ($this->session->userdata('email') != "admin@gmail.com") { ?>
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
	<th>Status</th>
									</tr>
								</thead>
								<tbody>

<?php 
//bayar multi checkbox
echo form_open('Keranjang/bayar'); ?>
<?php
if( ! empty($cart_tb)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
	foreach($cart_tb as $data){ // Lakukan looping pada variabel gambar dari controller
		echo "<tr>";
		?>
	<?php if ($this->session->userdata('email') != "admin@gmail.com") { ?>
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

		if ($data->bank > "" ) {
	echo "<td>Lunas</td>";
} else {
	echo "<td>Belum Lunas</td>";
	
}





		
		?>
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

<input type="submit" value="Bayar" onclick="return confirm('Ingin Membayarnya ?')">
	</div>

<?php } ?>
<?php echo form_close()?>

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
