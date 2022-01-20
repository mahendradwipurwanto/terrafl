<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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

		$this->load->model(['M_beranda', 'M_pembayaran', 'M_admin', 'M_desainer', 'M_pengguna']);
	}
	
	public function index()
	{
		$data['pengguna']		= $this->M_beranda->get_detailPengguna($this->session->userdata('id_user'));
		$this->template_frontend->view('pengguna/beranda', $data);
	}
	
	public function buat_berita()
	{
		$data['kategori']			= $this->M_beranda->get_kategori();
		$data['berita']				= $this->M_admin->get_beritauser($this->id_user);
		$this->template_backend->view('pengguna/buat_berita', $data);
	}

	public function proses_postingBerita(){

		// GENERATE LINK DESAIN
		$JUDUL  = $this->input->post('JUDUL');

		$chars 	= "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$uniqid = "";

		$word   = preg_replace("/[^a-zA-Z0-9]+/", "-", $JUDUL);
		$word   = strtolower($word);
		// GENERATE ID DESAIN
		do {
			for ($i = 0; $i < 4; $i++){
				$uniqid     .= $chars[mt_rand(0, strlen($chars)-1)];
				$link 		  = strtolower($word.'-'.$uniqid);
			}
		} while ($this->M_admin->berita_link($link) > 0);

		// ATUR FOLDER UPLOAD POSTER BERITA
		$folder 			= "berkas/berita/{$link}/";

		if (!is_dir($folder)) {
			mkdir($folder, 0755, true);
		}

		if (!empty($_FILES['POSTER']['name']))
		{

			// atur nama file saat upload
			$string_file = strtolower("poster_".$link."_".substr(time(), 0, 3));

			$config['upload_path']          = $folder;
			$config['allowed_types']        = '*';
			$config['max_size']             = 20*1024;
			$config['overwrite']            = true;
			$config['file_name']            = $string_file;

			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload('POSTER'))
			{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat menunggah poster !');
				redirect($this->agent->referrer());
			}
			else
			{

				$upload_data 	= $this->upload->data();
				if ($this->M_admin->proses_postingBerita($link, $upload_data['file_name'], $this->id_user) == TRUE){
					$this->session->set_flashdata('success', 'Berhasil memposting berita !');
					redirect(base_url());
				}else{
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat memposting berita !');
					redirect($this->agent->referrer());
				}
			}

		}
		else
		{
			if ($this->M_admin->proses_postingBerita($link, null, $this->id_user) == TRUE){
				$this->session->set_flashdata('success', 'Berhasil memposting berita !');
					redirect(base_url());
			}else{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat memposting berita !');
				redirect($this->agent->referrer());
			}
		}
	}
	
	public function riwayat_request()
	{
		$data['pengguna']		= $this->M_beranda->get_detailPengguna($this->session->userdata('id_user'));
		$data['request']		= $this->M_pengguna->get_riwayatRequest($this->session->userdata('id_user'));
		$this->template_frontend->view('pengguna/riwayat_request', $data);
	}
	
	public function detail_request($id)
	{
		$data['pengguna']		= $this->M_beranda->get_detailPengguna($this->session->userdata('id_user'));
		$data['pembayaran']		= $this->M_desainer->cek_pembayaranRequest($id);
		$data['request']		= $this->M_pengguna->get_detailRequest($id);
		$this->template_frontend->view('pengguna/detail_request', $data);
	}
	
	public function riwayat_pembayaran()
	{
		$data['pengguna']		= $this->M_beranda->get_detailPengguna($this->session->userdata('id_user'));
		$data['pembayaran']		= $this->M_pengguna->get_riwayatPembayaran($this->session->userdata('id_user'));
		$this->template_frontend->view('pengguna/riwayat_pembayaran', $data);
	}
	
	// PROSES
	public function proses_ubahInfo(){

		if ($this->input->post('pass')) {
			if ($this->input->post('password') == $this->input->post('kon_pass')) {
				if ($this->M_pengguna->proses_ubahInfo() == TRUE){

					$session_data = array(
						'nama'     	=> $this->input->post('nama'),
						'email'     => $this->input->post('email')
					);

					$this->session->set_userdata($session_data);

					$this->session->set_flashdata('success', "Berhasil mengubah informasi data diri !");
					redirect($this->agent->referrer());
				}else{
					$this->session->set_flashdata('warning', 'Anda tidak melakukan perubahan apapaun !');
					redirect($this->agent->referrer());
				}
			} else {
				$this->session->set_flashdata('warning', 'Password yang anda masukkan tidak sama !');
				redirect($this->agent->referrer());
			}
		} else {
			if ($this->M_pengguna->proses_ubahInfo() == TRUE) {

				$session_data = array(
					'nama'     	=> $this->input->post('nama'),
					'email'     => $this->input->post('email')
				);

				$this->session->set_userdata($session_data);

				$this->session->set_flashdata('success', "Berhasil mengubah informasi data diri !");
				redirect($this->agent->referrer());
			} else {
				$this->session->set_flashdata('warning', 'Anda tidak melakukan perubahan apapaun !');
				redirect($this->agent->referrer());
			}
		}
	}
}
