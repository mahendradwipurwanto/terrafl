<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_Model {
	function __construct(){
		parent::__construct();
  }

  function get_detailUser($id_user){
    return $this->db->get_where('tb_user', array('ID_USER' => $id_user))->row();
  }

  function pembayaran_id($id_pembayaran){
    $query = $this->db->query("SELECT * FROM tb_pembayaran WHERE ID_PEMBAYARAN = '$id_pembayaran'");
    return $query->num_rows();

  }

  function get_detailPembayaran($id_pembayaran){
    $this->db->select('*');
    $this->db->from('tb_pembayaran tp');
    $this->db->join('tb_user tu', 'tp.ID_DESAINER = tu.ID_USER');
    $this->db->join('tb_desain td', 'tp.ID_DESAIN = td.ID_DESAIN');
    $this->db->where('tp.ID_PEMBAYARAN', $id_pembayaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    }else {
      return false;
    }
  }

  function get_metodeList($id_user){
    $this->db->select('*');
    $this->db->from('tb_user tu');
    $this->db->join('tb_metode tm', 'tu.ID_USER = tm.ID_USER', 'LEFT');
    $this->db->where('tu.ID_USER', $id_user);
    $query =  $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    }else {
      return false;
    }
  }

  function get_didownload($id_desain){
    return $this->db->get_where('tb_desain', array('ID_DESAIN' => $id_desain))->row()->DIDOWNLOAD;
  }

  function save_checkout($id_pembayaran){

    $id_desain    = $this->input->post('id_desain');
    $id_desainer  = $this->input->post('id_desainer');
    $via          = $this->input->post('via');
    $atas_nama    = $this->input->post('atas_nama');
    $nomor        = $this->input->post('nomor');
    $nominal      = $this->input->post('nominal');

    $data = array(
      'ID_PEMBAYARAN' => $id_pembayaran,
      'ID_DESAIN'     => $id_desain,
      'ID_USER'       => $this->session->userdata('id_user'),
      'ID_DESAINER'   => $id_desainer,
      'JENIS'         => 1, #1 desain, 2 request
      'VIA'           => $via,
      'ATAS_NAMA'     => $atas_nama,
      'NOMOR'         => $nomor,
      'NOMINAL'       => $nominal,
      'STATUS'        => 0,
      'TANGGAL'       => time(),
    );

    // update didownload

    $tot_download = ($this->get_didownload($id_desain))+1;

    $this->db->where('ID_DESAIN', $id_desain);
    $this->db->update('tb_desain', array('DIDOWNLOAD' => $tot_download));

    $this->db->insert('tb_pembayaran', $data);
    return ($this->db->affected_rows() != 1 ? false : true);
  }

  function upload_buktiBayar($id_pembayaran, $filename){

    $catatan          = $this->input->post('catatan');

    $data = array(
      'TANGGAL_PEMBAYARAN'  => time(),
      'BUKTI_BAYAR'         => $filename,
      'STATUS'              => 1,
      'CATATAN'             => $catatan,
    );

    $this->db->where('ID_PEMBAYARAN', $id_pembayaran);
    $this->db->update('tb_pembayaran', $data);
    return ($this->db->affected_rows() != 1 ? false : true);
  }

  function konfirmasi($id_pembayaran){
    $status = $this->input->post('status');

    $data = array(
      'STATUS' => $status,
    );

    $this->db->where('ID_PEMBAYARAN', $id_pembayaran);
    $this->db->update('tb_pembayaran', $data);
    return ($this->db->affected_rows() != 1 ? false : true);
  }

}
