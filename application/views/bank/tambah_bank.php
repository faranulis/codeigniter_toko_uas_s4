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
						<a href="<?php echo site_url('listbank') ?>"><i class="fas fa-arrow-left"></i> Back</a>
					</div>
					<div class="card-body">

<?php echo form_open("listbank/tambah_aksi", array('enctype'=>'multipart/form-data')); ?>

							<div class="form-group">
								<label for="name">Nama Bank*</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="input_nama_bank" placeholder="Nama Bank" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Biaya Admin*</label>
								<input class="form-control <?php echo form_error('price') ? 'is-invalid':'' ?>"
								 type="number" name="input_biaya_bank" min="0"/>
								<div class="invalid-feedback">
									<?php echo form_error('price') ?>
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