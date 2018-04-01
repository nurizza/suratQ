<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function cek(){
		$query = $this->db->join('jabatan', 'jabatan.id_jabatan = user.id_jabatan')
						  ->where('username', $this->input->post('username'))
						  ->where('password', $this->input->post('password'))
						  ->get('user');

		if($query->num_rows() == 1){
			$user = $query->row();
			$data = array(
							'logged_in' => TRUE,
							'id_user' =>$user->id_user,
							'username' => $user->username,
							'password' => $user->password,
							'nama' => $user->nama,
							'level' => $user->level,
							'jabatan' => $user->nama_jabatan

						);
			
			$this->session->set_userdata($data);

			return TRUE;
		}else{
			return FALSE;
		}
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */