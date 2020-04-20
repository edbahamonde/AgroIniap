<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Libs/PHPMailer/src/Exception.php';
require '../Libs/PHPMailer/src/PHPMailer.php';
require '../Libs/PHPMailer/src/SMTP.php';
session_start();
//error_reporting(0);  No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Usted no tiene autorizacion';
die();
}else {

include_once '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_SESSION['usuario'];

       $sql2="SELECT correo, clave, nombres, apellidos FROM Agr_usuario WHERE ci = '$usuario'";
       $last=pg_query($conexion,$sql2);
       $fila=pg_fetch_array($last);

       $nombres = $fila['nombres'];
       $apellidos = $fila['apellidos'];
       $clave = $fila['clave'];
       $correo = $fila['correo'];
       
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'arexcreepysounds@gmail.com';                     // SMTP username
    $mail->Password   = 'Mis bolas';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('arexcreepysounds@gmail.com', 'Armando Cajilema');
    $mail->addAddress($correo);     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Asunto muy importante';
    $mail->Body    = '

                            <div class="card">
                                <div class="view overlay">
                                    <img class="card-img-top"
                                        src="https://upload.wikimedia.org/wikipedia/commons/1/14/INIAP.png"
                                        alt="Card image cap">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Felicitaciones</h4>
                                    <hr>
                                    <p class="card-text">Estimad@ :<strong> '.$apellidos.' '.$nombres.' </strong>,<br>
                                        Bienvenido a la plataforma AgroIniap,<br>
                                        sus credenciales de acceso son:<br><br>
                                        <strong>Usuario:</strong> '.$usuario.',<br><br>
                                        <strong>Clave:</strong> '.$usuario.'Iniap<br><br>
                                      Saludos cordiales.
                                    </p>
                                </div>';
                                
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    session_destroy();
    echo '<script> location.href="../Index.html"; </script>';
} catch (Exception $e) {
    echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
}
};