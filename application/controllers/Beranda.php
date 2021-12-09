<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['M_beranda', 'M_pembayaran', 'M_admin', 'M_desainer']);
	}
	
	public function index()
	{
		$this->template_frontend->view('beranda');
	}
	
	// DESAIN
	public function temukan_desain($by = null, $find = null)
	{
		$data['kategori']					= $this->M_beranda->get_kategori();
		$data['tag_list']					= $this->M_beranda->get_tagList();
		$data['desain']						= $this->M_beranda->get_daftarDesain($by, $find);
		$this->template_frontend->view('desain_temukan', $data);
	}
	
	public function detail_desain($link)
	{
		$desain								= $this->M_beranda->get_detailDesain($link);
		$data['desain']						= $desain;

		$data['poster']						= $this->M_beranda->get_posterAll($desain->ID_DESAIN);
		$data['komentar']					= $this->M_beranda->get_komentarDesain($desain->ID_DESAIN);
		$this->template_frontend->view('desain_detail', $data);
	}
	
	// DESAINER
	public function temukan_desainer()
	{
		$data['desainer']					= $this->M_admin->get_daftarDesainer();
		$this->template_frontend->view('desainer_daftar', $data);
	}
	
	public function detail_desainer($id)
	{
		$data['total_desain']		= $this->M_desainer->get_totalDesain($id);
		$data['total_request']		= $this->M_desainer->get_totalRequest($id);

		$data['desainer']			= $this->M_admin->get_detailDesainer($id);
		$data['desain']				= $this->M_admin->get_dataDesain($id);
		$this->template_frontend->view('desainer_detail', $data);
	}
	
	// BERITA
	public function berita($by = null, $find = null)
	{
		$data['kategori']					= $this->M_beranda->get_kategori();
		$data['tag_list']					= $this->M_beranda->get_tagListBerita();
		$data['berita']						= $this->M_beranda->get_daftarBerita($by, $find);
		$this->template_frontend->view('berita', $data);
	}
	
	public function detail_berita($link)
	{
		$data['kategori']					= $this->M_beranda->get_kategori();
		$data['tag_list']					= $this->M_beranda->get_tagListBerita();
		$berita								= $this->M_beranda->get_detailBerita($link);
		$data['berita']						= $berita;
		$data['komentar']					= $this->M_beranda->get_komentarBerita($berita->ID_BERITA);
		$this->M_beranda->add_viewer($link);
		$this->template_frontend->view('berita_detail', $data);
	}


	// PROSES
	public function komentarDesain(){
		if ($this->M_beranda->kirim_komentarDesain() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengirimkan komentar !");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengirimkan komentar !");
			redirect($this->agent->referrer());
		}
	}
	
	public function komentarBerita(){
		if ($this->M_beranda->komentarBerita() == TRUE) {
			$this->session->set_flashdata('success', "Berhasil mengirimkan komentar !");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengirimkan komentar !");
			redirect($this->agent->referrer());
		}
	}

	public function hapus_komentar($ID_KOMENTAR){
		if ($this->M_beranda->hapus_komentar($ID_KOMENTAR) == TRUE) {
			$this->session->set_flashdata('success', "Berhasil menghapus komentar !");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat menghapus komentar !");
			redirect($this->agent->referrer());
		}
	}

	// DOWNLOADER
	function download($kode = NULL, $filename = NULL) {

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

			    // update didownload

			$tot_download = ($this->M_pembayaran->get_didownload($kode))+1;

			$this->db->where('ID_DESAIN', $kode);
			$this->db->update('tb_desain', array('DIDOWNLOAD' => $tot_download));

			$subject  = "Terima kasih telah mendownload desain #{$kode}";
			$message  = "Hai {$this->nama}, terima kasih telah mendownload desain #{$kode}. Jangan lupa support desainer! </br></br></br></br>";

			$this->send_email($this->email_user, $subject, $message);

				// load download helder
			$this->load->helper('download');
				// read file contents
			$data = file_get_contents(base_url("berkas/desain/".$kode."/".$filename));
			force_download($filename, $data);

			$this->session->set_flashdata('success', "File anda telah terdownload !");
			redirect($this->agent->referrer());
		}
	}
	function download_request($kode = NULL, $filename = NULL) {

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

			$subject  = "Terima kasih telah mendownload desain hasil requestmu #{$kode}";
			$message  = "Hai {$this->nama}, kamu telah mendownload desain hasil request #{$kode}. Jangan lupa support desainer! </br></br></br></br>";

			$this->send_email($this->email_user, $subject, $message);

				// load download helder
			$this->load->helper('download');
				// read file contents
			$data = file_get_contents(base_url("berkas/desain/".$kode."/".$filename));
			force_download($filename, $data);

			$this->session->set_flashdata('success', "File anda telah terdownload !");
			redirect($this->agent->referrer());
		}
	}

	function test(){
		
		$JUDUL  = "Desain pertamaku #2";

		$word   = preg_replace("/[^a-zA-Z0-9]+/", "-", $JUDUL);
		$word   = strtolower($word);
		echo $word;
	}

	function request_desain(){
			
		$desainer  	= $this->M_admin->get_detailDesainer($this->input->post('id_desainer'));
			
		$pengguna  	= $this->M_beranda->get_detailPengguna($this->session->userdata('id_user'));

		$id_request = $this->M_beranda->count_request();
		$id_request = $id_request+1;

	    // UPLOAD
	    if (!empty($_FILES['FILE']['name'])) {
	      // CREATE FILENAME
	      $path     = $_FILES['FILE']['name'];
	      $ext      = pathinfo($path, PATHINFO_EXTENSION);

	      $time   	= time();
	      $filename = "FILE-Tambahan{$time}.{$ext}";

	      $folder   = "berkas/request/{$id_request}/";

	      if (!is_dir($folder)) {
	        mkdir($folder, 0755, true);
	      }

	      // UPLOAD FILE
	      $config['upload_path']    = $folder;
	      $config['allowed_types']  = '*';
	      $config['max_size']       = 20*1024;
	      $config['file_name']      = $filename;
	      $config['overwrite']      = TRUE;

	      $this->load->library('upload', $config);

	      if (!$this->upload->do_upload('FILE')){
	        $this->session->set_flashdata('error', 'Terjadi kesalahan saat meng-upload file anda !');
	        redirect($this->agent->referrer());
	      }else {

			if ($this->M_beranda->request_desain($id_request, $pengguna->ID_USER, $desainer->ID_USER, $filename) == TRUE){
				
				$catatan  = $this->input->post('catatan');
				$subject  = "Terraflair - Request desain baru {$id_request} !";
				$message  = "Hai {$desainer->NAMA}, kamu mendapatkan request baru untuk <i>{$this->input->post('judul')}</i> dari <b>{$pengguna->NAMA}</b>. </br></br><b>NB (catatan dari pengguna)</b>: <i>{$catatan}</i></br></br></br>";
				$dir 	  = $id_request;
				$file 	  = $filename;

				$this->send_emailAttach($desainer->EMAIL, $subject, $message, $dir, $file);

				$this->session->set_flashdata('success', 'Berhasil mengirimkan request desain !');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengirimkan request desain !');
				redirect($this->agent->referrer());
			}

	      }
	    }else {

			if ($this->M_beranda->request_desain($id_request, $pengguna->ID_USER, $desainer->ID_USER, null) == TRUE){
				
				$catatan  = $this->input->post('catatan');
				$subject  = "Terraflair - Request desain baru {$id_request} !";
				$message  = "Hai {$desainer->NAMA}, kamu mendapatkan request baru untuk <i>{$this->input->post('judul')}</i> dari <b>{$pengguna->NAMA}</b>. <br><br><b>NB (catatan dari pengguna)</b>: <i>{$catatan}</i></br></br></br>";

				$this->send_email($desainer->EMAIL, $subject, $message);

				$this->session->set_flashdata('success', 'Berhasil mengirimkan request desain !');
				redirect($this->agent->referrer());
			}else{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengirimkan request desain !');
				redirect($this->agent->referrer());
			}
	    }
	}

	// MAILER SENDER

	function send_email($email, $subject, $message){

		$mail = array(
			'to' 			  => $email,
			'subject'		=> $subject,
			'message'		=> $message
		);

		if ($this->mailer->send($mail) == TRUE) {
			return true;
		}else {
			return false;
		}
	}

	// MAILER SENDER Attach

	function send_emailAttach($email, $subject, $message, $dir, $file){

		$mail = array(
			'to' 			=> $email,
			'subject'		=> $subject,
			'message'		=> $message,
			'dir'			=> $dir,
			'file'			=> $file
		);

		if ($this->mailer->sendAttach($mail) == TRUE) {
			return true;
		}else {
			return false;
		}
	}
}
