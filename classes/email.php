<?php

namespace classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion() {
        // Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '386e84e4f81797';
        $mail->Password = '0b6a470ce261e4';

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com
        ', 'AppSalon.com');
        $mail->Subjet = 'Confirma tu cuenta';

        // Set HTML
        $mail->isHTML(TRUE);
        $mail->Charset = 'UFT-8';

        $contenido =  "<html>";
        $contenido .= "<p><strong>Hola " . $this->email . "</strong> Has creado tu cuenta en AppSalon,
        solo debes confirmarla presionando del siguiente enlace</p>";
        $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>
        Confirmar cuenta<a/> </p>";
        $contenido .= "<p>Si tu no solicitaste esta cuenta, puedees ignorar el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones() {
           // Crear el objeto de email
           $mail = new PHPMailer();
           $mail->isSMTP();
           $mail->Host = 'smtp.mailtrap.io';
           $mail->SMTPAuth = true;
           $mail->Port = 2525;
           $mail->Username = '386e84e4f81797';
           $mail->Password = '0b6a470ce261e4';
   
           $mail->setFrom('cuentas@appsalon.com');
           $mail->addAddress('cuentas@appsalon.com
           ', 'AppSalon.com');
           $mail->Subjet = 'Reestablece tu Password';
   
           // Set HTML
           $mail->isHTML(TRUE);
           $mail->Charset = 'UFT-8';
   
           $contenido =  "<html>";
           $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado reestablecer tu password, 
           sigue el siguiente enlace para hacerlo.</p>";
           $contenido .= "<p>Presiona aqui: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>
           Reestablecer Password<a/> </p>";
           $contenido .= "<p>Si tu no solicitaste esta cuenta, puedees ignorar el mensaje</p>";
           $contenido .= "</html>";
   
           $mail->Body = $contenido;
   
           // Enviar el email
           $mail->send();
       }
    }
