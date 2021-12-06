<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desainer extends CI_Controller {

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

		// LOAD MODEL
		$this->load->model(['M_desainer', 'M_beranda']);

	}
	
	public function index()
	{
		// COUNTER
		$data['total_desain']		= $this->M_desainer->get_totalDesain($this->id_user);
		$data['total_request']		= $this->M_desainer->get_totalRequest($this->id_user);
		$data['total_dijual']		= $this->M_desainer->get_totalDijual($this->id_user);
		$data['total_pendapatan']	= $this->M_desainer->get_totalPendapatan($this->id_user);

		// DATA
		$data['request_terbaru']	= $this->M_desainer->get_requestTerbaru($this->id_user);
		$data['pembayaran_terbaru']	= $this->M_desainer->get_pembayaranTerbaru($this->id_user);

		$this->template_backend->view('desainer/dashboard', $data);
	}
	
	public function desainku($by = null, $find = null)
	{
		$data['total_desain']		= $this->M_desainer->get_totalDesain($this->id_user);
		$data['desain_berbayar']	= $this->M_desainer->get_desainBerbayar($this->id_user);
		$data['desain_dijual']		= $this->M_desainer->get_totalDijual($this->id_user);
		
		$data['kategori']					= $this->M_beranda->get_kategori();
		$data['desain']						= $this->M_desainer->get_dataDesain($this->id_user, $by, $find);
		$this->template_backend->view('desainer/desain/data_desain', $data);
	}
	
	public function edit_desain($link)
	{
		
		$desain										= $this->M_beranda->get_detailDesain($link);
		$data['desain']						= $desain;

		$data['poster']						= $this->M_beranda->get_posterAll($desain->ID_DESAIN);

		$data['kategori']					= $this->M_beranda->get_kategori();
		$this->template_backend->view('desainer/desain/edit_desain', $data);
	}
	
	public function upload_desain()
	{
		// ATUR RULES GENERATE ID DESAIN
		$vocal  = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", " ");
		$scrap  = str_replace($vocal, "", $this->nama);
		$begin  = substr($scrap, 0, 4);

		$chars 	= "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$uniqid = "";

		// GENERATE ID DESAIN
		do {
			for ($i = 0; $i < 8; $i++){
				$uniqid      .= $chars[mt_rand(0, strlen($chars)-1)];
				$ID_DESAIN 		= strtoupper($begin.'_'.$uniqid);
			}

		} while ($this->M_desainer->desain_id($ID_DESAIN) > 0);

		$data['kategori']		= $this->M_beranda->get_kategori();
		$data['id_desain']	= $ID_DESAIN;

		$this->template_backend->view('desainer/desain/upload_desain', $data);
	}
	
	public function request()
	{
		$data['total_request']		= $this->M_desainer->get_totalRequest($this->id_user);
		$data['request_pending']	= $this->M_desainer->get_requestPending($this->id_user);
		$data['request_proses']		= $this->M_desainer->get_requestProses($this->id_user);
		$data['request_selesai']	= $this->M_desainer->get_requestSelesai($this->id_user);
		
		$data['request']			= $this->M_desainer->get_dataRequest($this->id_user);
		$this->template_backend->view('desainer/request/request', $data);
	}
	
	public function detail_request($id_request = 0)
	{		
		$data['request']				= $this->M_desainer->get_detailRequest($id_request);
		$data['pembayaran']				= $this->M_desainer->cek_pembayaranRequest($id_request);
		$this->template_backend->view('desainer/request/detail_request', $data);
	}
	
	public function pengiriman()
	{
		$this->template_backend->view('desainer/request/pengiriman');
	}
	
	public function pembayaran()
	{
		$data['total_pembayaran']				= $this->M_desainer->get_totalPembayaran($this->id_user);
		$data['menunggu_konfirmasi'] 			= $this->M_desainer->get_menungguKonfirmasi($this->id_user);
		$data['total_pendapatan']				= $this->M_desainer->get_totalPendapatan($this->id_user);

		$data['pembayaran']						= $this->M_desainer->get_pembayaran($this->id_user);
		$data['request']			= $this->M_desainer->get_pembayaran($this->id_user);
		$this->template_backend->view('desainer/pembayaran', $data);
	}
	
	public function pengaturan()
	{
		$this->template_backend->view('desainer/pengaturan');
	}

	public function informasi_pribadi(){
		$data['info']				= $this->M_desainer->get_detailDesainer($this->id_user);
		$this->template_backend->view('desainer/pengaturan/informasi_pribadi', $data);
	}

	public function metode_pembayaran(){
		$data['metode_list']		= $this->M_desainer->get_metodeDesainer($this->id_user);

		$this->template_backend->view('desainer/pengaturan/metode_pembayaran', $data);
	}

	public function credentials(){
		$data['info']				= $this->M_desainer->get_detailDesainer($this->id_user);
		$this->template_backend->view('desainer/pengaturan/credentials', $data);
	}

	function upload_poster($id_desain){

		// ATUR FOLDER UPLOAD DESAIN
		$folder 			= "berkas/desain/{$id_desain}/";

		if (!is_dir($folder)) {
			mkdir($folder, 0755, true);
		}

		$string_file 	= "POSTER-{$id_desain}_".substr(time(), 3);

		$config['upload_path']          = $folder;
		$config['allowed_types']        = '*';
		$config['max_size']             = 20*1024;
		$config['overwrite']            = true;
		$config['file_name']            = $string_file;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('POSTER'))
		{
			$upload_data 	= $this->upload->data();
			$data = array('ID_DESAIN' => $id_desain, 'POSTER' => $upload_data['file_name']);
			$this->db->insert('tb_poster', $data);
		}
	}

	function delete_poster($filename){
		$this->db->where('POSTER', $filename);
		$this->db->delete('tb_poster');
	}


	// PROSES
	function proses_uploadDesain($id_desain){
		// ATUR FOLDER UPLOAD DESAIN
		$folder 			= "berkas/desain/{$id_desain}/";

		if (!is_dir($folder)) {
			mkdir($folder, 0755, true);
		}

		// GENERATE LINK DESAIN
		$JUDUL      = $this->input->post('JUDUL');

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
		} while ($this->M_desainer->desain_link($link) > 0);

		if (!empty($_FILES['FILE']['name']))
		{

			// atur nama file saat upload
			$string_file = strtolower("file_".$link."_".substr(time(), 0, 3));

			$config['upload_path']          = $folder;
			$config['allowed_types']        = '*';
			$config['max_size']             = 20*1024;
			$config['overwrite']            = true;
			$config['file_name']            = $string_file;

			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload('FILE'))
			{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat menunggah Karya anda!!');
				redirect($this->agent->referrer());
			}
			else
			{

				$upload_data 	= $this->upload->data();
				if ($this->M_desainer->upload_desain($this->id_user, $id_desain, $upload_data['file_name'], $link) == TRUE){
					$this->session->set_flashdata('success', 'Berhasil mengupload desain anda !');
					redirect(site_url('desainer/desainku'));
				}else{
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengupload desain anda !');
					redirect($this->agent->referrer());
				}
			}

		}
		else
		{
			$this->session->set_flashdata('warning', 'Harap tambahkan file desain !');
			redirect($this->agent->referrer());
		}
	}
	
	function proses_editDesain($id_desain){
		// ATUR FOLDER UPLOAD DESAIN
		$folder 			= "berkas/desain/{$id_desain}/";

		// GENERATE LINK DESAIN
		$JUDUL      = $this->input->post('JUDUL');

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
		} while ($this->M_desainer->desain_link($link) > 0);

		if (!is_dir($folder)) {
			mkdir($folder, 0755, true);
		}

		if (!empty($_FILES['FILE']['name']))
		{

			// atur nama file saat upload
			$string_file = strtolower("file_".$link."_".substr(time(), 0, 3));

			$config['upload_path']          = $folder;
			$config['allowed_types']        = '*';
			$config['max_size']             = 20*1024;
			$config['overwrite']            = true;
			$config['file_name']            = $string_file;

			$this->load->library('upload', $config);

			if ( !$this->upload->do_upload('FILE'))
			{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat menunggah Karya anda!!');
				redirect($this->agent->referrer());
			}
			else
			{

				$upload_data 	= $this->upload->data();
				if ($this->M_desainer->edit_desain($id_desain, $upload_data['file_name'], $link) == TRUE){
					$this->session->set_flashdata('success', 'Berhasil mengupload desain anda !');
					redirect(site_url('desainer/desainku'));
				}else{
					$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengupload desain anda !');
					redirect($this->agent->referrer());
				}
			}

		}
		else
		{
			if ($this->M_desainer->edit_desain($id_desain, null, $link) == TRUE){
				$this->session->set_flashdata('success', 'Berhasil mengupload desain anda !');
				redirect(site_url('desainer/desainku'));
			}else{
				$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengupload desain anda !');
				redirect($this->agent->referrer());
			}
		}
	}

	function delete_desain($id_desain){
		if ($this->M_desainer->delete_desain($id_desain) == TRUE){
			$this->session->set_flashdata('success', 'Berhasil menghapus desain anda !');
			redirect(site_url('desainer/desainku'));
		}else{
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus desain anda !');
			redirect($this->agent->referrer());
		}
	}

	function proses_ubahInfo(){
		if ($this->M_desainer->proses_ubahInfo() == TRUE){
			$this->session->set_flashdata('success', 'Berhasil mengubah informasi pribadi anda !');
			redirect(site_url('desainer/pengaturan/informasi-pribadi'));
		}else{
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat  mengubah informasi pribadi anda !');
			redirect($this->agent->referrer());
		}
	}

  function proses_ubahFoto(){
    $id_user = $this->session->userdata('id_user');
    // UPLOAD
    if (!empty($_FILES['PROFIL']['name'])) {
      // CREATE FILENAME
      $path     = $_FILES['PROFIL']['name'];
      $ext      = pathinfo($path, PATHINFO_EXTENSION);

      $time   	= time();
      $filename = "PROFIL_{$time}.{$ext}";

      $folder   = "berkas/profil/desainer/{$id_user}/";

      if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
      }

      // UPLOAD FILE
      $config['upload_path']    = $folder;
      $config['allowed_types']  = '*';
      $config['max_size']       = 2*1024;
      $config['file_name']      = $filename;
      $config['overwrite']      = TRUE;

      $this->load->library('upload', $config);

      if (!$this->upload->do_upload('PROFIL')){
        $this->session->set_flashdata('error', 'Terjadi kesalahan saat meng-upload foto anda !');
        redirect($this->agent->referrer());
      }else {

        $this->db->where('ID_USER', $this->session->userdata('id_user'));
        $this->db->update('tb_user', array('PROFIL' => $filename));
        $cek = ($this->db->affected_rows() != 1) ? false : true;
        if ($cek == TRUE) {
          $this->session->set_flashdata('success', 'Berhasil mengubah foto anda !');
          redirect($this->agent->referrer());
        }else {
          $this->session->set_flashdata('error', "Terjadi kesalahan saat mengubah foto anda !");
          redirect($this->agent->referrer());
        }
      }
    }else {
      $this->session->set_flashdata('error', 'Harap pilih foto untuk dapat diupload!!');
      redirect($this->agent->referrer());
    }
  }

	function proses_tambahMetode(){
		if ($this->M_desainer->proses_tambahMetode() == TRUE){
			$this->session->set_flashdata('success', 'Berhasil menambahkan metode pembayaran !');
			redirect(site_url('desainer/pengaturan/metode-pembayaran'));
		}else{
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat menambahkan metode pembayaran !');
			redirect($this->agent->referrer());
		}
	}

	function proses_editMetode($id_metode){
		if ($this->M_desainer->proses_editMetode($id_metode) == TRUE){
			$this->session->set_flashdata('success', 'Berhasil mengubah metode pembayaran !');
			redirect(site_url('desainer/pengaturan/metode-pembayaran'));
		}else{
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat mengubah metode pembayaran !');
			redirect($this->agent->referrer());
		}
	}

	function proses_hapusMetode($id_metode){
		if ($this->M_desainer->proses_hapusMetode($id_metode) == TRUE){
			$this->session->set_flashdata('success', 'Berhasil menghapus metode pembayaran !');
			redirect(site_url('desainer/pengaturan/metode-pembayaran'));
		}else{
			$this->session->set_flashdata('error', 'Terjadi kesalahan saat menghapus metode pembayaran !');
			redirect($this->agent->referrer());
		}
	}

}
