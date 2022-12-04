<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListBank_Model extends CI_Model {


	function tampil_data(){
		return $this->db->get('bank_tb');
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_data($where,$table){                           
                return $this->db->get_where($table,$where);

}

//fungsi update/edit data
    public function updateData()
    {
        $data = [
            "nama_bank" => $this->input->post('input_namabank', true),
            "biaya_bank" => $this->input->post('input_biayabank', true),
        ];

        //mengambil id table bank (bank_tb)
        $this->db->where('id_bank', $this->input->post('input_id_bank'));
        $this->db->update('bank_tb', $data);
    }

    //fungsi hapus dari id

    	public function hapusData($id){
        $this->db->delete('bank_tb', ['id_bank' => $id]);
    }


}
