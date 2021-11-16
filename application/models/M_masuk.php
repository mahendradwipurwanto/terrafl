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

  function add_user($data_user){
    $this->db->insert('tb_user', $data_user);
    return $this->db->affected_rows() == true;
  }

  function update_password($data_user, $where){
    $this->db->where($where);
    $this->db->update('tb_user', $data_user);
    return $this->db->affected_rows() == true;
  }

}