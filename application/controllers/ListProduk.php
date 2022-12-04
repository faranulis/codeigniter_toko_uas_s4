<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListProduk extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ProdukModel');
	}
	
	public function index(){
	$data['produk_tb'] = $this->ProdukModel->view();


    $this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
	$this->load->view('produk/view', $data);
    $this->load->view('dashboard/v_footer');
	}
	
	public function tambah(){
		$data = array();

		if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form

			// lakukan upload file foto dengan memanggil function upload yang ada di ProdukModel.php
			$upload = $this->ProdukModel->upload();
			
			if($upload['result'] == "success"){ // Jika proses upload sukses
				// Panggil function save yang ada di ProdukModel.php untuk menyimpan data ke database
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



function tambahkeranjang($id){
                $where = array('id_product' => $id);

                $data['produk_tb'] = $this->ProdukModel->edit_data($where,'produk_tb')->result();

    $this->load->view('umum_header');
	$this->load->view('umum_addkeranjang', $data);
    $this->load->view('umum_footer');


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

public function ubahData()
    {
        $this->ProdukModel->updateData();
        redirect('ListProduk');
    }

public function hapus($id)
    {
        $this->ProdukModel->hapusData($id);
        redirect('ListProduk');
    }
}