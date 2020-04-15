<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Libs/PHPMailer/src/Exception.php';
require '../Libs/PHPMailer/src/PHPMailer.php';
require '../Libs/PHPMailer/src/SMTP.php';

include '../Conexion/conexion2.php';
$conexion=conexion();


$cedula = $_POST['cedula'];

$sql="SELECT * FROM Agr_Usuario where ci ='$cedula'";
$result=pg_query($conexion,$sql);  
$fila=pg_fetch_array($result);
   $nombres = $fila['nombres'];
   $apellidos = $fila['apellidos'];
   $cedula = $fila['ci'];
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
    $mail->Body    = '<p>
    Estimad@: <strong> '.$nombres.''.$apellidos.'</strong>,<br>
    Se ha solicitado el cambio de clave de su cuenta de <strong>AgroIniap</strong><br>
    

    <a href="http://localhost/PHP-master/Procesos/ConfirmarU.php">Click en este enlace para reestablecer su clave</a></p>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'el mensaje se envio correctamente';
} catch (Exception $e) {
    echo "Hubo un error al enviar el correo: {$mail->ErrorInfo}";
}