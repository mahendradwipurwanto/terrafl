<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function get_riwayatRequest($id_user){
		$this->db->select('*');
		$this->db->from('tb_request a');
		$this->db->join('tb_user b', 'a.ID_USER = b.ID_USER');
		$this->db->where('a.ID_USER', $id_user);
		$this->db->order_by('a.TANGGAL', 'DESC');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	function get_riwayatPembayaran($id_user){
		$query = $this->db->query("SELECT a.*, b.*, c.JUDUL, d.JUDUL AS JUDUL_REQUEST FROM tb_pembayaran a LEFT JOIN tb_user b ON a.ID_USER = b.ID_USER LEFT JOIN tb_desain c ON a.ID_DESAIN = c.ID_DESAIN LEFT JOIN tb_request d ON a.ID_REQUEST = d.ID_REQUEST WHERE a.ID_USER = b.ID_USER AND a.ID_USER = '$id_user' ORDER BY a.TANGGAL DESC");
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}
	}

	  function get_detailRequest($id_request){
	    $this->db->select('*');
	    $this->db->from('tb_request a');
	    $this->db->join('tb_user b', 'a.ID_DESAINER = b.ID_USER');
	    $this->db->where('a.ID_REQUEST', $id_request);
	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
	      return $query->row();
	    } else {
	      return false;
	    }
	  }

	function proses_ubahInfo(){
		$nama           	= htmlspecialchars($this->input->post('nama'));
		$no_telp        	= htmlspecialchars($this->input->post('no_telp'));
		$email        	= htmlspecialchars($this->input->post('email'));
		$username        	= htmlspecialchars($this->input->post('username'));
		$password        	= htmlspecialchars($this->input->post('password'));

		if ($this->input->post('password')) {
			$tb_user = array(
				'NAMA'         => $nama,
				'NO_TELP'      => $no_telp,
				'EMAIL'        => $email,
				'USERNAME'     => $username,
				'PASSWORD'     => password_hash($password, PASSWORD_DEFAULT),
			);
		}else{
			$tb_user = array(
				'NAMA'         => $nama,
				'NO_TELP'      => $no_telp,
				'EMAIL'        => $email,
				'USERNAME'     => $username,
			);
		}

		$this->db->where('ID_USER', $this->session->userdata('id_user'));
		$this->db->update('tb_user', $tb_user);
		return ($this->db->affected_rows() != 1) ? false : true;
	}

}
