<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body id="page-top">

	<div id="wrapper">

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
				</div>
				<?php endif; ?>

				<!-- Card  -->
				<div class="card mb-3">
					<div class="card-header">

						<a href="<?php echo site_url('listbank/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">
<?php foreach($bank_tb as $data){ ?>
						<form action="<?= base_url() ?>ListBank/ubahData" method="post">
						<!-- Note: atribut action dikosongkan, artinya action-nya akan diproses 
							oleh controller tempat vuew ini digunakan. Yakni index.php/admin/products/edit/ID --->


							<input type="hidden" name="input_id_bank" value="<?php echo $data->id_bank ?>">

							<div class="form-group">
								<label for="name">Name*</label>

<!-- bagian value="" pake nama table --->

								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="input_namabank" value="<?php echo $data->nama_bank ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Price</label>
								<input class="form-control"
								 type="number" name="input_biayabank" min="0"value="<?php echo $data->biaya_bank ?>" />
								<div class="invalid-feedback">
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Simpan" />
						</form>
<?php } ?>
					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>


				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- /.content-wrapper -->

		</div>
		<!-- /#wrapper -->

</body>

</html>