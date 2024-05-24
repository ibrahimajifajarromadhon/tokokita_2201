<?php

class Madmin extends CI_Model{

	public function editPassword($u, $p){
		$id = $this->db->get_where('tbl_admin', array('userName'=>$u))->row_object()->idAdmin;
		$dataUpdate = array(
            'userName' => $u,				
            'password' => password_hash($p, PASSWORD_DEFAULT)
        );
		$this->db->where('idAdmin', $id);
		$this->db->update('tbl_admin', $dataUpdate);
	}

	public function create_admin($u, $p){
		$is_username_exist =($this->db->get_where('tbl_admin', array('userName' => $u)));
		if(!$is_username_exist){
			$data = array(
				'userName' => $u,
				'password' => password_hash($p, PASSWORD_DEFAULT)
			);
			$this->db->insert('tbl_admin', $data);
			return true;
		}
		return false;
	}

	public function cek_login($u, $p){
		// Mengambil data admin berdasarkan username
		$query = $this->db->get_where('tbl_admin', array('userName' => $u));
		$check = $query->num_rows();
		$akun = $query->row_object();
	
		// Memeriksa apakah admin ditemukan
		if ($check==1) {
			$hashed_password = $akun->password;
			// Memeriksa kecocokan password dengan password_verify()
			if (password_verify($p, $hashed_password)) {
				// Jika password cocok, login berhasil
				return true;
			}
		}
	
		// Jika username atau password tidak cocok, login gagal
		return false;
	}

	public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q;
	}

	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}

	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

	public function update($tabel, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($tabel, $data);
	}

	public function delete($tabel, $id, $val){
		$this->db->delete($tabel, array($id => $val));
	}


	public function create_member($u, $p, $namaKonsumen, $alamat, $email, $telepon, $statusAktif){
		$is_username_exist =($this->db->get_where('tbl_member', array('username' => $u)));
		if(!$is_username_exist){
			$data = array(
				'username' => $u,
				'password' => password_hash($p, PASSWORD_DEFAULT),
				'namaKonsumen' => $namaKonsumen,
				'alamat' => $alamat,
				'email' => $email,
				'telepon' => $telepon,
				'statusAktif' => $statusAktif
			);
			$this->db->insert('tbl_member', $data);
			return true;
		}
		return false;
	}

	public function cek_login_member($u, $p){
		$query = $this->db->get_where('tbl_member', array('username' => $u,'statusAktif' => 'Y' ));
		$check = $query->num_rows();
		$account = $query->row_object();
		$hash = $account->password;
			if($check == 1){
				if(password_verify($p, $hash)){
					return array(
						'loggedIn' => true, 
						'idKonsumen' => $account->idKonsumen
					);
				}
			}
			return array(
				'loggedIn' => false, 
				'idKonsumen' => $account->idKonsumen
			);
	}
	
    public function save_admin($data) {
        $this->db->insert('tbl_admin', $data);
    }
   
	public function save_member($data) {
        $this->db->insert('tbl_member', $data);
    }
}
?>