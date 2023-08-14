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
        $this->mail->Username = "electroshock98km@gmail.com";
        $this->mail->Password = "ghytoylkrnhkyxyk";
        //$this->mail->SMTPSecure = 'ssl';
        //$this->mail->Host = "mail.techbusiness.com.mx";
        //$this->mail->Port = 465;
        //$this->mail->Username = "contacto@techbusiness.com.mx";
        //$this->mail->Password = ",4sLPRjU-+]n";

}
    public function metEnviarAdmin(string $asunto, string $titulo ,string $nombre, string $correo, string $bodyHtmlAdmin){
        $this->mail->setFrom("contacto@techbusiness.com.mx", $titulo);
        $this->mail->addAddress($correo, $nombre);
        $this->mail->addCC("mariosandovalv1998@gmail.com");
        $this->mail->Subject = $asunto;
        $this->mail->Body = $bodyHtmlAdmin;
        $this->mail->isHTML(true);
        $this->mail->CharSet = "UTF-8";
         return $this->mail->send();
    }

    public function metEnviarUser(string $asunto, string $titulo ,string $nombre, string $correo, string $bodyHtmlUser){
        // $this->mail->setFrom("electroshock98km@gmail.com", $titulo);
        $this->mail->setFrom("contacto@techbusiness.com.mx", $titulo);
        $this->mail->addAddress($correo, $nombre);
        $this->mail->Subject = $asunto;
        $this->mail->Body = $bodyHtmlUser;
        $this->mail->isHTML(true);
        // $this->mail->addAttachment("./vistas/download/PHI3.pdf", "Programa de Habilidades en Investigación e Innovación en la Industria");
        $this->mail->CharSet = "UTF-8";
         return $this->mail->send();
    }
}
?>