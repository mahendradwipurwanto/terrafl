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

  function count_katBerita($ID_KATEGORI){
    return $this->db->get_where('tb_berita', array('ID_KATEGORI' => $ID_KATEGORI))->num_rows();
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

  function get_daftarBerita($by, $find){
    $this->db->select('*');
    $this->db->from('tb_berita tb');
    $this->db->join('tb_kategori tk', 'tb.ID_KATEGORI = tk.ID_KATEGORI');
    if($by == "kategori" AND $by != null AND $find != null){
      $this->db->like('tk.KATEGORI', $find, 'both'); 
    }
    if($by == "tag" AND $by != null AND $find != null){
      $this->db->like('tb.TAG', $find, 'both'); 
    }
    if($by == "cari"){
      $find = $this->input->get('q');
      $this->db->like('tb.JUDUL', $find, 'both');
      $this->db->or_like('tb.KONTEN', $find, 'both');  
    }
    $this->db->where('tb.DRAFT', 0);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_tagListBerita(){
    $query = $this->db->query("SELECT GROUP_CONCAT(TAG SEPARATOR ',') as TAG FROM tb_berita LIMIT 0, 10");
    if ($query->num_rows() > 0) {
      return $query->row()->TAG;
    } else {
      return false;
    }
  }

  function count_komentarBerita($ID_BERITA){
    return $this->db->get_where('tb_komentar', array('ID_BERITA' => $ID_BERITA))->num_rows();
  }

  function get_detailBerita($link_berita){
    $this->db->select('*');
    $this->db->from('tb_berita tb');
    $this->db->join('tb_kategori tk', 'tb.ID_KATEGORI = tk.ID_KATEGORI');
    $this->db->where('tb.LINK_BERITA', $link_berita);
    $query =  $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}else {
			return false;
		}
  }

  function get_komentarBerita($id_berita){
    $this->db->select('tk.*, tu.NAMA, tk.TANGGAL AS TANGGAL_KOMENTAR');
    $this->db->from('tb_komentar tk');
    $this->db->join('tb_user tu', 'tk.ID_USER = tu.ID_USER');
    $this->db->join('tb_berita tb', 'tk.ID_BERITA = tb.ID_BERITA');
    $this->db->where('tb.ID_BERITA', $id_berita);
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

  function komentarBerita(){

    $id_berita  = $this->input->post('id_berita');
    $komentar   = $this->input->post('komentar');

    $data = array(
      'ID_USER'   => $this->session->userdata('id_user'),
      'JENIS'     => 2, #1 Desain, 2 Berita
      'ID_BERITA' => $id_berita,
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

  function get_viewerBerita($link){
    $query = $this->db->get_where('tb_berita', array('LINK_BERITA' => $link));
    if ($query->num_rows() > 0) {
      return $query->row()->VIEWER;
    } else {
      return 0;
    }
  }

  function add_viewer($link){

    $VIEWER     = $this->get_viewerBerita($link);

    $data = array(
      'VIEWER'  => $VIEWER+1,
    );

    $this->db->where('LINK_BERITA', $link);
    $this->db->update('tb_berita', $data);
  }

  function get_detailPengguna($id_user){
    return $this->db->get_where('tb_user', array('ID_USER' => $id_user))->row();
  }

  function count_request(){
    return $this->db->get('tb_request')->num_rows();
  }

  function request_desain($id_request, $id_user, $id_desainer, $file){
    $judul          = $this->input->post('judul');
    $catatan        = $this->input->post('catatan');

    if ($file == null) {
      $request = array(
        'ID_REQUEST'          => $id_request,
        'ID_USER'             => $id_user,
        'ID_DESAINER'         => $id_desainer,
        'JUDUL'               => $judul,
        'CATATAN'             => $catatan,
        'STATUS'              => 0,
        'TANGGAL'             => time(),
      );
      $this->db->insert('tb_request', $request);
    } else {
      $request = array(
        'ID_REQUEST'          => $id_request,
        'ID_USER'             => $id_user,
        'ID_DESAINER'         => $id_desainer,
        'JUDUL'               => $judul,
        'CATATAN'             => $catatan,
        'FILE'                => $file,
        'STATUS'              => 0,
        'TANGGAL'             => time(),
      );
      $this->db->insert('tb_request', $request);
    }
    return ($this->db->affected_rows() != 1) ? false : true;
  }

}
