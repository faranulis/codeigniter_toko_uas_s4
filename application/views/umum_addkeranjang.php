<!DOCTYPE html>
<html lang="en">

<head>
<style type="text/css">
	.keranjang {
	margin: 0 auto;
    padding: 20px;
    width: 414px;
    box-shadow: 0px 0px 4px #000000;
    border-radius: 7px;
}
#box {
  margin-top: 20px;
  border-top: 4px solid aquamarine;
  padding: 20px;
  background: aquamarine;
  border-radius: 15px;
}
</style>
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
				<div class="keranjang">
					<div class="card-header">

						<a href="<?php echo site_url('/') ?>"><i class="fas fa-arrow-left"></i>
							Back</a>
					</div>
					<div class="card-body">
<?php foreach($produk_tb as $data){ ?>

<?php echo "<td><img src='".base_url("assets/images/".$data->gambar)."' width='100' height='100'></td>";?>

<?php echo form_open("Keranjang/addcart", array('enctype'=>'multipart/form-data')); ?>

							<input type="hidden" name="input_gambar" value="<?php echo $data->gambar ?>">

							<input type="hidden" name="input_id_card" value="<?php echo $data->id_product ?>">

							<div class="form-group">
								<label for="name">Email Anda</label>
								<input readonly class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="input_emailpembeli" value="<?php echo $this->session->userdata('email');  ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="name">Nama Barang</label>
								<input readonly class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="input_namabarang" value="<?php echo $data->nama ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div>

							<div class="form-group">
								<label for="price">Price</label>
								<input class="form-control"
								 type="number" name="input_harga" min="0"readonly value="<?php echo $data->harga ?>" />
								<div class="invalid-feedback">
								</div>
							</div>

							<div class="form-group">
								<label for="name">Link Barang</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="input_linkbarang" readonly value="<?php echo site_url('Umum/Detail/'.$data->id_product); ?>" />
								<div class="invalid-feedback">
									<?php echo form_error('name') ?>
								</div>
							</div> 

							<div id="box">

							<div class="form-group">
								<label for="name">Nama Pembeli</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="input_namapembeli" />
							</div>

							<div class="form-group">
								<label for="name">Nomor Telepon Pembeli</label>
								<input class="form-control <?php echo form_error('name') ? 'is-invalid':'' ?>"
								 type="text" name="input_nomorpembeli" pattern="[0-9]+" />
							</div>

							<div class="form-group">
								<label for="name">Alamat Paket*</label>
								<textarea class="form-control <?php echo form_error('description') ? 'is-invalid':'' ?>"
								 name="input_alamat"></textarea>
							</div>

							</div>

							<input class="btn btn-success" type="submit" name="btn" value="Tambah Ke Keranjang" />
						<?php echo form_close();?>
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