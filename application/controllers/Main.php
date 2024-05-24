<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('form_validation');
    }

    public function index(){
        $this->load->view('home/layout/header');
        $this->load->view('home/layanan');
        $this->load->view('home/home');
        $this->load->view('home/layout/footer');
    }

    public function register(){
        $this->load->view('home/layout/headerEmpty');
        $this->load->view('home/register');
        $this->load->view('home/layout/footerEmpty');
    }

    public function login(){
        $this->load->view('home/layout/headerEmpty');
        $this->load->view('home/login');
        $this->load->view('home/layout/footerEmpty');
    }
    public function dashboard() {
        $this->load->view('home/layout/header');
        $this->load->view('home/home');
        $this->load->view('home/layout/footer');
    }

    public function register_aksi(){
        //Membuat aturan dari form validasi
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('namaKonsumen', '', 'required');
        $this->form_validation->set_rules('alamat', '', 'required');
        $this->form_validation->set_rules('email', '', 'required');
        $this->form_validation->set_rules('telepon', '', 'required');
        $this->form_validation->set_rules('statusAktif', '', 'required');
		
		if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login dengan pesan error
            $this->load->view('home/register');
        } else{
			$u = $this->input->post('username');
            $p = $this->input->post('password');
            $namaKonsumen = $this->input->post('namaKonsumen');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $telepon = $this->input->post('telepon');
            $statusAktif = $this->input->post('statusAktif');
            
            // Encrypt password
            $hashed_password = password_hash($p, PASSWORD_DEFAULT);
			// Save member
            $member_data = array(
                'username' => $u,
                'password' => $hashed_password,
                'namaKonsumen' => $namaKonsumen,
                'alamat' => $alamat,
                'email' => $email,
                'telepon' => $telepon,
                'statusAktif' => $statusAktif
            );
            
            $this->Madmin->save_member($member_data);
            
            redirect('main');
		}
	}

    public function login_aksi(){
            $this->load->model('Madmin');
    
            $u = $this->input->post('username');
            $p = $this->input->post('password');
    
            $cek = $this->Madmin->cek_login_member($u, $p);
    
            if ($cek['loggedIn']) {
                $data_session = array(
                    'idKonsumen' => $cek['idKonsumen'],
                    'Member' => $u,
                    'status' => 'login'
                );
    
                $this->session->set_userdata($data_session);
                redirect('main/index');
            } else {
                redirect('main/login');
            }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('main');
    }
}

?>