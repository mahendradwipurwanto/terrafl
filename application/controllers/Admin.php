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

	function tinymce_upload() {
		$config['upload_path'] = './berkas/tmp/post/';
		$config['allowed_types']  = '*';
		$config['max_size']       = 10*1024;
		$config['file_name'] = time();
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('file')) {
			$this->output->set_header('HTTP/1.0 500 Server Error');
			exit;
		} else {
			$file = $this->upload->data();
			$this->output
			->set_content_type('application/json', 'utf-8')
			->set_output(json_encode(['location' => base_url().'berkas/tmp/post/'.$file['file_name']]))
			->_display();
			exit;
		}
	}
	
	public function index()
	{	
		$data['total_desain']		= $this->M_admin->get_totalDesain();
		$data['total_desainer']		= $this->M_admin->get_totalDesainer();
		$data['total_request']		= $this->M_admin->get_totalRequest();
		$data['total_pembayaran']	= $this->M_admin->get_totalPembayaran();

		$data['komentar']			= $this->M_admin->get_komentar();
		$data['kategori']			= $this->M_beranda->get_kategori();
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
				if ($this->M_admin->proses_postingBerita($link, $upload_data['file_name']) == TRUE){
					$this->session->set_flashdata('success', 'Berhasil memposting berita !');
					redirect(site_url('admin/berita'));
				}else{
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat memposting berita !');
					redirect($this->agent->referrer());
				}
			}

		}
		else
		{
			if ($this->M_admin->proses_postingBerita($link, null) == TRUE){
				$this->session->set_flashdata('success', 'Berhasil memposting berita !');
				redirect(site_url('admin/berita'));
			}else{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat memposting berita !');
				redirect($this->agent->referrer());
			}
		}
	}

	public function proses_editBerita(){

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
				if ($this->M_admin->proses_editBerita($link, $upload_data['file_name']) == TRUE){
					$this->session->set_flashdata('success', 'Berhasil memposting berita !');
					redirect(site_url('admin/berita'));
				}else{
					$this->session->set_flashdata('warning', 'Anda tidak merubah apapun !');
					redirect(site_url('admin/berita'));
				}
			}

		}
		else
		{
			if ($this->M_admin->proses_editBerita($link, null) == TRUE){
				$this->session->set_flashdata('success', 'Berhasil memposting berita !');
				redirect(site_url('admin/berita'));
			}else{
				$this->session->set_flashdata('warning', 'Anda tidak merubah apapun !');
					redirect(site_url('admin/berita'));
			}
		}
	}

	public function proses_hapusBerita($id_berita){
		if ($this->M_admin->proses_hapusBerita($id_berita) == TRUE){
			$this->session->set_flashdata('success', 'Berhasil menghapus berita !');
			redirect(site_url('admin/berita'));
		}else{
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus berita !');
			redirect($this->agent->referrer());
		}
	}

	function tambah_kategori(){
		if ($this->M_desainer->tambah_kategori($status) == TRUE){
			$this->session->set_flashdata('success', 'Berhasil menambahkan kategori !');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat enambahkan kategori !');
			redirect($this->agent->referrer());
		}
	}

	function edit_kategori(){
		if ($this->M_desainer->edit_kategori($status) == TRUE){
			$this->session->set_flashdata('success', 'Berhasil mengubah kategori !');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengubah kategorit !');
			redirect($this->agent->referrer());
		}
	}

	function hapus_kategori($id_kategori){
		if ($this->M_desainer->hapus_kategori($id_kategori) == TRUE){
			$this->session->set_flashdata('success', 'Berhasil menghapus kategori !');
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus kategori !');
			redirect($this->agent->referrer());
		}
	}
}
