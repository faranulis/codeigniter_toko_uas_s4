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
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
	<th>ID Anggota</th>
	<th>Nama Anggota</th>
	<th>Email</th>
	<th>Action</th>
									</tr>
								</thead>
								<tbody>
<?php
if( ! empty($user)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
	foreach($user as $data){ // Lakukan looping pada variabel gambar dari controller
		echo "<tr>";
		echo "<td>".$data->id."</td>";
		echo "<td>".$data->nama."</td>";
		echo "<td>".$data->email."</td>"; ?>
		<td><?php echo anchor('user/hapus/'.$data->id,'Hapus'); ?> </td>
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
