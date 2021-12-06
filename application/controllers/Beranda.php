<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(['M_beranda', 'M_pembayaran']);
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
	public function daftar_desainer()
	{
		$data['desainer']					= $this->M_beranda->get_daftarDesainer();
		$this->template_frontend->view('desainer_daftar', $data);
	}
	
	public function detail_desainer($id)
	{
		$data['desainer']					= $this->M_beranda->get_detailDesainer($id);
		$this->template_frontend->view('desainer_detail', $data);
	}
	
	// BERITA
	public function berita()
	{
		$data['berita']						= $this->M_beranda->get_daftarBerita();
		$this->template_frontend->view('berita', $data);
	}
	
	public function detail_berita($id)
	{
		$data['desainer']						= $this->M_beranda->get_detailDesainer($id);
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

	function test(){
		
		$JUDUL  = "Desain pertamaku #2";

		$word   = preg_replace("/[^a-zA-Z0-9]+/", "-", $JUDUL);
		$word   = strtolower($word);
		echo $word;
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
}
