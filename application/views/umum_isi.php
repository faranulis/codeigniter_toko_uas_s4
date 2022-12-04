<article class="card-post">
        <div class="container">
            <div class="row">
                <div class="col">

                    <?php
if( ! empty($produk_tb)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
    foreach($produk_tb as $data){ // Lakukan looping pada variabel gambar dari controller ?>
                        <div class="card">
                            <a class="card-post-link" href="<?php echo site_url('Umum/Detail/'.$data->id_product); ?>">
                                <div id="gambar">
                            <?php echo "<td><img class='card-img-top' alt=Card image cap' src='".base_url("assets/images/".$data->gambar)."'</td>"; ?>
                            </div>
                            <div class="card-body">
                                <h4 class="card-harga">Rp.<?php echo "<td>".$data->harga."</td>"; ?></h4>
                                <h4 class="card-title"><?php echo "<td>".$data->nama."</td>"; ?></h4>
                            </div>
                            </a>
                            <center>

        <a href="<?php echo base_url('ListProduk/tambahkeranjang/'.$data->id_product); ?>" class="btn btn-info">Beli</a>
         <a href="<?php echo site_url('Umum/Detail/'.$data->id_product); ?>" class="btn btn-light">Detail</a>
                        </div></center>
        <?php } 
    }else {
    echo "<tr><td colspan='5'>Data tidak Produk</td></tr>";
} ?>


                    </div>
                </div>

            </div>
        </div>
    </div>