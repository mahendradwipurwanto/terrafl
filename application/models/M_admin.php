<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	function __construct(){
		parent::__construct();
  }

  function get_totalDesain(){
    return $this->db->get('tb_desain')->num_rows();
  }

  function get_totalDesainer(){
    return $this->db->get_where('tb_user', array('ROLE' => 1))->num_rows();
  }

  function get_totalRequest(){
    return $this->db->get('tb_request')->num_rows();
  }

  function get_totalPembayaran(){
    return $this->db->get('tb_pembayaran')->num_rows();
  }


  function get_totalPengguna(){
    return $this->db->get_where('tb_user', array('ROLE' => 2))->num_rows();
  }


  function get_requestProses(){
    return $this->db->get_where('tb_request', array('STATUS' => 1))->num_rows();
  }

  function get_requestSelesai(){
    return $this->db->get_where('tb_request', array('STATUS' => 2))->num_rows();
  }

  function get_requestTolak(){
    return $this->db->get_where('tb_request', array('STATUS' => 3))->num_rows();
  }


  function get_pembayaranPending(){
    return $this->db->get_where('tb_pembayaran', array('STATUS' => 1))->num_rows();
  }

  function get_pembayaranSelesai(){
    return $this->db->get_where('tb_pembayaran', array('STATUS' => 2))->num_rows();
  }

  function get_pembayaranTolak(){
    return $this->db->get_where('tb_pembayaran', array('STATUS' => 3))->num_rows();
  }


  function get_daftarPengguna(){
    $query = $this->db->get_where('tb_user', array('ROLE' => 2));
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_totalPembelianPengguna($ID_USER){
    return $this->db->get_where('tb_pembayaran', array('ID_USER' => $ID_USER))->num_rows();
  }

  function get_daftarDesainer(){
    $query = $this->db->get_where('tb_user', array('ROLE' => 1));
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_detailDesainer($ID_DESAINER){
    $this->db->select('*');
    $this->db->from('tb_user a');
    $this->db->join('tb_tentang b', 'a.ID_USER = b.ID_USER', 'left');
    $this->db->where('a.ID_USER', $ID_DESAINER);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  function get_dataDesain($ID_DESAINER){
    $this->db->select('*');
    $this->db->from('tb_desain td');
    $this->db->join('tb_kategori tk', 'td.ID_KATEGORI = tk.ID_KATEGORI');
    $this->db->where('ID_USER', $ID_DESAINER);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_daftarRequest(){
    $query = $this->db->query("SELECT a.*, b.*, c.NAMA AS NAMA_DESAINER FROM tb_request a, tb_user b, tb_user c WHERE a.ID_USER = b.ID_USER AND a.ID_DESAINER = c.ID_USER");
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_daftarPembayaran(){
    $query = $this->db->query("SELECT a.*, b.*, c.JUDUL, d.JUDUL AS JUDUL_REQUEST, e.NAMA AS NAMA_DESAINER FROM tb_pembayaran a LEFT JOIN tb_user b ON a.ID_USER = b.ID_USER LEFT JOIN tb_desain c ON a.ID_DESAIN = c.ID_DESAIN LEFT JOIN tb_request d ON a.ID_REQUEST = d.ID_REQUEST LEFT JOIN tb_user e ON a.ID_DESAINER = e.ID_USER WHERE a.ID_USER = b.ID_USER AND a.STATUS > 0 ORDER BY a.TANGGAL DESC");
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_berita(){
    $query = $this->db->get('tb_berita');
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_countCommentBerita($ID_BERITA){
    return $this->db->get_where('tb_komentar', array('ID_BERITA' => $ID_BERITA))->num_rows();
  }

  function get_detailBerita($link){
    $query = $this->db->get_where('tb_berita', array('ID_BERITA' => $link));
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  function link_berita($link){
    return $this->db->get_where('tb_berita', array('ID_BERITA' => $link))->num_rows();
  }

  function proses_postingBerita($link, $file_name){
    $ID_KATEGORI  = $this->input->post('ID_KATEGORI');
    $JUDUL        = $this->input->post('JUDUL');
    $KONTEN       = $this->input->post('KONTEN');

    $data = array(
      'ID_BERITA'     => $link,
      'ID_KATEGORI'   => $ID_KATEGORI,
      'JUDUL'         => $JUDUL,
      'POSTER'        => $file_name,
      'KONTEN'        => $KONTEN,
      'TANGGAL'       => time()
    );

    $this->db->insert('tb_berita', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  function proses_editBerita($link, $file_name){
    $ID_KATEGORI  = $this->input->post('ID_KATEGORI');
    $JUDUL        = $this->input->post('JUDUL');
    $KONTEN       = $this->input->post('KONTEN');

    if ($file_name == null) {
      $data = array(
        'ID_KATEGORI'   => $ID_KATEGORI,
        'JUDUL'         => $JUDUL,
        'KONTEN'        => $KONTEN,
      );
    } else {
      $data = array(
        'ID_KATEGORI'   => $ID_KATEGORI,
        'JUDUL'         => $JUDUL,
        'POSTER'        => $file_name,
        'KONTEN'        => $KONTEN,
      );
    }

    $this->db->where('ID_BERITA', $link);
    $this->db->update('tb_berita', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

  function proses_hapusBerita($link){

    $this->db->where('ID_BERITA', $link);
    $this->db->delete('tb_berita', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }

}
