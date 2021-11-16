<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_Controller {
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

          // cek role dari user yang login

          // ADMIN
          if ($user->ROLE == 0) {
            // arahkan ke halaman admin
            $this->session->set_flashdata('success', "Hai, admin. Selamat datang !");
            redirect(site_url('admin'));

            // DESIGNER
          } elseif($user->ROLE == 1) {
            // arahkan ke dashboard designer
            $this->session->set_flashdata('success', "Hai, {$user->NAMA}. Selamat datang !");
            redirect(site_url('designer'));

            // PENGGUNA
          } elseif($user->ROLE == 2) {
            // arahkan ke halaman pengguna (halaman utama)
            $this->session->set_flashdata('success', "Hai, {$user->NAMA}. Selamat datang !");
            redirect(base_url());
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
        if ($this->M_masuk->add_user($data_user) == true) {
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

      if ($this->M_masuk->update_password($data_user, $where)) {
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
			'message'		=> $this->body_html($message)
		);

		if ($this->mailer->send($mail) == TRUE) {
			return true;
		}else {
			return false;
		}
  }
  
	function body_html($message){
		return '
		<html>

		<head>
		<title>Terrafl</title>
		</head>

		<body style="
		font-family: -webkit-pictograph;
		color: #333333;
		font-size: 16px;
		background:#EEEEEE;">
		<div style="margin: 0 auto 0 auto; width: 560px;">
		<div style="padding-top: 55px; text-align : center;">
		<div style="font-weight: 700;font-size: 32px;">
		<span style="font-size: 32px; ">Terraflair</span>
		</div>
		</div>
		<div style="background: white">
		<main><div style="margin-top: 32px;">
		<div style="height: 12px; background: #0B4C8A;"></div>
		<div style="margin: 32px 56px 0 56px">
		<div>
		<span style="font-size: 16px;">
		'.$message.'
		<br><br><br>
		<span class="text-muted">Regards,<br>Terraflair</span>
		</span>
		</div>
		</div>
		</div>

		</main>
		<hr style="
		width: 513px; 
		margin-top: 34px;
		border-top: 1px solid #cecece; 
		border-bottom: none;" />
		<div>
		<div style="margin: 32px 56px 0 56px">
		<div style="margin-top: 32px">
		<img style="margin: auto;display: block;" src="https://i.ibb.co/kx4qnZq/logo.png" width="75px" height="auto" alt="Terraflair logo">
		<div style="text-align: center; font-size: 10px; margin-top:10px">Terraflair 2021</div>
		</div>
		</div>
		</div>
		<hr style="border-top: 1px dashed #CECECE; margin-top: 24px; border-bottom: none;">
		<div style="margin-top: 13px; text-align : center; font-size:10px;">This email has been generated
		automatically, please do not reply.</div>
		<div style="height: 12px; background: #0B4C8A; margin-top:10px;"></div>
		</div>
		</body>
		';
	}

}
