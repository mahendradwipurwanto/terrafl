<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_beranda extends CI_Model {
	function __construct(){
		parent::__construct();
  }

  function get_kategori(){
    $query = $this->db->get('tb_kategori');
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function count_katDesain($ID_KATEGORI){
    return $this->db->get_where('tb_desain', array('ID_KATEGORI' => $ID_KATEGORI))->num_rows();
  }

  function get_daftarDesain($by, $find){
    $this->db->select('*');
    $this->db->from('tb_desain td');
    $this->db->join('tb_kategori tk', 'td.ID_KATEGORI = tk.ID_KATEGORI');
    if($by == "kategori" AND $by != null AND $find != null){
      $this->db->like('tk.KATEGORI', $find, 'both'); 
    }
    if($by == "tag" AND $by != null AND $find != null){
      $this->db->like('td.TAG', $find, 'both'); 
    }
    if($by == "cari"){
      $find = $this->input->get('q');
      $this->db->like('td.JUDUL', $find, 'both'); 
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_tagList(){
    $query = $this->db->query("SELECT GROUP_CONCAT(TAG SEPARATOR ',') as TAG FROM tb_desain LIMIT 0, 10");
    if ($query->num_rows() > 0) {
      return $query->row()->TAG;
    } else {
      return false;
    }
  }

  function get_poster($id_desain){
		$query = $this->db->query("SELECT POSTER FROM tb_poster WHERE ID_DESAIN = '$id_desain' LIMIT 1");
		if ($query->num_rows() > 0) {
			return $query->row()->POSTER;
		}else {
			return false;
		}
  }

  function get_detailDesain($link_desain){
    $this->db->select('*');
    $this->db->from('tb_desain td');
    $this->db->join('tb_user tu', 'td.ID_USER = tu.ID_USER');
    $this->db->join('tb_tentang tt', 'td.ID_USER = tt.ID_USER', 'LEFT');
    $this->db->join('tb_kategori tk', 'td.ID_KATEGORI = tk.ID_KATEGORI');
    $this->db->where('td.LINK_DESAIN', $link_desain);
    $query =  $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
  }

  function count_desainDesainer($ID_DESAINER){
    return $this->db->get_where('tb_desain', array('ID_USER' => $ID_DESAINER))->num_rows();
  }

  function count_requestDesainer($ID_DESAINER){
    return $this->db->get_where('tb_request', array('ID_DESAINER' => $ID_DESAINER))->num_rows();
  }

  function get_posterAll($id_desain){
		$query = $this->db->query("SELECT POSTER FROM tb_poster WHERE ID_DESAIN = '$id_desain'");
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
  }

  function get_komentarDesain($id_desain){
    $this->db->select('tk.*, tu.NAMA, tk.TANGGAL AS TANGGAL_KOMENTAR');
    $this->db->from('tb_komentar tk');
    $this->db->join('tb_user tu', 'tk.ID_USER = tu.ID_USER');
    $this->db->join('tb_desain td', 'td.ID_DESAIN = tk.ID_DESAIN');
    $this->db->where('td.ID_DESAIN', $id_desain);
    $query =  $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		}else {
			return false;
		}
  }

  // PROSES
  function kirim_komentarDesain(){

    $id_desain  = $this->input->post('id_desain');
    $komentar   = $this->input->post('komentar');

    $data = array(
      'ID_USER'   => $this->session->userdata('id_user'),
      'JENIS'     => 1, #1 Desain, 2 Berita
      'ID_DESAIN' => $id_desain,
      'KOMENTAR'  => $komentar,
      'TANGGAL'   => time(),
    );

    $this->db->insert('tb_komentar', $data);
    return (($this->db->affected_rows() != 1) ? false : true);
  }

  function hapus_komentar($ID_KOMENTAR){

    $this->db->where('ID_KOMENTAR', $ID_KOMENTAR);
    $this->db->delete('tb_komentar');
    return (($this->db->affected_rows() != 1) ? false : true);
  }

}
