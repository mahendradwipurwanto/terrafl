<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {

  // VARIABEL
  public $id_user         = "";
  public $nama            = "";
  public $email_user      = "";

  public function __construct()
  {
    parent::__construct();
    // LOAD MODEL MASUK
    $this->load->model('M_masuk');}

    public function index()
    { 

      if($this->session->userdata('logged_in') == true || $this->session->userdata('logged_in'))
      {
        $this->session->set_flashdata('warning', 'Anda telah masuk kedalam akun anda !');
        redirect(base_url());
      }else
      {
        $this->load->view('masuk');
      }
    }

    public function daftar()
    {
      if($this->session->userdata('logged_in') == true || $this->session->userdata('logged_in'))
      {
        $this->session->set_flashdata('warning', 'Anda telah masuk kedalam akun anda !');
        redirect(base_url());
      }else
      {
        $this->load->view('daftar');
      }
    }

    public function lupa_password()
    {
      $this->load->view('lupa_password');
    }

    public function ubah_password($email = null)
    {

      if ($this->M_masuk->cek_user($email) == true) {
        $user             = $this->M_masuk->get_user($email);

        $data['id_user']  = $user->ID_USER;
        $data['email']    = $email;

        $this->load->view('ubah_password', $data);
      } else {
        $this->session->set_flashdata('error', 'Tidak dapat menemukan akun dengan email tersebut !');
        redirect(site_url('masuk'));
      }
    }

    public function password_hash(){
      echo password_hash("12341234", PASSWORD_DEFAULT);
    }

    public function proses_masuk()
    {
    // ambil inputan dari view
      $username   = $this->input->post('username');
      $password   = $this->input->post('password');

    // cek apakah data user ada, berdasarkan username yang dimasukkan
      if ($this->M_masuk->cek_user($username) == true) {
      // ambil data user, menjadi array
        $user     = $this->M_masuk->get_user($username);

      // cek apakah password yang dimasukkan sama dengan database
        if (password_verify($password, $user->PASSWORD)) {

          // simpan data user yang login kedalam session 
          $session_data = array(
            'id_user'   => $user->ID_USER,
            'email'     => $user->EMAIL,
            'nama'      => $user->NAMA,
            'role'      => $user->ROLE,
            'logged_in' => true,
          );

          $this->session->set_userdata($session_data);

      // SET ID_USER, SAAT USER MASIH LOGIN
          $this->id_user        = $this->session->userdata('id_user');
          $this->nama           = $this->session->userdata('nama');
          $this->email_user     = $this->session->userdata('email');

          // cek role dari user yang login

          // ADMIN
          if ($user->ROLE == 0) {
            // arahkan ke halaman admin
            if ($this->session->userdata('redirect')) {
             $this->session->set_flashdata('success', 'Hai, anda telah masuk. Silahkan melanjutkan aktivitas anda !!');
             redirect($this->session->userdata('redirect'));
           } else {
            $this->session->set_flashdata('success', "Hai, admin. Selamat datang !");
            redirect(site_url('admin'));
          }

            // desainer
        } elseif($user->ROLE == 1) {
            // arahkan ke dashboard desainer
          if ($this->session->userdata('redirect')) {
           $this->session->set_flashdata('success', 'Hai, anda telah masuk. Silahkan melanjutkan aktivitas anda !!');
           redirect($this->session->userdata('redirect'));
         } else {
          $this->session->set_flashdata('success', "Hai, {$user->NAMA}. Selamat datang !");
          redirect(site_url('desainer'));
        }

            // PENGGUNA
      } elseif($user->ROLE == 2) {
            // arahkan ke halaman pengguna (halaman utama)
        if ($this->session->userdata('redirect')) {
         $this->session->set_flashdata('success', 'Hai, anda telah masuk. Silahkan melanjutkan aktivitas anda !!');
         redirect($this->session->userdata('redirect'));
       } else {
        $this->session->set_flashdata('success', "Hai, {$user->NAMA}. Selamat datang !");
        redirect(base_url());
      }
            // ROLE TIDAK DIKENALI
    }else{
      $this->session->set_flashdata('error', "Mohon maaf, hak akses user tidak dikenali !");
      redirect(site_url('keluar'));
    }

  } else {
    $this->session->set_flashdata('warning', "Mohon maaf, password yang anda masukkan salah !");
    redirect(site_url('masuk'));
  }

} else {
  $this->session->set_flashdata('error', "Mohon maaf, user tidak terdaftar !");
  redirect(site_url('masuk'));
}

}

public function proses_daftar()
{
    // ambil inputan dari view
  $nama           = htmlspecialchars($this->input->post('nama'));
  $no_telp        = htmlspecialchars($this->input->post('no_telp'));
  $email          = htmlspecialchars($this->input->post('email'));
  $username       = htmlspecialchars($this->input->post('username'));
  $password       = htmlspecialchars($this->input->post('password'));
  $password_conf  = htmlspecialchars($this->input->post('password_conf'));
  $role           = $this->input->post('role');

    // cek apakah email telah ada
  if ($this->M_masuk->cek_user($email) == false) {

      // cek apakah password sama
    if ($password == $password_conf) {

        // ubah inputan view menjadi array
      $data_user = array(
        'NAMA'      => $nama,
        'NO_TELP'   => $no_telp,
        'EMAIL'     => $email,
        'USERNAME'  => $username,
        'PASSWORD'  => password_hash($password, PASSWORD_DEFAULT),
        'ROLE'      => ($role == true ? 1 : 2),
      );

        // masukkan ke database
      if ($this->M_masuk->add_user($data_user, ($role == true ? 1 : 2)) == true) {
        $role_user  = ($role == true ? 'Desainer' : 'Pengguna');
        $subject    = "Selamat bergabung di Terraflair - {$email}";
        $message    = "Hai, {$nama} selamat bergabung di terraflair sebagai {$role_user}.</br></br></br></br>";

        $this->send_email($email, $subject, $message);

        $this->session->set_flashdata('success', "Berhasil mendaftaran akun anda, harap login untuk melanjutkan !");
        redirect(site_url('masuk'));
      } else {
        $this->session->set_flashdata('error', "Terjadi kesalahan saat mendaftarkan akun anda, harap coba lagi !");
        redirect(site_url('daftar'));
      }


    } else {
      $this->session->set_flashdata('warning', "Password yang anda masukkan tidak sama !");
      redirect(site_url('daftar'));
    }

  } else {
    $this->session->set_flashdata('warning', "Email atau username telah digunakan !");
    redirect(site_url('daftar'));
  }

}

public function proses_lupa(){
  $email      = $this->input->post('email');

  if ($this->M_masuk->cek_user($email) == true) {

    $user     = $this->M_masuk->get_user($email);

    $subject  = "Pemulihan password - {$user->EMAIL}";
    $message  = "Hai, {$user->NAMA} kami mendapatkan permintaan pemulihan password atas nama email {$user->EMAIL} harap klik link berikut ini untuk memulihkan password anda, atau abaikan email ini jika anda tidak merasa melakukan proses pemulihan akun.</br>".base_url()."pulihkan-password/".$email."</br></br></br></br>";

    if ($this->send_email($email, $subject, $message)) {
      $this->session->set_flashdata('success', "Berhasil mengirim link pemulihan password anda, harap cek email anda !");
      redirect($this->agent->referrer());
    } else {
      $this->session->set_flashdata('error', "Terjadi kesalahan, saat mengirimkan email pemulihan password, coba lagi nanti !");
      redirect($this->agent->referrer());
    }

  } else {
    $this->session->set_flashdata('warning', "Tidak dapat menemukan akun atas nama email {$email}. Pastikan email tersebut telah terdaftar diwebsite kami !");
    redirect($this->agent->referrer());
  }


}

public function proses_ubahPassword(){
  $id_user        = $this->input->post('id_user');
  $password       = $this->input->post('password');
  $password_conf  = $this->input->post('password_conf');

  if ($password == $password_conf) {
    $data_user    = array(
      'PASSWORD'  => password_hash($password, PASSWORD_DEFAULT)
    );
    $where        = array('ID_USER' => $id_user);

    $user       = $this->M_masuk->get_userByID($id_user);

    if ($this->M_masuk->update_password($data_user, $where)) {

      $now      = date("d F Y - H:i");

      $subject  = "Perubahan password - {$user->EMAIL}";
      $message  = "Hai, {$user->NAMA} password kamu telah dirubah, pada {$now}. Harap hubungi admin Terraflair jika ini bukan anda atau abaikan email ini.</br></br></br></br>";

      $this->send_email($user->EMAIL, $subject, $message);

      $this->session->set_flashdata('success', "Berhasil merubah password anda, harap login untuk melanjutkan !");
      redirect(site_url('masuk'));
    } else {
      $this->session->set_flashdata('error', "Terjadi kesalahan, saat mengubah password anda, coba lagi nanti !");
      redirect($this->agent->referrer());
    }
  } else {
    $this->session->set_flashdata('warning', "Password yang anda masukkan tidak sama, harap coba lagi !");
    redirect($this->agent->referrer());
  }

}

public function keluar(){

		// SESS DESTROY
  $this->session->sess_destroy();
  $this->session->set_flashdata('success', "Anda berhasil keluar !");
  redirect(base_url());
}

	// MAILER SENDER

function send_email($email, $subject, $message){

  $mail = array(
   'to' 			  => $email,
   'subject'		=> $subject,
   'message'		=> $message
 );

  if ($this->mailer->send($mail) == TRUE) {
   return true;
 }else {
   return false;
 }
}

}
