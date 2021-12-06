<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_desainer extends CI_Model {
	function __construct(){
		parent::__construct();
  }

  // COUNTING
  function get_totalDesain($id_user){
    return $this->db->get_where('tb_desain', array('ID_USER' => $id_user))->num_rows();
  }

  function get_totalRequest($id_user){
    return $this->db->get_where('tb_request', array('ID_USER' => $id_user))->num_rows();
  }

  function get_desainBerbayar($id_user){
    return $this->db->get_where('tb_desain', array('ID_USER' => $id_user, 'BERBAYAR' => 1))->num_rows();
  }

  function get_totalDijual($id_user){
    return $this->db->query("SELECT * FROM tb_pembayaran WHERE ID_DESAINER = '$id_user' AND STATUS >= 1 AND STATUS != 3")->num_rows();
  }
  
  function get_totalPendapatan($id_user){
    return $this->db->query("SELECT SUM(NOMINAL) AS PENDAPATAN FROM tb_pembayaran WHERE ID_DESAINER = '$id_user' AND STATUS >= 0 AND STATUS != 3")->row()->PENDAPATAN;
  }

  function get_requestPending($id_user){
    return $this->db->query("SELECT * FROM tb_request WHERE ID_DESAINER = '$id_user' AND STATUS = 1")->num_rows();
  }

  function get_requestProses($id_user){
    return $this->db->query("SELECT * FROM tb_request WHERE ID_DESAINER = '$id_user' AND STATUS = 1")->num_rows();
  }

  function get_requestSelesai($id_user){
    return $this->db->query("SELECT * FROM tb_request WHERE ID_DESAINER = '$id_user' AND STATUS = 2")->num_rows();
  }

  function get_totalPembayaran($id_user){
    return $this->db->query("SELECT * FROM tb_pembayaran WHERE ID_DESAINER = '$id_user' AND STATUS >= 1")->num_rows();
  }

  function get_menungguKonfirmasi($id_user){
    return $this->db->query("SELECT * FROM tb_pembayaran WHERE ID_DESAINER = '$id_user' AND STATUS = 1")->num_rows();
  }

  // CEK DATA

  function cek_pembayaranRequest($id_request){
    $query = $this->db->get_where('tb_pembayaran', array('ID_REQUEST' => $id_request));
    if ($query->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function desain_id($id_desain){
    $query = $this->db->query("SELECT * FROM tb_desain WHERE ID_DESAIN = '$id_desain'");
    return $query->num_rows();

  }

  public function desain_link($link_desain){
    $query = $this->db->query("SELECT * FROM tb_desain WHERE LINK_DESAIN = '$link_desain'");
    return $query->num_rows();

  }

  // GET DATA

  function get_requestTerbaru($id_user){
    $this->db->select('*');
    $this->db->from('tb_request a');
    $this->db->join('tb_user b', 'a.ID_USER = b.ID_USER');
    $this->db->where('a.ID_DESAINER', $id_user);
    $this->db->order_by('a.TANGGAL', 'DESC');
    $this->db->limit(0, 20);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
    
  }

  function get_pembayaranTerbaru($id_user){
    $query = $this->db->query("SELECT * FROM tb_pembayaran tp, tb_user tu WHERE tp.ID_USER = tu.ID_USER AND tp.ID_DESAINER = '$id_user' AND tp.STATUS >= 0 ORDER BY tp.TANGGAL DESC LIMIT 0, 10");
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
    
  }

  function get_dataRequest($id_user){
    $this->db->select('*');
    $this->db->from('tb_request a');
    $this->db->join('tb_user b', 'a.ID_USER = b.ID_USER');
    $this->db->where('a.ID_DESAINER', $id_user);
    $this->db->order_by('a.TANGGAL', 'DESC');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_detailRequest($id_request){
    $this->db->select('*');
    $this->db->from('tb_request a');
    $this->db->join('tb_user b', 'a.ID_USER = b.ID_USER');
    $this->db->where('a.ID_REQUEST', $id_request);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  function get_pembayaran($id_user){
    $query = $this->db->query("SELECT a.*, b.*, c.JUDUL, d.JUDUL AS JUDUL_REQUEST FROM tb_pembayaran a LEFT JOIN tb_user b ON a.ID_USER = b.ID_USER LEFT JOIN tb_desain c ON a.ID_DESAIN = c.ID_DESAIN LEFT JOIN tb_request d ON a.ID_REQUEST = d.ID_REQUEST WHERE a.ID_USER = b.ID_USER AND a.ID_DESAINER = '$id_user' AND a.STATUS > 0 ORDER BY a.TANGGAL DESC");
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
    
  }

  function get_dataDesain($id_user, $by, $find){
    $this->db->select('*');
    $this->db->from('tb_desain td');
    $this->db->join('tb_kategori tk', 'td.ID_KATEGORI = tk.ID_KATEGORI');
    $this->db->where('ID_USER', $id_user);
    if($by == "kategori" AND $by != null AND $find != null){
      $this->db->like('tk.KATEGORI', $find, 'both'); 
    }
    if($by == "berbayar"){
      $this->db->where('BERBAYAR', 1); 
    }
    if($by == "terjual"){
      $this->db->where('td.ID_DESAIN IN (select ID_DESAIN from tb_pembayaran)',NULL,FALSE);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }

  function get_detailDesainer($id_user){
    $this->db->select('*');
    $this->db->from('tb_user tu');
    $this->db->join('tb_tentang tt', 'tu.ID_USER = tt.ID_USER', 'LEFT');
    $this->db->where('tu.ID_USER', $id_user);
    $query =  $this->db->get();
    if ($query->num_rows() > 0) {
      return $query->row();
    }else {
      return false;
    }
  }

  function get_metodeDesainer($id_user){
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

  // PROSES
  function upload_desain($id_user, $id_desain, $nama_file){
    $KATEGORI   = $this->input->post('KATEGORI');
    $JUDUL      = $this->input->post('JUDUL');
    $TANGGAL    = $this->input->post('TANGGAL');
    $TAG        = $this->input->post('TAG');
    $HARGA      = $this->input->post('HARGA');
    $BERBAYAR   = $this->input->post('BERBAYAR');
    $KETERANGAN = $this->input->post('KETERANGAN');

    
		// GENERATE LINK DESAIN

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
  } while ($this->desain_link($link) > 0);

  $data = array(
    'ID_DESAIN'   => $id_desain,
    'LINK_DESAIN' => $link,
    'ID_USER'     => $id_user,
    'ID_KATEGORI' => $KATEGORI,
    'JUDUL'       => $JUDUL,
    'TANGGAL'     => date("d-m-Y"),
    'FILE'        => $nama_file,
    'TAG'         => $TAG,
    'HARGA'       => $HARGA,
    'BERBAYAR'    => ($BERBAYAR == TRUE ? 1 : 0),
    'KETERANGAN'  => $KETERANGAN,
  );

  $this->db->insert('tb_desain', $data);
  return ($this->db->affected_rows() != 1) ? false : true;
}

function edit_desain($id_desain, $nama_file, $link){
  $KATEGORI   = $this->input->post('KATEGORI');
  $JUDUL      = $this->input->post('JUDUL');
  $TANGGAL    = $this->input->post('TANGGAL');
  $TAG        = $this->input->post('TAG');
  $HARGA      = $this->input->post('HARGA');
  $BERBAYAR   = $this->input->post('BERBAYAR');
  $KETERANGAN = $this->input->post('KETERANGAN');

  if($nama_file == null){

    $data = array(
      'LINK_DESAIN' => $link,
      'ID_KATEGORI' => $KATEGORI,
      'JUDUL'       => $JUDUL,
      'TAG'         => $TAG,
      'HARGA'       => ($BERBAYAR == TRUE ? $HARGA : 0),
      'BERBAYAR'    => ($BERBAYAR == TRUE ? 1 : 0),
      'KETERANGAN'  => $KETERANGAN,
    );

    $this->db->where('ID_DESAIN', $id_desain);
    $this->db->update('tb_desain', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }else{

    $data = array(
      'LINK_DESAIN' => $link,
      'ID_KATEGORI' => $KATEGORI,
      'JUDUL'       => $JUDUL,
      'FILE'        => $nama_file,
      'TAG'         => $TAG,
      'HARGA'       => ($BERBAYAR == TRUE ? $HARGA : 0),
      'BERBAYAR'    => ($BERBAYAR == TRUE ? 1 : 0),
      'KETERANGAN'  => $KETERANGAN,
    );

    $this->db->where('ID_DESAIN', $id_desain);
    $this->db->update('tb_desain', $data);
    return ($this->db->affected_rows() != 1) ? false : true;
  }
}

function delete_desain($id_desain){

  $this->db->where('ID_DESAIN', $id_desain);
  $this->db->delete('tb_pembayaran');
  
  $this->db->where('ID_DESAIN', $id_desain);
  $this->db->delete('tb_komentar');
  
  $this->db->where('ID_DESAIN', $id_desain);
  $this->db->delete('tb_poster');
  
  $this->db->where('ID_DESAIN', $id_desain);
  $this->db->delete('tb_desain');
  return ($this->db->affected_rows() != 1) ? false : true;
}

function proses_ubahInfo(){
  $nama           = htmlspecialchars($this->input->post('nama'));
  $no_telp        = htmlspecialchars($this->input->post('no_telp'));
  $bidang         = htmlspecialchars($this->input->post('bidang'));
  $alamat         = $this->input->post('alamat');
  $tentang        = $this->input->post('tentang');
  $facebook       = htmlspecialchars($this->input->post('facebook'));
  $instagram      = htmlspecialchars($this->input->post('instagram'));
  $twitter        = htmlspecialchars($this->input->post('twitter'));

  $tb_user = array(
    'NAMA'        => $nama,
    'NO_TELP'     => $no_telp,
  );
  $this->db->where('ID_USER', $this->session->userdata('id_user'));
  $this->db->update('tb_user', $tb_user);

  $tb_tentang = array(
    'BIDANG'      => $bidang,
    'ALAMAT'      => $alamat,
    'TENTANG'     => $tentang,
    'FACEBOOK'    => $facebook,
    'INSTAGRAM'   => $instagram,
    'TWITTER'     => $twitter,
  );
  $this->db->where('ID_USER', $this->session->userdata('id_user'));
  $this->db->update('tb_tentang', $tb_tentang);

  return true;
}

function proses_tambahMetode(){
  $via            = htmlspecialchars($this->input->post('via'));
  $atas_nama      = htmlspecialchars($this->input->post('atas_nama'));
  $rekening       = $this->input->post('rekening');

  $metode = array(
    'ID_USER'   => $this->session->userdata('id_user'),
    'VIA'       => $via,
    'ATAS_NAMA' => $atas_nama,
    'NOMOR'     => $rekening,
  );
  $this->db->insert('tb_metode', $metode);
  return ($this->db->affected_rows() != 1) ? false : true;
}

function proses_editMetode($id_metode){
  $via            = htmlspecialchars($this->input->post('via'));
  $atas_nama      = htmlspecialchars($this->input->post('atas_nama'));
  $rekening       = $this->input->post('rekening');

  $metode = array(
    'VIA'       => $via,
    'ATAS_NAMA' => $atas_nama,
    'NOMOR'     => $rekening,
  );
  $this->db->where('ID_METODE', $id_metode);
  $this->db->update('tb_metode', $metode);
  return ($this->db->affected_rows() != 1) ? false : true;
}

function proses_hapusMetode($id_metode){
  $this->db->where('ID_METODE', $id_metode);
  $this->db->delete('tb_metode', $metode);
  return ($this->db->affected_rows() != 1) ? false : true;
}

}
