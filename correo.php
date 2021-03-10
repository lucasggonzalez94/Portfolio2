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

    $resultado = 0;

    $mailer = new PHPMailer();
    
    $mailer->setFrom($email, $nombre . " " . $apellido);
    $mailer->addReplyTo($email, $nombre . " " . $apellido);

    $miEmail = 'lucasggonzalez94@outlook.com';

    $mailer->addAddress($miEmail, 'Lucas Gonzalez');
    $mailer->Subject = $asunto;

    $mensajeCompleto = "Remitente: $nombre $apellido\nTelefono: $telefono\nEmpresa: $empresa\n\n> $mensaje";
    $mailer->msgHTML($mensajeCompleto);

    if(!$mailer->send()) {
        $_SESSION['resultado'] = 0;
    } else {
        $_SESSION['resultado'] = 1;
        header('location: /');
    }