<?php
class Template_Backend{
	protected $_ci;

	function __construct(){
		$this->_ci = &get_instance();
		$this->_ci->load->database();

	}

	public function cek_desinerMetode($id_user){
		$query = $this->_ci->db->query("SELECT ID_METODE FROM tb_metode WHERE ID_USER = '$id_user'");
		if ($query->num_rows() > 0) {
			return TRUE;
		}else {
			return FALSE;
		}
	}

	public function get_fotoProfil($id_user){
		$query = $this->_ci->db->query("SELECT PROFIL FROM tb_user WHERE ID_USER = '$id_user'");
		if ($query->num_rows() > 0) {
			return $query->row()->PROFIL;
		}else {
			return FALSE;
		}
	}

	function view($content, $data = NULL){

		if ($this->_ci->session->userdata('role') == 1) {
			$data['metode']	= $this->cek_desinerMetode($this->_ci->session->userdata('id_user'));
		}else{
			$data['metode']	= false;
		}

		if($this->_ci->session->userdata('logged_in') == true || $this->_ci->session->userdata('logged_in')){
			$data['profil']	= $this->get_fotoProfil($this->_ci->session->userdata('id_user'));
		}else{
			$data['profil'] = false;
		}

		$this->_ci->load->view('template/back_header',$data);
		$this->_ci->load->view($content, $data);
		$this->_ci->load->view('template/back_footer',$data);

	}
}
