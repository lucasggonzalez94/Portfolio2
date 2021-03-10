<?php
    session_start();
    
    // use PHPMailer\PHPMailer\PHPMailer;

    // require 'build/PHPMailer/src/Exception.php';
    // require 'build/PHPMailer/src/PHPMailer.php';
    // require 'build/PHPMailer/src/SMTP.php';

    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $email = $_SESSION['email'];
    $telefono = $_SESSION['telefono'];
    $empresa = $_SESSION['empresa'];
    $asunto = $_SESSION['asunto'];
    $mensaje = $_SESSION['mensaje'];
    $mensajeCompleto = "Remitente: $nombre $apellido\nTelefono: $telefono\nEmpresa: $empresa\n\n> $mensaje";
    $miEmail = 'lucasggonzalez94@outlook.com';

    // echo $nombre;
    // echo $apellido;
    // echo $email;
    // echo $telefono;
    // echo $empresa;
    // echo $asunto;
    // echo $mensaje;
    // echo $mensajeCompleto;
    // echo $telefono;
    // echo $miEmail;

    // exit;

    $header = "From: '$email'\r\n";
    $header .= "Reply-To: '$email'\r\n";
    $header .= "X-Mailer: PHP/" . phpversion();

    $mail = mail($miEmail, $asunto, $mensajeCompleto, $header);

    // echo '<pre>';
    // var_dump($mail);
    // echo '</pre>';
    // exit;

    if ($mail) {
        echo "Enviado";
        $_SESSION['resultado'] = 1;
        header('location: /');
    }else {
        echo "No enviado";
        $_SESSION['resultado'] = 0;
    }

    // var_dump($nombre);
    // var_dump($apellido);
    // var_dump($email);
    // var_dump($telefono);
    // var_dump($empresa);
    // var_dump($asunto);
    // var_dump($mensaje);
    // exit;

    // $resultado = 0;

    // $mailer = new PHPMailer();
    
    // $mailer->setFrom($email, $nombre . " " . $apellido);
    // $mailer->addReplyTo($email, $nombre . " " . $apellido);

    // $miEmail = 'lucasggonzalez94@outlook.com';

    // $mailer->addAddress($miEmail, 'Lucas Gonzalez');
    // $mailer->Subject = $asunto;

    // $mensajeCompleto = "Remitente: $nombre $apellido\nTelefono: $telefono\nEmpresa: $empresa\n\n> $mensaje";
    // $mailer->msgHTML($mensajeCompleto);

    // // echo '<pre>';
    // // var_dump($mailer->send());
    // // echo '</pre>';
    // // exit;

    // if(!$mailer->send()) {
    //     // Error al enviar mensaje
    //     $_SESSION['resultado'] = 0;
    // } else {
    //     // Enviado correctamente
    //     $_SESSION['resultado'] = 1;
    //     header('location: /');
    // }