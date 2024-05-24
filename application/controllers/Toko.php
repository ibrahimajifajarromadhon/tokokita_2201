<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->library('form_validation');
    }

    public function index(){
        $data['toko']=$this->Madmin->get_all_data('tbl_toko')->result();
        $this->load->view('home/layout/header');
        $this->load->view('home/toko/index', $data);
        $this->load->view('home/layout/footer');
    }

    public function add(){
        $this->load->view('home/layout/header');
        $this->load->view('home/toko/formAdd');
        $this->load->view('home/layout/footer');
    }

    public function save(){
        $id = $this->session->userdata('idKonsumen');

        //Membuat aturan dari form validasi
        $this->form_validation->set_rules('namaToko', 'Nama Toko', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Nama Toko Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Deskripsi Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        if (empty($_FILES['logo']['name'])){
            $this->form_validation->set_rules('logo', 'Logo Toko', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Logo Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        }

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login dengan pesan error
            $this->load->view('home/layout/header');
            $this->load->view('home/toko/formAdd');
            $this->load->view('home/layout/footer');
        } else{
            // Jika validasi berhasil, tampilkan controllers toko 
            $nama_toko = $this->input->post('namaToko');
            $deskripsi = $this->input->post('deskripsi');
            $config['upload_path'] = './assets/logo_toko/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            
            $this->load->library('upload', $config);
            if($this->upload->do_upload('logo')){
                $data_file = $this->upload->data();
                $data_insert = array(
                                    'idKonsumen' => $id,
                                    'namaToko' => $nama_toko,
                                    'logo' => $data_file['file_name'],
                                    'deskripsi' => $deskripsi,
                                    'statusAktif' => 'Y');
                $this->Madmin->insert('tbl_toko', $data_insert);
                redirect('toko');
            } else {
                redirect('toko/add');
            }
        }
    }

    public function delete($id){
        $where = array('idToko' => $id);
        $this->Madmin->delete('tbl_toko', 'idToko', $id);
        redirect('toko');
    }

    public function edit($id){
        $data['toko'] = $this->Madmin->get_by_id('tbl_toko', array('idToko' => $id))->row();
        $this->load->view('home/layout/header');
        $this->load->view('home/toko/formEdit', $data);
        $this->load->view('home/layout/footer');
    }

    public function update(){
        $id = $this->input->post('idToko');

        //Membuat aturan dari form validasi
        $this->form_validation->set_rules('namaToko', 'Nama Toko', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Nama Toko Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Deskripsi Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        if (empty($_FILES['logo']['name'])){
            $this->form_validation->set_rules('logo', 'Logo Toko', 'required', array('required'=>'<div class="alert alert-danger alert-dismissible fade show"><strong>Error! </strong>Logo Tidak Boleh Kosong! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>'));
        }

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form login dengan pesan error
            $data['toko'] = $this->Madmin->get_by_id('tbl_toko', array('idToko' => $id))->row();
            $this->load->view('home/layout/header');
            $this->load->view('home/toko/formEdit', $data);
            $this->load->view('home/layout/footer');
        } else{
            // Jika validasi berhasil, tampilkan controllers toko 
            $nama_toko = $this->input->post('namaToko');
            $deskripsi = $this->input->post('deskripsi');
            if (isset($_FILES['logo']) && $_FILES['logo']['error'] != UPLOAD_ERR_NO_FILE) {
                $config['upload_path'] = './assets/logo_toko/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('logo')) {
                    $data_file = $this->upload->data();
                    $data_update = array(
                        'namaToko' => $nama_toko,
                        'logo' => $data_file['file_name'],
                        'deskripsi' => $deskripsi,
                        'statusAktif' => 'Y');
                    $this->Madmin->update('tbl_toko', $data_update, 'idToko', $id);
                    redirect('toko');
                } else {
                    redirect('toko/edit/' . $id);
                }
            } else {
                $data_update = array(
                    'namaToko' => $nama_toko,
                    'logo' => $data_file['file_name'],
                    'deskripsi' => $deskripsi,
                    'statusAktif' => 'Y');
                $this->Madmin->update('tbl_toko', $data_update, 'idToko', $id);
                redirect('toko');
            }
        }
    }
}

?>