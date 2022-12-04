<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PembelianModel extends CI_Model {
	// Fungsi untuk menampilkan semua data gambar
	public function view(){
		// return $this->db->get('cart_tb')->result();
if ($this->session->userdata('email') == "admin@gmail.com"){
	
	return $this->db->get('pembayaran_tb')->result();
	} else {

	//	SELECT * FROM `cart_tb` WHERE `emailpembeli` = 'EMAILLOGIN'
		$this->db->select('*');
     $this->db->from('pembayaran_tb');
     $this->db->where('emailpembeli',$this->session->userdata('email'));
     $query = $this->db->get();
     return $query->result();
		}

}

function tampil_data(){
		return $this->db->get('pembayaran_tb');
	}

}
