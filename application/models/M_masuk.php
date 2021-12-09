<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_masuk extends CI_Model {
	function __construct(){
		parent::__construct();
  }

  public function cek_user($username){
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('USERNAME', $username);
    $this->db->or_where('EMAIL', $username);
    $query = $this->db->get();

    // jika hasil dari query diatas memiliki lebih dari 0 record
    if ($query->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
    
  }

  public function get_user($username){
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('USERNAME', $username);
    $this->db->or_where('EMAIL', $username);
    $query = $this->db->get();

    // jika hasil dari query diatas memiliki lebih dari 0 record
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
    
  }

  public function get_userByID($id_user){
    $this->db->select('*');
    $this->db->from('tb_user');
    $this->db->where('ID_USER', $id_user);;
    $query = $this->db->get();

    // jika hasil dari query diatas memiliki lebih dari 0 record
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
    
  }

  function add_user($data_user, $role){
    $this->db->insert('tb_user', $data_user);
    $id_user = $this->db->insert_id();
    if ($role == 1) {
      $bidang         = $this->input->post('bidang');
      $via            = htmlspecialchars($this->input->post('via'));
      $atas_nama      = htmlspecialchars($this->input->post('atas_nama'));
      $rekening       = htmlspecialchars($this->input->post('rekening'));

      $data = array(
        'ID_USER' => $id_user,
        'BIDANG' => $bidang,
      );
      $this->db->insert('tb_tentang', $data);

      $metode = array(
        'ID_USER' => $id_user,
        'VIA' => $via,
        'ATAS_NAMA' => $atas_nama,
        'NOMOR' => $rekening,
      );
      $this->db->insert('tb_metode', $metode);
    }
    return $this->db->affected_rows() == true;
  }

  function update_password($data_user, $where){
    $this->db->where($where);
    $this->db->update('tb_user', $data_user);
    return $this->db->affected_rows() == true;
  }

}
