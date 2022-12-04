<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProdukModel extends CI_Model {
	// Fungsi untuk menampilkan semua data gambar
	public function view(){
		return $this->db->get('produk_tb')->result();
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
        $this->db->delete('produk_tb', ['id_product' => $id]);
    }

	public function edit_data($where,$table){                           
                return $this->db->get_where($table,$where);

}

public function updateData()
    {
        $data = [
            "nama" => $this->input->post('input_nama', true),
            "harga" => $this->input->post('input_harga', true),
            "deskripsi" => $this->input->post('input_deskripsi', true)
        ];
        $this->db->where('id_product', $this->input->post('input_id_product'));
        $this->db->update('produk_tb', $data);
    }



}
