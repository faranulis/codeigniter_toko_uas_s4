<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body id="page-top">

	<div id="wrapper">

		<div id="content-wrapper">

			<div class="container-fluid">


				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('ListProduk/tambah') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
	<th>Gambar</th>
	<th>Kode Produk</th>
	<th>Nama</th>
	<th>Harga</th>
	<th>Deskripsi</th>
	<th>Action</th>
									</tr>
								</thead>
								<tbody>
<?php
if( ! empty($produk_tb)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
	foreach($produk_tb as $data){ // Lakukan looping pada variabel gambar dari controller
		echo "<tr>";
		echo "<td><img src='".base_url("assets/images/".$data->gambar)."' width='100' height='100'></td>";
		echo "<td>".$data->id_product."</td>";
		echo "<td>".$data->nama."</td>";
		echo "<td>".$data->harga."</td>";
		echo "<td>".$data->deskripsi."</td>"; ?>
		<td><?php echo anchor('ListProduk/edit/'.$data->id_product,'Edit'); ?> </td>
		<td><?php echo anchor('ListProduk/hapus/'.$data->id_product,'Hapus'); ?> </td>
		<?php
		echo "</tr>";
	}
}else{ // Jika data tidak ada
	echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- /.content-wrapper -->

	</div>

	<?php $this->load->view("admin/product/js.php") ?>

</body>

</html>
