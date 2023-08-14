<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

class clsMail{
    private $mail = null;
    function __construct(){
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 587;
        $this->mail->isHTML(true);
        $this->mail->Username = "drreminder1998@gmail.com";
        $this->mail->Password = "zewpvpmvwsnmrcuo";
}
    public function metEnviarAdmin(string $asunto, string $titulo ,string $nombre, string $correo, string $bodyHtmlAdmin){
        $this->mail->setFrom("drreminder1998@gmail.com", $titulo);
        $this->mail->addAddress($correo, $nombre);
        $this->mail->addCC("mariosandovalv1998@gmail.com");
        $this->mail->Subject = $asunto;
        $this->mail->Body = $bodyHtmlAdmin;
        $this->mail->isHTML(true);
        $this->mail->CharSet = "UTF-8";
         return $this->mail->send();
    }

    public function metEnviarUser(string $asunto, string $titulo ,string $nombre, string $correo, string $bodyHtmlUser){
        $this->mail->setFrom("drreminder1998@gmail.com", $titulo);
        $this->mail->addAddress($correo, $nombre);
        $this->mail->Subject = $asunto;
        $this->mail->Body = $bodyHtmlUser;
        $this->mail->isHTML(true);
        $this->mail->CharSet = "UTF-8";
         return $this->mail->send();
    }
}
?>