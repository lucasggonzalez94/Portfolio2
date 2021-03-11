<?php
    session_start();

    use PHPMailer\PHPMailer\PHPMailer;

    require 'build/PHPMailer/src/Exception.php';
    require 'build/PHPMailer/src/PHPMailer.php';
    require 'build/PHPMailer/src/SMTP.php';

    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $email = $_SESSION['email'];
    $telefono = $_SESSION['telefono'];
    $empresa = $_SESSION['empresa'];
    $asunto = $_SESSION['asunto'];
    $mensaje = $_SESSION['mensaje'];
    // $mensajeHTML = "<html><body>";
    // $mensajeHTML .= "<p>Remitente: '$nombre' '$apellido'<br>Telefono: '$telefono'<br>Empresa: '$empresa'<br><br>>Mensaje: '$mensaje'</p>";
    // $mensajeHTML .= "</body></html>";
    // $miEmail = 'lucasggonzalez94@outlook.com';

    // $header = "MIME-Version: 1.0\n";
    // $header .= "Content-type: text/html; charset=iso-8859-1\n";
    // $header .= "From: " . $email;
    // $header .= "Return-path: " . $email . "\n";
    // $header .= "X-Mailer: PHP/" . phpversion() . "\n";

    // $mail = mail($miEmail, $asunto, $mensajeHTML, $header);

    // if ($mail) {
    //     $_SESSION['resultado'] = 1;
    //     header('location: /');
    // }else {
    //     $_SESSION['resultado'] = 0;
    //     header('location: /');
    // }

    $mailer = new PHPMailer();
    
    $mailer->setFrom($email, $nombre . " " . $apellido);
    $mailer->addReplyTo($email, $nombre . " " . $apellido);

    $miEmail = 'lucasggonzalez94@outlook.com';

    $mailer->addAddress($miEmail, 'Lucas Gonzalez');
    $mailer->Subject = $asunto;

    $mensajeHTML = "<html><body>";
    $mensajeHTML .= "<p>Remitente: '$nombre' '$apellido'<br>Telefono: '$telefono'<br>Empresa: '$empresa'<br><br>>Mensaje: '$mensaje'</p>";
    $mensajeHTML .= "</body></html>";
    $mailer->msgHTML($mensajeHTML);

    if(!$mailer->send()) {
        // Error al enviar mensaje
        $_SESSION['resultado'] = 0;
        header('location: /');
    } else {
        // Enviado correctamente
        $_SESSION['resultado'] = 1;
        header('location: /');
    }