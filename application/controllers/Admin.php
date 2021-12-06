<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		// CEK APAKAH USER MASIH LOGIN
		if ($this->session->userdata('logged_in') == FALSE || !$this->session->userdata('logged_in')) {
			if (!empty($_SERVER['QUERY_STRING'])) {
				$uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
			} else {
				$uri = uri_string();
			}
			$this->session->set_userdata('redirect', $uri);
			$this->session->set_flashdata('error', "Harap masuk ke akun anda, untuk melanjutkan");
			redirect('masuk');
		}else{
	      // SET ID_USER, SAAT USER MASIH LOGIN
			$this->id_user        = $this->session->userdata('id_user');
			$this->nama           = $this->session->userdata('nama');
			$this->email_user     = $this->session->userdata('email');
		}
		
		$this->load->model(['M_admin', 'M_beranda', 'M_desainer']);
	}
	
	public function index()
	{	
		$data['total_desain']		= $this->M_admin->get_totalDesain();
		$data['total_desainer']		= $this->M_admin->get_totalDesainer();
		$data['total_request']		= $this->M_admin->get_totalRequest();
		$data['total_pembayaran']	= $this->M_admin->get_totalPembayaran();
		$this->template_backend->view('admin/dashboard', $data);
	}

	public function daftar_pengguna(){
		$data['total_pengguna']		= $this->M_admin->get_totalPengguna();
		$data['pengguna']			= $this->M_admin->get_daftarPengguna();
		$this->template_backend->view('admin/daftar_pengguna', $data);
	}

	public function daftar_desainer(){
		$data['total_desainer']		= $this->M_admin->get_totalDesainer();
		$data['desainer']			= $this->M_admin->get_daftarDesainer();
		$this->template_backend->view('admin/daftar_desainer', $data);
	}

	function detail_desainer($ID_DESAINER){
		$data['total_desain']		= $this->M_desainer->get_totalDesain($ID_DESAINER);
		$data['total_request']		= $this->M_desainer->get_totalRequest($ID_DESAINER);
		$data['total_pendapatan']	= $this->M_desainer->get_totalPendapatan($ID_DESAINER);

		$data['desainer']			= $this->M_admin->get_detailDesainer($ID_DESAINER);
		$data['desain']				= $this->M_admin->get_dataDesain($ID_DESAINER);
		$this->template_backend->view('admin/desainer_detail', $data);
	}

	public function daftar_request(){
		$data['total_request']		= $this->M_admin->get_totalRequest();
		$data['request_proses']		= $this->M_admin->get_requestProses();
		$data['request_selesai']	= $this->M_admin->get_requestSelesai();
		$data['request_tolak']		= $this->M_admin->get_requestTolak();
		$data['request']			= $this->M_admin->get_daftarRequest();
		$this->template_backend->view('admin/daftar_request', $data);
	}

	public function daftar_pembayaran(){
		$data['total_pembayaran']	= $this->M_admin->get_totalPembayaran();
		$data['pembayaran_pending']	= $this->M_admin->get_pembayaranPending();
		$data['pembayaran_selesai']	= $this->M_admin->get_pembayaranSelesai();
		$data['pembayaran_tolak']	= $this->M_admin->get_pembayaranTolak();
		$data['pembayaran']			= $this->M_admin->get_daftarPembayaran();
		$this->template_backend->view('admin/daftar_pembayaran', $data);
	}

	public function berita(){
		$data['kategori']			= $this->M_beranda->get_kategori();
		$data['berita']				= $this->M_admin->get_berita();
		$this->template_backend->view('admin/berita', $data);
	}

	public function posting_berita(){
		$data['kategori']			= $this->M_beranda->get_kategori();
		$this->template_backend->view('admin/berita_posting', $data);
	}

	public function edit_berita($link){
		$data['kategori']			= $this->M_beranda->get_kategori();
		$data['berita']				= $this->M_admin->get_detailBerita($link);
		$this->template_backend->view('admin/berita_edit', $data);
	}
}
