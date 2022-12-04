<div class="container-fluid">
 
  <div class="alert alert-success" role="alert">
    <i class="fas fa-tachometer-alt"></i>  Dashboard
  </div>
  <div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Selamat datang!</h4>
    <p>
          Selamat datang: <b><?php 

if ($this->session->userdata('email') == "admin@gmail.com") {
  # code...
  echo "Anda Login Sebagai Admin, Hai ";
  echo $this->session->userdata('nama');  
} else {
  echo "Anda Login Sebagai Pembeli, Hai ";
  echo $this->session->userdata('nama');  
} 

          ?></b>,<br>
 
          Ini adalah halaman user / member area yang telah di amankan oleh sistem login hash & session login.
        </p>
  <hr>
  </div>

              <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <tbody>
<tr>
  <td><b>Nama :</b></td>
  <td><?php echo $this->session->userdata('nama');  ?></td>

</tr>
<tr>
  <td><b>Email Anda</b></td>
  <td><?php echo $this->session->userdata('email');  ?></td>
</tr>
                  

                </tbody>
              </table>
            </div>
  <!-- Button trigger modal -->
</div>