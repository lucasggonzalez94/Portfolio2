<?php
session_start();

$nombre = '';
$apellido = '';
$email = '';
$telefono = '';
$empresa = '';
$asunto = '';
$mensaje = '';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';

    // Validar que los campos no esten vacios
    $nombre = ($_POST['nombre']);
    $apellido = $_POST['apellido'];
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $telefono = filter_var($_POST['tel'], FILTER_VALIDATE_INT);
    $empresa = $_POST['empresa'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['email'] = $email;
    $_SESSION['telefono'] = $telefono;
    $_SESSION['empresa'] = $empresa;
    $_SESSION['asunto'] = $asunto;
    $_SESSION['mensaje'] = $mensaje;

    // Validar que los campos tengan el contenido adecuado
    if (!$nombre) {
        $errores[] = 'El nombre es obligatorio';
    }

    if (!$apellido) {
        $errores[] = 'El apellido es obligatorio';
    }

    if (!$email) {
        $errores[] = 'El e-mail es obligatorio o no es válido';
    }

    if (!$asunto) {
        $errores[] = 'El asunto es obligatorio';
    }

    if (!$mensaje) {
        $errores[] = 'El mensaje es obligatorio';
    }

    // Enviar email
    if (empty($errores)) {
        header('location: correo.php');
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="Portfolio Lucas Gonzalez">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css' integrity='sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==' crossorigin='anonymous' />
    <link rel="stylesheet" href="/build/icomoon/style.css">
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="shortcut icon" href="build/img/favicon.png">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js' integrity='sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js' integrity='sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==' crossorigin='anonymous'></script>
    <title>Lucas González | Portfolio</title>
</head>

<body>
    <div class="background">
        <main class="main" id="inicio">
            <header class="header">
                <input type="checkbox" id="active">
                <label for="active" class="btn-menu"><i class="fas fa-bars"></i></i></label>
                <nav class="navegacion">
                    <a href="#inicio" id="link-inicio">Inicio</a>
                    <a href="#sobre-mi" id="link-sobre-mi">Sobre mí</a>
                    <a href="#proyectos" id="link-proyectos">Proyectos</a>
                    <a href="#contacto" id="link-contacto">Contacto</a>
                </nav>
            </header>

            <div class="contenedor">

                <span>¡Hola!, soy</span>
                <h1>Lucas González</h1>
                <span>Desarrollador Junior</span>
                <a href="#contacto" class="btn">Contáctame</a>
            </div>
        </main>

        <section id="sobre-mi" class="contenedor">
            <h2>Sobre Mí</h2>
            <p>Te cuento un poco sobre mí. Soy estudiante de programación, tanto autodidacta como a nivel universitario, cursando el último cuatrimestre en la Tecnicatura Superior en Programación de la Universidad Tecnológica Nacional, estoy en busca de adentrarme en el mundo laboral, con conocimientos en diferentes tecnologías, especializandome en el desarrollo web, tanto en el front-end como en el back-end. Poseo un nivel de inglés intermedio, responsable, proactivo, con capacidad de trabajar en equipo, de adaptarme al cambio y aprender rápidamente, con muchas ganas de expandir mis conocimientos en las tecnologías actuales.</p>
        </section>

        <section class="contenedor" id="proyectos">
            <div class="contenido" id="habilidades">
                <div class="owl-carousel">
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-html5"></i>
                        </div>
                        <p>HTML</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-css3-alt"></i>
                        </div>
                        <p>CSS</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-sass"></i>
                        </div>
                        <p>SASS/SCSS</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-js-square"></i>
                        </div>
                        <p>JavaScript</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-react"></i>
                        </div>
                        <p>React JS</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-node"></i>
                        </div>
                        <p>Node JS</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-java"></i>
                        </div>
                        <p>Java</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="icon-csharp"></i>
                        </div>
                        <p>C# (.NET)</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-php"></i>
                        </div>
                        <p>PHP</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fas fa-database"></i>
                        </div>
                        <p>MySQL</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-git"></i>
                        </div>
                        <p>GIT</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="icon-adobephotoshop"></i>
                        </div>
                        <p>Photoshop</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="icon-adobeillustrator"></i>
                        </div>
                        <p>Illustrator</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-windows"></i>
                        </div>
                        <p>Windows</p>
                    </div>
                    <div class="tecnologia item">
                        <div class="icon">
                            <i class="fab fa-linux"></i>
                        </div>
                        <p>Linux</p>
                    </div>
                </div>
            </div>
            <div class="contenido">
                <div class="contenedor-proyectos">
                    <h2>Proyectos</h2>
                    <div class="proyectos owl-carousel">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="contenedor" id="contacto">
        <div class="contenedor-contacto">

            <div class="info-contacto">
                <h2>Contacto</h2>

                <div class="items">
                    <p><i class="fas fa-map-marker-alt"></i> Mendoza - Argentina</p>
                    <a href="mailto:lucasggonzalez@outlook.com" class="link-contacto"><i class="fas fa-envelope"></i> lucasggonzalez@outlook.com</a>
                    <a href="https://wa.link/kq0zdb" target="_blank" class="link-contacto"><i class="fab fa-whatsapp"></i>
                        +54-2616209794</a>
                </div>

                <div class="enlaces-contacto">
                    <a href="https://www.linkedin.com/in/lucas-gonzalez-9168031b8/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://github.com/lucasggonzalez94" target="_blank"><i class="fab fa-github-square"></i></a>
                </div>
            </div>

            <div class="formulario">
                <form method="post" id="formulario">
                    <div class="inputs">
                        <fieldset>
                            <legend>Envíame un E-mail</legend>
                            <div class="nombre-apellido">
                                <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre *" value="<?php echo $nombre ?>">
                                <input type="text" name="apellido" id="apellido" placeholder="Tu Apellido *" value="<?php echo $apellido ?>">
                            </div>

                            <input type="email" name="email" id="email" placeholder="Tu Email *" value="<?php echo $email ?>">
                            <input type="tel" name="tel" id="tel" placeholder="Tu Teléfono" value="<?php echo $telefono ?>">
                            <input type="text" name="empresa" id="empresa" placeholder="Nombre Empresa" value="<?php echo $empresa ?>">
                            <input type="text" name="asunto" id="asunto" placeholder="Asunto del E-mail *" value="<?php echo $asunto ?>">
                            <textarea name="mensaje" id="mensaje"><?php echo $mensaje ?></textarea>

                            <?php foreach ($errores as $error) : ?>
                                <div class="alerta error">
                                    <?php echo $error; ?>
                                </div>
                            <?php endforeach; ?>

                            <?php if (isset($_SESSION['resultado'])) :
                                if ($_SESSION['resultado'] === 0) : ?>
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error al enviar email',
                                            showConfirmButton: false,
                                            timer: 2500
                                        })
                                    </script>
                                <?php endif;

                                if ($_SESSION['resultado'] === 1) : ?>
                                    <script>
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Email enviado correctamente',
                                            showConfirmButton: false,
                                            timer: 2500
                                        })
                                    </script>
                            <?php endif;
                            endif; ?>

                            <input type="submit" value="Enviar" class="btn">
                        </fieldset>
                    </div>
                </form>

                <p id="copyright"></p>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/59e2cd1765.js" crossorigin="anonymous"></script>
    <script src="/build/js/bundle.min.js"></script>
</body>

</html>
<?php
$_SESSION['resultado'] = 3;
