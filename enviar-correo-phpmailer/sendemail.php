
<?php
$email=$_POST['customer_email']; //Mail a donde enviamos
$nombre=$_POST['customer_name']; //Nombre de la persona que envia
$asunto=$_POST['subject']; //Subject
$mensaje=$_POST['message']; //Body


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$mail =new PHPMailer(true);
try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host ='smtp.gmail.com';
    $mail->SMTPAuth = true;
    /*Desde el que se envia*/
    $mail->Username ='proyectoofinal2022@gmail.com';
    $mail->Password = 'asdASD_123';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    /*Al que se envia*/
    $mail->setFrom($email,$nombre);
    $mail->addAddress('proyectoofinal2022@gmail.com');
    $mail->addAddress($email);  
    $mail->isHTML(true);
    $mail->Subject =$asunto;
    $mail->Body =$mensaje;
    
    $mail->send();
    echo "Mensaje enviado correctamente";
    ?>
    <div class="paddingt paddingr2">
		<button type="submit" value="Login" onclick="window.location.href = '../adminalu.php'" class="btn btn-outline-dark">Atrás</button>
	</div>
    <?php
} catch (Exception $e) {
    echo "Mensaje no enviado";
}

?>