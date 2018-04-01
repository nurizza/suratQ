<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function get_surat_masuk()
	{
		return $this->db->get('surat_masuk')
						->result();
	}
	public function get_jabatan()
	{
		return $this->db->get('jabatan')
						->result();
	}
	public function get_surat_keluar()
	{
		return $this->db->get('surat_keluar')
						->result();
	}
	public function tambah_surat_masuk($file_surat)
	{
			$data = array(
						'no_surat' => $this->input->post('no_surat'),
						'tgl_kirim' => $this->input->post('tgl_kirim'),
						'tgl_terima' => $this->input->post('tgl_terima'),
						'pengirim' => $this->input->post('pengirim'),
						'perihal' => $this->input->post('perihal'),
						'file_surat' => $file_surat['file_name']
					);
			$this->db->insert('surat_masuk', $data);
			if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	public function tambah_surat_keluar($file_surat)
	{
			$data = array(
						'no_surat' => $this->input->post('no_surat'),
						'tgl_kirim' => $this->input->post('tgl_kirim'),
						'penerima' => $this->input->post('penerima'),
						'perihal' => $this->input->post('perihal'),
						'file_surat' => $file_surat['file_name']
					);
			$this->db->insert('surat_keluar', $data);
			if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	public function get_surat_masuk_by_id($id_surat)
	{
		return $this->db->where('id_surat_masuk', $id_surat)
						->get('surat_masuk')
						->row();
	}
	public function get_surat_keluar_by_id($id_surat)
	{
		return $this->db->where('id_surat', $id_surat)
						->get('surat_keluar')
						->row();
	}
	public function hapus_surat_masuk($id_surat)
	{
		$this->db->where('id_surat_masuk', $id_surat)
				 ->delete('surat_masuk');
		if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	public function hapus_disposisi($id_disposisi)
	{
		$this->db->where('id_disposisi', $id_disposisi)
				 ->delete('disposisi');
		if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	public function get_disposisi_surat_masuk_by_id($id_surat)
	{	
		return $this->db->join('disposisi', 'disposisi.id_surat = surat_masuk.id_surat_masuk')
						->join('jabatan', 'disposisi.user_pengirim = jabatan.id_jabatan')
						->join('user', 'user.id_user = disposisi.penerima')
						->where('disposisi.id_surat', $id_surat)
						->get('surat_masuk')
						->result();
	}
	public function get_disposisi_surat_masuk_by_id_user($id_surat)
	{	
		return $this->db->join('disposisi', 'disposisi.id_surat = surat_masuk.id_surat_masuk')
						->join('jabatan', 'disposisi.user_pengirim = jabatan.id_jabatan')
						->join('user', 'user.id_user = disposisi.penerima')
						->where('disposisi.id_surat', $id_surat)
						->where('disposisi.user_pengirim', $this->session->userdata('id_user')) 
						->get('surat_masuk')
						->result();
	}
	public function get_disposisi_by_jabatan()
	{
		return $this->db->join('disposisi', 'disposisi.id_surat = surat_masuk.id_surat_masuk')
						->join('jabatan', 'disposisi.user_pengirim = jabatan.id_jabatan')
						->join('user', 'user.id_user = disposisi.penerima')
						->where('penerima', $this->session->userdata('id_user'))
						->get('surat_masuk')
						->result();
	}
	public function get_pegawai_by_jabatan($id_jabatan)
	{
		return $this->db->where('id_jabatan', $id_jabatan)
						->get('user')
						->result();
	}
	public function hapus_surat_keluar($id_surat)
	{
		$this->db->where('id_surat', $id_surat)
				 ->delete('surat_keluar');
		if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	public function edit_surat_masuk($id_surat)
	{
		$data = array(
						'no_surat' => $this->input->post('no_surat'),
						'tgl_kirim' => $this->input->post('tgl_kirim'),
						'tgl_terima' => $this->input->post('tgl_terima'),
						'pengirim' => $this->input->post('pengirim'),
						'perihal' => $this->input->post('perihal')
					);
			$this->db->where('id_surat_masuk', $id_surat)
							 ->update('surat_masuk', $data);

			if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	public function edit_surat_keluar($id_surat)
	{
		$data = array(
						'no_surat' => $this->input->post('no_surat'),
						'tgl_kirim' => $this->input->post('tgl_kirim'),
						'penerima' => $this->input->post('penerima'),
						'perihal' => $this->input->post('perihal')
					);
			$this->db->where('id_surat', $id_surat)
							 ->update('surat_keluar', $data);

			if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	public function edit_file_surat_masuk($file_surat, $id_surat)
	{
		$data = array(
						'file_surat' => $file_surat['file_name']
					);
			$this->db->where('id_surat_masuk', $id_surat)
							 ->update('surat_masuk', $data);

			if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	public function edit_file_surat_keluar($file_surat, $id_surat)
	{
		$data = array(
						'file_surat' => $file_surat['file_name']
					);
			$this->db->where('id_surat', $id_surat)
							 ->update('surat_keluar', $data);

			if($this->db->affected_rows() > 0){
				return TRUE;
			}else{
				return FALSE;
			}
	}
	public function tambah_disposisi($id_surat)
	{
		$data = array(
			'id_surat'				=> $id_surat,
			'user_pengirim'	=> $this->session->userdata('id_user'),
			'penerima'	=> $this->input->post('id_pegawai_penerima'),
			'keterangan'			=> $this->input->post('keterangan')
		);
		$this->db->insert('disposisi', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}	
	}


}

/* End of file surat_model.php */
/* Location: ./application/models/surat_model.php */