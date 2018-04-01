<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_model');
	}

	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			$data['main_view'] = 'dashboard';
			$this->load->view('template', $data);
		}else{
			redirect('login');
		}	
		
	}

	public function lihat_surat_masuk()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$data['surat'] = $this->surat_model->get_surat_masuk();
				$data['main_view'] = 'surat_masuk_view';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function lihat_surat_keluar()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$data['surat'] = $this->surat_model->get_surat_keluar();
				$data['main_view'] = 'surat_keluar_view';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function tambah_surat_masuk_view()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$data['main_view'] = 'tambah_surat_masuk';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function tambah_surat_keluar_view()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$data['main_view'] = 'tambah_surat_keluar';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function tambah_surat_masuk()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('tgl_kirim', 'Tanggal Kirim', 'trim|required');
				$this->form_validation->set_rules('tgl_terima', 'Tanggal Terima', 'trim|required');
				$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required');
				$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'pdf';
					$config['max_size']  = 2000;
					
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('file_surat')){
						
						if($this->surat_model->tambah_surat_masuk($this->upload->data()) == TRUE){
							$this->session->set_flashdata('notif', 'Tambah Surat Berhasil');
							redirect('surat/tambah_surat_masuk_view');	
						}else{
								$this->session->set_flashdata('notif', 'Tambah Surat Gagal');
							redirect('surat/tambah_surat_masuk_view');		
						}
					
					} else {
					$this->session->set_flashdata('notif', display_errors());
					redirect('surat/tambah_surat_masuk_view');
					}
				}else{
				$this->session->set_flashdata('notif', validation_errors());
					redirect('surat/tambah_surat_masuk_view');
				}
			}else{
					redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function tambah_surat_keluar()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('tgl_kirim', 'Tanggal Kirim', 'trim|required');
				$this->form_validation->set_rules('penerima', 'Penerima', 'trim|required');
				$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'pdf';
					$config['max_size']  = 2000;
					
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('file_surat')){
						
						if($this->surat_model->tambah_surat_keluar($this->upload->data()) == TRUE){
							$this->session->set_flashdata('notif', 'Tambah Surat Berhasil');
							redirect('surat/tambah_surat_keluar_view');	
						}else{
								$this->session->set_flashdata('notif', 'Tambah Surat Gagal');
							redirect('surat/tambah_surat_keluar_view');		
						}
					
					} else {
					$this->session->set_flashdata('notif', display_errors());
					redirect('surat/tambah_surat_keluar_view');
					}
				}else{
				$this->session->set_flashdata('notif', validation_errors());
					redirect('surat/tambah_surat_keluar_view');
				}
			}else{
					redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function get_surat_masuk_by_id()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$id_surat = $this->uri->segment(3);
				$data['surat'] = $this->surat_model->get_surat_masuk_by_id($id_surat);
				$data['main_view'] = 'edit_surat_masuk';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function get_file_surat_masuk_by_id()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$id_surat = $this->uri->segment(3);
				$data['surat'] = $this->surat_model->get_surat_masuk_by_id($id_surat);
				$data['main_view'] = 'edit_file_surat_masuk';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function get_surat_keluar_by_id()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$id_surat = $this->uri->segment(3);
				$data['surat'] = $this->surat_model->get_surat_keluar_by_id($id_surat);
				$data['main_view'] = 'edit_surat_keluar';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function get_file_surat_keluar_by_id()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$id_surat = $this->uri->segment(3);
				$data['surat'] = $this->surat_model->get_surat_keluar_by_id($id_surat);
				$data['main_view'] = 'edit_file_surat_keluar';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function get_disposisi_surat_masuk_by_id()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$id_surat = $this->uri->segment(3);
				$data['surat'] = $this->surat_model->get_disposisi_surat_masuk_by_id($id_surat);
				$data['main_view'] = 'disposisi_surat_sekretaris';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	
	
	public function hapus_surat_masuk($id_surat) 
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				if($this->surat_model->hapus_surat_masuk($id_surat) == TRUE){
					$this->session->set_flashdata('notif', 'Hapus Surat Berhasil');
					redirect('surat/lihat_surat_masuk');
				}else{
					$this->session->set_flashdata('notif', 'Hapus Surat Gagal');
					redirect('surat/lihat_surat_masuk');
				}
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function hapus_surat_keluar($id_surat) 
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				if($this->surat_model->hapus_surat_keluar($id_surat) == TRUE){
					$this->session->set_flashdata('notif', 'Hapus Surat Berhasil');
					redirect('surat/lihat_surat_keluar');
				}else{
					$this->session->set_flashdata('notif', 'Hapus Surat Gagal');
					redirect('surat/lihat_surat_keluar');
				}
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function edit_surat_masuk($id_surat)
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('tgl_kirim', 'Tanggal Kirim', 'trim|required');
				$this->form_validation->set_rules('tgl_terima', 'Tanggal Terima', 'trim|required');
				$this->form_validation->set_rules('pengirim', 'Pengirim', 'trim|required');
				$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

					
					if ($this->form_validation->run() == TRUE){
						
						if($this->surat_model->edit_surat_masuk($id_surat) == TRUE){
							$this->session->set_flashdata('notif', 'Edit Surat Berhasil');
							redirect('surat/lihat_surat_masuk');	
						}else{
								$this->session->set_flashdata('notif', 'Edit Surat Gagal');
							redirect('surat/lihat_surat_masuk');		
						}
					
					} else {
					$this->session->set_flashdata('notif', display_errors());
					redirect('surat/lihat_surat_masuk');
					}
				
			}else{
					redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function edit_surat_keluar($id_surat)
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				$this->form_validation->set_rules('no_surat', 'Nomor Surat', 'trim|required');
				$this->form_validation->set_rules('tgl_kirim', 'Tanggal Kirim', 'trim|required');
				$this->form_validation->set_rules('penerima', 'Penerima', 'trim|required');
				$this->form_validation->set_rules('perihal', 'Perihal', 'trim|required');

					
					if ($this->form_validation->run() == TRUE){
						
						if($this->surat_model->edit_surat_keluar($id_surat) == TRUE){
							$this->session->set_flashdata('notif', 'Edit Surat Berhasil');
							redirect('surat/lihat_surat_keluar');	
						}else{
								$this->session->set_flashdata('notif', 'Edit Surat Gagal');
							redirect('surat/lihat_surat_keluar');		
						}
					
					} else {
					$this->session->set_flashdata('notif', display_errors());
					redirect('surat/lihat_surat_keluar');
					}
				
			}else{
					redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function edit_file_surat_masuk()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){

					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'pdf';
					$config['max_size']  = 2000;
					
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('file_surat')){
						
						if($this->surat_model->edit_file_surat_masuk($this->upload->data(), $this->uri->segment(3)) == TRUE){
							$this->session->set_flashdata('notif', 'Edit File Surat Berhasil');
							redirect('surat/lihat_surat_masuk');	
						}else{
								$this->session->set_flashdata('notif', 'Edit File Surat Gagal');
							redirect('surat/lihat_surat_masuk');		
						}
					
					} else {
					$this->session->set_flashdata('notif', display_errors());
					redirect('surat/lihat_surat_masuk');
					}
	
			}else{
					redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function edit_file_surat_keluar()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){

					$config['upload_path'] = './uploads/';
					$config['allowed_types'] = 'pdf';
					$config['max_size']  = 2000;
					
					$this->load->library('upload', $config);
					
					if ($this->upload->do_upload('file_surat')){
						
						if($this->surat_model->edit_file_surat_keluar($this->upload->data(), $this->uri->segment(3)) == TRUE){
							$this->session->set_flashdata('notif', 'Edit File Surat Berhasil');
							redirect('surat/lihat_surat_keluar');	
						}else{
								$this->session->set_flashdata('notif', 'Edit File Surat Gagal');
							redirect('surat/lihat_surat_keluar');		
						}
					
					} else {
					$this->session->set_flashdata('notif', display_errors());
					redirect('surat/lihat_surat_keluar');
					}
	
			}else{
					redirect('login');
			}
		}else{
			redirect('login');
		}
	}

	public function get_pegawai_by_jabatan($id_jabatan)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if($this->session->userdata('jabatan') == "Sekretaris"){
					$jabatan = $this->surat_model->get_pegawai_by_jabatan($id_jabatan);

					echo json_encode($jabatan);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}

	}
	public function tambah_disposisi_sekretaris_view($id_surat){
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
		$data['surat'] = $this->surat_model->get_surat_masuk_by_id($id_surat);
		$data['jabatan'] = $this->surat_model->get_jabatan();
		$data['main_view'] = 'tambah_disposisi_sekretaris';
		$this->load->view('template', $data);
		}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function tambah_disposisi()
    {
    	if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
            $this->form_validation->set_rules('id_pegawai_penerima', 'Tujuan Pegawai', 'trim|required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                if($this->surat_model->tambah_disposisi($this->uri->segment(3)) == TRUE ){
                    $this->session->set_flashdata('notif', 'Tambah disposisi berhasil!');
                    if($this->session->userdata('id_jabatan') == '1'){
                        redirect('surat/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                    } else {
                        redirect('surat/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                    }           
                } else {
                    $this->session->set_flashdata('notif', 'Tambah disposisi gagal!');
                    if($this->session->userdata('id_jabatan') == '1'){
                        redirect('surat/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                    } else {
                        redirect('surat/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                    }       
                }
            } else {
                $this->session->set_flashdata('notif', validation_errors());
                if($this->session->userdata('id_jabatan') == '1'){
                    redirect('surat/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                } else {
                    redirect('surat/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                }           
            }
            }else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
    }

    public function hapus_disposisi($id_disposisi) 
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') == "Sekretaris"){
				if($this->surat_model->hapus_disposisi($id_disposisi) == TRUE){
					$this->session->set_flashdata('notif', 'Hapus Disposisi Berhasil');
					redirect('surat/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
				}else{
					$this->session->set_flashdata('notif', 'Hapus Disposisi Gagal');
					redirect('surat/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
				}
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}

	
}

/* End of file surat.php */
/* Location: ./application/controllers/surat.php */