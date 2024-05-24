<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('form_validation');
    }

    public function index(){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }
        $data['kategori']=$this->Madmin->get_all_data('tbl_kategori')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/kategori/tampil', $data);
        $this->load->view('admin/layout/footer');
    }

    public function add(){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/kategori/formAdd');
        $this->load->view('admin/layout/footer');
    }

    public function save(){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }

        //Membuat aturan dari form validasi
        $this->form_validation->set_rules('namaKat', 'Nama Kategori', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Nama Kategori Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        
        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form edit kategori dengan pesan error
            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/menu');
            $this->load->view('admin/kategori/formAdd');
            $this->load->view('admin/layout/footer');
        }else{
            // Jika validasi berhasil, tampilkan controllers kategori 
            $namaKat = $this->input->post('namaKat');
            $dataInput = array('namaKat' => $namaKat);
            $this->Madmin->insert('tbl_kategori', $dataInput);
            redirect('kategori');
        }
    }

    public function get_by_id($id){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }
        $dataWhere = array('idKat' => $id);
        $data['kategori']=$this->Madmin->get_by_id('tbl_kategori', $dataWhere)->row_object();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/menu');
        $this->load->view('admin/kategori/formEdit', $data);
        $this->load->view('admin/layout/footer');
    }

    public function edit(){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }
        $id = $this->input->post('id');
        
        //Membuat aturan dari form validasi
        
            // Jika validasi gagal, tampilkan form edit kategori dengan pesan error
            $dataWhere = array('idKat' => $id);
            $data['kategori']=$this->Madmin->get_by_id('tbl_kategori', $dataWhere)->row_object();
            $namaKategori = $this->input->post('namaKat');
            $dataUpdate = array('namaKat'=>$namaKategori);
            $this->Madmin->update('tbl_kategori', $dataUpdate, 'idKat', $id);
            redirect('kategori');
    }

    public function delete($id){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }
        $this->Madmin->delete('tbl_kategori', 'idKat', $id);
        redirect('kategori');
    }
}

?>