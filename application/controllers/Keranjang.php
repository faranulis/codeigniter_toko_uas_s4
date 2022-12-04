<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('KeranjangModel');
	}

	public function get_all(){

		$query = $this->db->get('produk_tb');
		$query = $this->db->get('bank_tb');
		return $query->result_array();
}
	
	public function index(){
		$data['cart_tb'] = $this->KeranjangModel->view();

//mengambil data dari tabel bank_tb
		$data['bank_tb'] = $this->KeranjangModel->tampil_data_select_pembayaran()->result();

    $this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
	$this->load->view('dashboard/v_keranjang', $data);
    $this->load->view('dashboard/v_footer');
	}

//DELETE MULTI CHECKBOX
public function bayar(){
			foreach ($_POST['id'] as $id) {
				$this->KeranjangModel->bayarkeun($id);
			}
			return redirect('keranjang');
		}

public function addkeranjang(){

		        $where = array('id_product' => $id);

                $data['produk_tb'] = $this->ProdukModel->edit_data($where,'produk_tb')->result();


    $this->load->view('umum_header');
	$this->load->view('umum_addkeranjang', $data);
    $this->load->view('umum_footer');
	}
	
	public function tambah(){
		$data = array();
		
		if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
			// lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
			$upload = $this->ProdukModel->upload();
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
				$this->ProdukModel->save($upload);
				
				redirect('ListProduk'); // Redirect kembali ke halaman awal / halaman view data
			}else{ // Jika proses upload gagal
				$data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
			}
		}
		

	$this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
	$this->load->view('produk/tambah_produk', $data);
    $this->load->view('dashboard/v_footer');
	}

public function keranjang(){
    $data['produk_tb'] = $this->KeranjangModel->view();

	$this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
	$this->load->view('dashboard/v_keranjang', $data);
    $this->load->view('dashboard/v_footer');
	}

function edit($id){
                $where = array('id_product' => $id);

                $data['produk_tb'] = $this->ProdukModel->edit_data($where,'produk_tb')->result();

	$this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
    $this->load->view('produk/edit_produk',$data);
    $this->load->view('dashboard/v_footer');


}

function update(){
$id_product = $this->input->post('input_id_product');
$nama = $this->input->post('input_nama');
$harga = $this->input->post('input_harga');
$gambar = $this->input->post('input_gambar');
$deskripsi = $this->input->post('input_deskripsi');

$data = array(
'nama' => $nama,
'gambar' => $gambar,
'harga' => $harga,
'deskripsi' => $deskripsi

);

$where = array(
		'produk_tb' => $id_product
	);

$this->ProdukModel->edit_data($where,$data,'produk_tb');
redirect('ListProduk');

}

public function addcart()
    {
        $this->KeranjangModel->updateData();
        redirect('Keranjang');
    }

public function hapus($id){
        $this->KeranjangModel->hapusData($id);
        redirect('Keranjang');
    }


    public function addPembayaran()
    {

    	foreach ($_POST['id'] as $id) {
    			$this->KeranjangModel->updateDataPembayaran();
				$this->KeranjangModel->bayarkeun($id);
				
			}
			return redirect('keranjang');
    }
}