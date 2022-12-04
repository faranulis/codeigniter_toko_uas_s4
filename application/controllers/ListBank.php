<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListBank extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('ListBank_Model');
	}

		function index(){
		$data['bank_tb'] = $this->ListBank_Model->tampil_data()->result();

		$this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
	$this->load->view('bank/view', $data);
    $this->load->view('dashboard/v_footer');
	}
 
	function tambah(){

		$this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
	$this->load->view('bank/tambah_bank');
    $this->load->view('dashboard/v_footer');
	}

	function tambah_aksi(){
		$namabank = $this->input->post('input_nama_bank');
		$biayabank = $this->input->post('input_biaya_bank');
 
		$data = array(
			'nama_bank' => $namabank,
			'biaya_bank' => $biayabank,
			);
		$this->ListBank_Model->input_data($data,'bank_tb');
		redirect('ListBank'); // Redirect kembali ke halaman awal / halaman view data
	}

	function edit($id){
                $where = array('id_bank' => $id);

                $data['bank_tb'] = $this->ListBank_Model->edit_data($where,'bank_tb')->result();

	$this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
    $this->load->view('bank/edit',$data);
    $this->load->view('dashboard/v_footer');
}

//$this > listbank_model... mengarahkan ke model/mengambil fungsi model updateData(); yg ada di   ListBank_Model
public function ubahData()
    {
        $this->ListBank_Model->updateData();
        redirect('ListBank');
    }

//fungsi hapus
public function hapus($id)
    {
        $this->ListBank_Model->hapusData($id);
        redirect('ListBank');
    }
	
}