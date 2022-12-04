<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KeranjangModel extends CI_Model {
	// Fungsi untuk menampilkan semua data gambar
	public function view(){
		// return $this->db->get('cart_tb')->result();
if ($this->session->userdata('email') == "admin@gmail.com"){
	
	return $this->db->get('cart_tb')->result();
	} else {

	//	SELECT * FROM `cart_tb` WHERE `emailpembeli` = 'EMAILLOGIN'
		$this->db->select('*');
     $this->db->from('cart_tb');
     $this->db->where('emailpembeli',$this->session->userdata('email'));
     $query = $this->db->get();
     return $query->result();
		}
}

function tampil_data_select_pembayaran(){
		return $this->db->get('bank_tb');
	}

function tampil_data(){
		return $this->db->get('pembayaran_tb');
	}

public function bayarkeun($id){
		$this->db->where('id_cart', $id);
		$this->db->delete('cart_tb');
	}
	
	public function get_emailpembeli($id) {
     $this->db->select('*');
     $this->db->from('cart_tb');
     $this->db->where('id_cart','$emailpembeli');
     $query = $this->db->get();
     return $query->result();
    }
	// Fungsi untuk melakukan proses upload file
	public function upload(){
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	
	// Fungsi untuk menyimpan data ke database
	public function save($upload){
		if($upload['result'] == "success"){
			$data = array(
				'nama'=>$this->input->post('input_nama'),
				'harga'=>$this->input->post('input_harga'),
				'gambar' => $upload['file']['file_name'],
				'deskripsi'=>$this->input->post('input_deskripsi'),
			);
		}else{
			$data = array('deskripsi'=>$this->input->post('input_deskripsi'));
		}
		
		$this->db->insert('produk_tb', $data);
	}

	public function hapusData($id){
        $this->db->delete('cart_tb', ['id_cart' => $id]);
    }

	public function edit_data($where,$table){     
                return $this->db->get_where($table,$where);
	}

public function updateData(){

        $data = array(
        		'gambar'=>$this->input->post('input_gambar'),
				'emailpembeli'=>$this->input->post('input_emailpembeli'),
				'namabarang'=>$this->input->post('input_namabarang'),
				'harga'=>$this->input->post('input_harga'),
				'linkbarang'=>$this->input->post('input_linkbarang'),
				'namapembeli'=>$this->input->post('input_namapembeli'),
				'nomor_telp'=>$this->input->post('input_nomorpembeli'),
				'alamat'=>$this->input->post('input_alamat'),
			);
        $this->db->insert('cart_tb', $data);
    }

    public function updateDataPembayaran(){

        $data = array(
        		'gambar'=>$this->input->post('input_gambar'),
				'emailpembeli'=>$this->input->post('input_emailpembeli'),
				'namabarang'=>$this->input->post('input_namabarang'),
				'harga'=>$this->input->post('input_harga'),
				'linkbarang'=>$this->input->post('input_linkbarang'),
				'namapembeli'=>$this->input->post('input_namapembeli'),
				'nomor_telp'=>$this->input->post('input_nomorpembeli'),
				'alamat'=>$this->input->post('input_alamat'),
				'bank'=>$this->input->post('input_bank'),
			);
        $this->db->insert('pembayaran_tb', $data);

    }
}
