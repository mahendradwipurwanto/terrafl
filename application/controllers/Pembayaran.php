<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

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

		$this->load->model(['M_beranda', 'M_desainer', 'M_pembayaran', 'M_masuk', 'M_pengguna']);
	}
	
	public function checkout($link)
	{

		$desain 				= $this->M_beranda->get_detailDesain($link);
		$data['desain'] 		= $desain;
		$data['metode_list']	= $this->M_pembayaran->get_metodeList($desain->ID_USER);
		$data['user']			= $this->M_pembayaran->get_detailUser($this->session->userdata('id_user'));
		$this->template_bayar->view('pembayaran/checkout_desain', $data);
	}
	
	public function checkoutRequest($id)
	{

		$request 				= $this->M_desainer->get_detailRequest($id);
		$data['request'] 		= $request;
		$data['metode_list']	= $this->M_pembayaran->get_metodeList($request->ID_DESAINER);
		$data['user']			= $this->M_pembayaran->get_detailUser($this->session->userdata('id_user'));
		$this->template_bayar->view('pembayaran/checkout_request', $data);
	}
	
	public function invoice()
	{
		$this->template_bayar->view('pembayaran/invoice');
	}
	
	public function bayar($id_pembayaran)
	{

		$pembayaran 		= $this->M_pembayaran->get_detailPembayaran($id_pembayaran);
		$data['desain'] 	= $this->M_beranda->get_detailDesain($pembayaran->LINK_DESAIN);
		$data['pembayaran']	= $pembayaran;
		$data['metode_list']= $this->M_pembayaran->get_metodeList($pembayaran->ID_DESAINER);
		$data['user']		= $this->M_pembayaran->get_detailUser($this->session->userdata('id_user'));
		$this->template_bayar->view('pembayaran/bayar', $data);
	}
	
	public function bayarRequest($id_pembayaran)
	{

		$pembayaran 		= $this->M_pembayaran->get_detailPembayaranRequest($id_pembayaran);
		$data['request'] 	= $this->M_pengguna->get_detailRequest($pembayaran->ID_REQUEST);
		$data['pembayaran']	= $pembayaran;
		$data['metode_list']= $this->M_pembayaran->get_metodeList($pembayaran->ID_DESAINER);
		$data['user']		= $this->M_pembayaran->get_detailUser($this->session->userdata('id_user'));
		$this->template_bayar->view('pembayaran/bayarRequest', $data);
	}

	function save_checkout(){

		// ATUR RULES GENERATE ID DESAIN
		$vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
		$scrap  = str_replace($vocal, "", $this->session->userdata('nama'));
		$begin  = substr($scrap, 0, 4);

		$chars 	= "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$uniqid = "";

		// GENERATE ID DESAIN
		do {
			for ($i = 0; $i < 6; $i++){
				$uniqid      	.= $chars[mt_rand(0, strlen($chars)-1)];
				$id_pembayaran 	= strtolower($begin.'-'.$uniqid);
			}

		} while ($this->M_pembayaran->pembayaran_id($id_pembayaran) > 0);

		if ($this->M_pembayaran->save_checkout($id_pembayaran) == TRUE) {

			$subject  = "Berhasil membuat pesanan #{$id_pembayaran}";
			$message  = "Hai {$this->nama}, pesanan #{$id_pembayaran} telah berhasil dibuat. Harap segera menyelesaikan proses pembayaran. </br></br></br></br>";

			$this->send_email($this->email_user, $subject, $message);

			$this->session->set_flashdata('success', "Berhasil membuat pesanan anda !");
			redirect(site_url('pembayaran/bayar/'.$id_pembayaran));
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat membuat pesanan anda !");
			redirect($this->agent->referrer());
		}
	}

	function save_checkoutRequest(){

		// ATUR RULES GENERATE ID DESAIN
		$vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
		$scrap  = str_replace($vocal, "", $this->session->userdata('nama'));
		$begin  = substr($scrap, 0, 4);

		$chars 	= "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$uniqid = "";

		// GENERATE ID DESAIN
		do {
			for ($i = 0; $i < 6; $i++){
				$uniqid      	.= $chars[mt_rand(0, strlen($chars)-1)];
				$id_pembayaran 	= strtolower($begin.'-'.$uniqid);
			}

		} while ($this->M_pembayaran->pembayaran_id($id_pembayaran) > 0);

		if ($this->M_pembayaran->save_checkoutRequest($id_pembayaran) == TRUE) {

			$subject  = "Berhasil membuat pesanan #{$id_pembayaran}";
			$message  = "Hai {$this->nama}, pesanan #{$id_pembayaran} telah berhasil dibuat. Harap segera menyelesaikan proses pembayaran. </br></br></br></br>";

			$this->send_email($this->email_user, $subject, $message);

			$this->session->set_flashdata('success', "Berhasil membuat pesanan anda !");
			redirect(site_url('pembayaran/bayar-request/'.$id_pembayaran));
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat membuat pesanan anda !");
			redirect($this->agent->referrer());
		}
	}

	function upload_buktiBayar(){
		$id_pembayaran = $this->input->post('id_pembayaran');
		// ATUR FOLDER UPLOAD DESAIN
		$folder 			= "berkas/pembayaran/{$id_pembayaran}/";

		if (!is_dir($folder)) {
			mkdir($folder, 0755, true);
		}

		if (!empty($_FILES['bukti_bayar']['name']))
		{

			// atur nama file saat upload
			$string_file = strtolower("bukti_".$id_pembayaran."_".substr(time(), 3));

			$config['upload_path']          = $folder;
			$config['allowed_types']        = '*';
			$config['max_size']             = 10*1024;
			$config['overwrite']            = true;
			$config['file_name']            = $string_file;

			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload('bukti_bayar'))
			{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat menunggah bukti pembayaran !');
				redirect($this->agent->referrer());
			}
			else
			{

				$upload_data 	= $this->upload->data();
				if ($this->M_pembayaran->upload_buktiBayar($id_pembayaran, $upload_data['file_name']) == TRUE){

					$subject  = "Konfirmasi upload bukti pembayaran";
					$message  = "Hai {$this->nama}, bukti pembayaran kamu untuk pembayaran #{$id_pembayaran} telah berhasil diterima oleh desainer. Harap tunggu desainer untuk mengkonfirmasi apakah bukti pembayaran valid atau tidak </br></br></br></br>";

					$this->send_email($this->email_user, $subject, $message);

					$this->session->set_flashdata('success', 'Berhasil menunggah bukti pembayaran !');
					redirect(base_url());
				}else{
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat menunggah bukti pembayaran !');
					redirect($this->agent->referrer());
				}
			}

		}
		else
		{
			$this->session->set_flashdata('warning', 'Harap memilih file !');
			redirect($this->agent->referrer());
		}
	}

	function konfirmasi($id_pembayaran){
		if ($this->M_pembayaran->konfirmasi($id_pembayaran) == TRUE) {

			$user     = $this->M_masuk->get_user($email);

			if ($this->input->post('status') == 2) {
				$subject  = "Bukti pembayaran diterima";
				$message  = "Hai {$user->NAMA}, bukti pembayaran kamu untuk pembayaran #{$id_pembayaran} telah <b>DIKONFIRMASI</b> oleh desainer. Link download untuk desain anda akan tersedia dimenu riwayat pembayaran anda. </br></br></br></br>";

				$this->send_email($user->EMAIL, $subject, $message);
			}
			$this->session->set_flashdata('success', "Berhasil mengubah status pembayaran !");
			redirect($this->agent->referrer());
		} else {
			$this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah status pembayaran !");
			redirect($this->agent->referrer());
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
}
