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
				<div class="card mb-3">
					<div class="card-header">
						<a href="<?php echo site_url('listproduk') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

<?php echo form_open("listproduk/tambah", array('enctype'=>'multipart/form-data')); ?>

							<div class="form-group">
								<label for="name">Nama*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="input_nama" placeholder="Product name" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Harga*</label>
								<input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="number" name="input_harga" min="0" placeholder="Product price" />
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
								</div>
							</div>


							<div class="form-group">
								<label for="name">Upload Photo</label>
								<input type="file" name="input_gambar"/>
							</div>

							<div class="form-group">
								<label for="name">Description*</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="input_deskripsi" placeholder="Product description..."></textarea>
								<div class="invalid-feedback">
									<?php echo form_error('description') ?>
								</div>
							</div>

							<input class="btn btn-success" type="submit" name="submit" value="Simpan">
						<?php echo form_close();?>

					</div>

					<div class="card-footer small text-muted">
						* required fields
					</div>
				</div>
			</div>
		</div>

</body>

</html>