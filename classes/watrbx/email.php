<?php

namespace watrbx;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class email {

    private $from;
    private $mail;

    function __construct() {
        $this->from = $_ENV["MAIL_USER"];
        $this->mail = new PHPMailer($_ENV["APP_DEBUG"]); // should probably put this on the debug switch                
        $this->mail->Host       = 'mail.watrbx.wtf';                     
        $this->mail->SMTPAuth   = true;                                   
        $this->mail->Username   = $_ENV["MAIL_USER"];                     
        $this->mail->Password   = $_ENV["MAIL_PASS"];                               
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $this->mail->Port       = 587;
    }

    public function get_template($name, $values = []){
        
        $template = file_get_contents("../storage/email_templates/$name.txt");

        if($template){
            foreach ($values as $key => $value){
                $template = str_replace($key, $value, $template);
            }

            return $template;
        }

    }

    public function send_email($target, $subject, $content, $html = false){
        $this->mail->setFrom($_ENV["MAIL_USER"], 'info');
        $this->mail->Sender = $_ENV["MAIL_USER"];
        $this->mail->addAddress($target);
        if($html){
            $this->mail->isHTML(true);
        }
        $this->mail->Subject = $subject;
        $this->mail->Body = $content;
        $this->mail->send();
    }

}