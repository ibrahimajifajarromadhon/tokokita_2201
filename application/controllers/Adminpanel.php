<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpanel extends CI_Controller{

	public function __construct() {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('form_validation');
    }

	public function index(){
		$this->load->view('admin/login');
	}

	public function dashboard(){
		if(empty($this->session->userdata('userName'))){
			redirect('adminpanel');
		}
		$this->load->view('admin/layout/header');
		$this->load->view('admin/layout/menu');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/layout/footer');
	}

	public function login(){
		//Membuat aturan dari form validasi
		$this->form_validation->set_rules('userName', 'Username', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Username Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Password Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
		
		if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login dengan pesan error
            $this->load->view('admin/login');
        } else{
			$u = $this->input->post('userName');
			$p = $this->input->post('password');
			$cek = $this->Madmin->cek_login($u, $p);
				if ($cek==1) {
					// Jika login berhasil, set session dan redirect ke halaman dashboard admin
					$data_session = array(
								'userName' => $u,
								'status' => 'login'
							);
							$this->session->set_userdata($data_session);
							redirect('adminpanel/dashboard');
				} else {
					// Jika login gagal, tampilkan form login dengan pesan error
					$data['error_message'] = '<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Username Atau Password Anda Salah! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
					$this->load->view('admin/login', $data);
				}
		}
	}

	public function register(){
		//Membuat aturan dari form validasi
		$this->form_validation->set_rules('userName', 'Username', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Username Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Password Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
		
		if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login dengan pesan error
            $this->load->view('admin/register');
        } else{
			$u = $this->input->post('userName');
            $p = $this->input->post('password');
            
            // Encrypt password 
            $hashed_password = password_hash($p, PASSWORD_DEFAULT);
			// Save member
            $admin_data = array(
                'userName' => $u,
                'password' => $hashed_password
            );
            
            $this->Madmin->save_admin($admin_data);
            
            redirect('adminpanel/dashboard');
		}
	}
	

	public function logout(){
		$this->session->sess_destroy();
		redirect('adminpanel');
	}
}

?>