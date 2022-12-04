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
						<a href="<?php echo site_url('ListBank/tambah') ?>"><i class="fas fa-plus"></i> Add New</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
	<th>Nama Bank</th>
	<th>Biaya Admin</th>
	<th>Action</th>
									</tr>
								</thead>
								<tbody>
<?php
if( ! empty($bank_tb)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
	foreach($bank_tb as $data){ // Lakukan looping pada variabel gambar dari controller
		echo "<tr>";
		echo "<td>".$data->nama_bank."</td>";
		echo "<td>".$data->biaya_bank."</td>"; ?>
		<td><?php echo anchor('ListBank/edit/'.$data->id_bank,'Edit'); ?> </td>
		<td><?php echo anchor('ListBank/hapus/'.$data->id_bank,'Hapus'); ?> </td>
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
