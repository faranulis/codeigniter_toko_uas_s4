<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Umum extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('ProdukModel');
	}
 
	public function index(){	

		$data['produk_tb'] = $this->ProdukModel->view();

		$data['judul'] = "Halaman depan";
		$this->load->view('umum_header',$data);
		$this->load->view('umum_isi',$data);
		$this->load->view('umum_footer',$data);
	}

		public function detail($id){	

                $where = array('id_product' => $id);

                $data['produk_tb'] = $this->ProdukModel->edit_data($where,'produk_tb')->result();

		$this->load->view('umum_header');
		$this->load->view('umum_detail',$data);
	}
}