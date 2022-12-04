
<?php foreach($produk_tb as $data){ ?>
<div id="pembukaan1">
    <div id="imagecard1">
                            <?php echo "<td><img class='card-img-top' alt=Card image cap' src='".base_url("assets/images/".$data->gambar)."'</td>"; ?></div>
  <div class="kotakcard1">
<h2><?php echo "<td>".$data->nama."</td>"; ?></h2>
<h4>Rp. <?php echo "<td>".$data->harga."</td>"; ?></h4>
    <p><?php echo "<td>".$data->deskripsi."</td>"; ?></p>

                <a href="<?php echo base_url('ListProduk/tambahkeranjang/'.$data->id_product); ?>" class="btn btn-danger">Beli</a>
                        </div>
  </div>
</div>
<?php } ?>