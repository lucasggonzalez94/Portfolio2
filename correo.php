<?php
    session_start();

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // require $_SERVER['DOCUMENT_ROOT'] . '/build/PHPMailer/src/Exception.php';
    // require $_SERVER['DOCUMENT_ROOT'] . '/build/PHPMailer/src/PHPMailer.php';
    // require $_SERVER['DOCUMENT_ROOT'] . '/build/PHPMailer/src/SMTP.php';

    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $email = $_SESSION['email'];
    $telefono = $_SESSION['telefono'];
    $empresa = $_SESSION['empresa'];
    $asunto = $_SESSION['asunto'];
    $mensaje = $_SESSION['mensaje'];
    $mensajeCompleto = "Remitente: $nombre $apellido\nTelefono: $telefono\nEmpresa: $empresa\n\n> $mensaje";
    $miEmail = 'gonzalez.luqaz.94@gmail.com';

    // $mail = new PHPMailer;
    // $mail->isSMTP();
    // $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
    // $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
    // $mail->Port = 587; // TLS only
    // $mail->SMTPSecure = 'tls'; // ssl is deprecated
    // $mail->SMTPAuth = true;
    // $mail->Username = $miEmail; // email
    // $mail->Password = '2616209794lucas'; // password
    // $mail->setFrom($email, $nombre . $apellido); // From email and name
    // $mail->addAddress($email, $nombre . $apellido); // to email and name
    // $mail->Subject = $asunto;
    // $mail->msgHTML($mensajeCompleto); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
    // $mail->AltBody = $mensajeCompleto; // If html emails is not supported by the receiver, show this body
    // $mail->SMTPOptions = array(
    //     'ssl' => array(
    //         'verify_peer' => false,
    //         'verify_peer_name' => false,
    //         'allow_self_signed' => true
    //     )
    // );
    // if (!$mail->send()) {
    //     $_SESSION['resultado'] = 0;
    //     echo "Error";
    // } else {
    //     $_SESSION['resultado'] = 1;
    //     header('location: /');
    // }

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
        $_SESSION['resultado'] = 1;
        header('location: /');
    }else {
        $_SESSION['resultado'] = 0;
        header('location: /');
    }

    // var_dump($nombre);
    // var_dump($apellido);
    // var_dump($email);
    // var_dump($telefono);
    // var_dump($empresa);
    // var_dump($asunto);
    // var_dump($mensaje);
    // exit;

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