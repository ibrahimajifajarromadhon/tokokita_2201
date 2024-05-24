<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class EditPassword extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('form_validation');
    }

    public function index(){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }
        $data['userName'] = $this->session->userdata('userName');
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/editPassword/formEditPassword', $data);
        $this->load->view('admin/layout/footer');
    }

    public function save(){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }
        //Membuat aturan dari form validasi
        $this->form_validation->set_rules('password', 'Password', 'required');
		
        if($this->form_validation->run()){

            $password = $this->input->post('password');
            $this->Madmin->editPassword($this->session->userdata('userName'), $password);
            $this->session->set_flashdata('success','<strong>Success! </strong>Edit Password Berhasil!');
        }else{
            $this->session->set_flashdata('error','<strong>Error! </strong>Password Tidak Boleh Kosong!');
        }
        redirect('EditPassword');
    }
}

?>