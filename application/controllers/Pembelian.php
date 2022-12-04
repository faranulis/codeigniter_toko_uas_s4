<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembelian extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('PembelianModel');
	}

	public function get_all(){

		$query = $this->db->get('pembayaran_tb');
		return $query->result_array();
}
	
	public function index(){
		$data['pembayaran_tb'] = $this->PembelianModel->view();

    $this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
	$this->load->view('Pembelian/pembayaran', $data);
    $this->load->view('dashboard/v_footer');
	}
}