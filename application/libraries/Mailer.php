<?php defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer{

  public function __construct(){
    log_message('Debug', 'PHPMailer class is loaded.');
    $this->_ci = &get_instance();
    $this->_ci->load->database();
}

public function send($data){
    // Include PHPMailer library files
    require_once APPPATH.'third_party/PHPMailer/Exception.php';
    require_once APPPATH.'third_party/PHPMailer/PHPMailer.php';
    require_once APPPATH.'third_party/PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    // SMTP configuration
    $mail->isSMTP();

    $mail->SMTPOptions = array(
      'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      )
    );
    
    // $mail->SMTPDebug      = 1;
    $mail->SMTPAuth       = TRUE;
    $mail->SMTPKeepAlive  = TRUE;
    $mail->SMTPSecure     = "ssl";
    $mail->Port           = 465;
    $mail->Host           = "smtp.gmail.com";
    $mail->Username       = "cs.terrafl@gmail.com";
    $mail->Password       = "terrafl2021";

    $mail->setFrom("cs.terrafl@gmail.com", "Terrafl - Support");
    $mail->addReplyTo("cs.terrafl@gmail.com", "Terrafl - Support");

    // Add a recipient
    $mail->addAddress($data['to']);

    // Email subject
    $mail->Subject = $data['subject'];

    // Set email format to HTML
    $mail->isHTML(true);
    // Email body content
    $mail->Body = $this->body_html($data['message']);

    // Send email
    if (!$mail->send()) {
      echo 'Message could not be sent. <br>';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
      echo '<br>Contact ADMIN ';
      die();
      return false;
    } else {
      return true;
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

}?>
