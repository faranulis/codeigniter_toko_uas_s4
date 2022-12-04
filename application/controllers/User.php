<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

         public function __construct() {
   	     parent::__construct();
   	     $this->load->model('m_user');
         }

	public function index(){
        
        if($this->session->userdata('is_login')==TRUE)
          {
          redirect('user/dashboard','refresh');
          }


    $this->load->view('umum_header');
    $this->template->load('user/role','user/form_login');
		
	}

  public function anggota(){

  $data['user'] = $this->m_user->tampil_data()->result();

    $this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');
    $this->load->view('user/list_anggota', $data);
    $this->load->view('dashboard/v_footer');
  }

	public function register() {

		if($this->session->userdata('is_login')==TRUE)
          {
          redirect('user/dashboard','refresh');
          }


        $this->load->view('umum_header');
    $this->template->load('user/role','user/form_register');
		
	}

	public function register_proses(){

	$this->form_validation->set_rules('nama', 'Nama', 'trim|required|min_length[3]|max_length[22]');
	$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[user.email]');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

	if ($this->form_validation->run() == TRUE ) {

		   if($this->m_user->m_register()){
           
           $this->session->set_flashdata('pesan', 'Register berhasil, silahkan  Sign In.');
           redirect('/user','refresh');

		   }else{

           $this->session->set_flashdata('pesan', 'Register user gagal!');
           redirect('/user/register','refresh');

		   }

	} else {
		
    $this->load->view('umum_header');
    $this->template->load('user/role','user/form_register');
    $this->load->view('umum_footer');
    

	}

	
		
	}

	public function login_proses() {

	$this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
	$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

    if ($this->form_validation->run() == TRUE) {
    	
          if($this->m_user->m_cek_mail()->num_rows()==1) {
          
             $db=$this->m_user->m_cek_mail()->row();
             if(hash_verified($this->input->post('password'),$db->password)) {

                     $data_login=array('is_login'=>TRUE,
                             'email'  =>$db->email,
                             'nama'   =>$db->nama);
             
                     $this->session->set_userdata($data_login);
                     redirect('user/dashboard','refresh');

                        } else {

                        $this->session->set_flashdata('pesan', 'Login gagal: password salah!');
                        redirect('/user','refresh');

                        }

          } else { // jika email tidak terdaftar!
           
           $this->session->set_flashdata('pesan', 'Login gagal: email salah!');
           redirect('/user','refresh');

          }

    } else { 

    	$this->template->load('user/role','user/form_login');
    }

	}


	public function dashboard() {

		if($this->session->userdata('is_login')==FALSE){
          redirect('/user','refresh'); 
        }
    $this->load->view('dashboard/v_header');
    $this->load->view('dashboard/v_sidebar');

    $this->load->view('dashboard/v_dashboard');

    $this->load->view('dashboard/v_footer');

	}


	public function logout() {

		$this->session->unset_userdata('is_login');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('email');

		session_destroy();
		//$this->session->set_flashdata('pesan', 'Sign Out Berhasil!');
		redirect('/','refresh');
	}

  public function hapus($id)
    {
        $this->m_user->hapusData($id);
        redirect('user/anggota');
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */