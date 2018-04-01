<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_model');
	}
	public function index()
	{
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') != "Sekretaris"){
				$data['surat'] = $this->surat_model->get_disposisi_by_jabatan();
				$data['main_view'] = 'surat_masuk_view_user';

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
			if($this->session->userdata('jabatan') != "Sekretaris"){
				$id_surat = $this->uri->segment(3);
				$data['surat'] = $this->surat_model->get_disposisi_surat_masuk_by_id_user($id_surat);
				$data['main_view'] = 'disposisi_surat_user';

				$this->load->view('template', $data);
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
	public function tambah_disposisi_user_view($id_surat){
		if($this->session->userdata('logged_in') == TRUE){
			if($this->session->userdata('jabatan') != "Sekretaris"){
		$data['surat'] = $this->surat_model->get_surat_masuk_by_id($id_surat);
		$data['jabatan'] = $this->surat_model->get_jabatan();
		$data['main_view'] = 'tambah_disposisi_user';
		$this->load->view('template', $data);
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
			if($this->session->userdata('jabatan') != "Sekretaris"){
					$jabatan = $this->surat_model->get_pegawai_by_jabatan($id_jabatan);

					echo json_encode($jabatan);
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
			if($this->session->userdata('jabatan') != "Sekretaris"){
            $this->form_validation->set_rules('id_pegawai_penerima', 'Tujuan Pegawai', 'trim|required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                if($this->surat_model->tambah_disposisi($this->uri->segment(3)) == TRUE ){
                    $this->session->set_flashdata('notif', 'Tambah disposisi berhasil!');
                    if($this->session->userdata('id_jabatan') == '1'){
                        redirect('surat_user/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                    } else {
                        redirect('surat_user/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                    }           
                } else {
                    $this->session->set_flashdata('notif', 'Tambah disposisi gagal!');
                    if($this->session->userdata('id_jabatan') == '1'){
                        redirect('surat_user/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                    } else {
                        redirect('surat_user/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                    }       
                }
            } else {
                $this->session->set_flashdata('notif', validation_errors());
                if($this->session->userdata('id_jabatan') == '1'){
                    redirect('surat_user/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
                } else {
                    redirect('surat_user/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
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
			if($this->session->userdata('jabatan') != "Sekretaris"){
				if($this->surat_model->hapus_disposisi($id_disposisi) == TRUE){
					$this->session->set_flashdata('notif', 'Hapus Disposisi Berhasil');
					redirect('surat_user/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
				}else{
					$this->session->set_flashdata('notif', 'Hapus Disposisi Gagal');
					redirect('surat_user/get_disposisi_surat_masuk_by_id/'.$this->uri->segment(3));
				}
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}
}

/* End of file surat_user.php */
/* Location: ./application/controllers/surat_user.php */