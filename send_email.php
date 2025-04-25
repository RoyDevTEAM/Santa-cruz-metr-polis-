<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ajusta estas rutas según tu estructura de directorios
// Desde send_email.php dentro de /public
require 'C:\xampp\htdocs\a-tour-guide-app/PHPMailer-master/src/Exception.php';
require 'C:\xampp\htdocs\a-tour-guide-app/PHPMailer-master/src/PHPMailer.php';
require 'C:\xampp\htdocs\a-tour-guide-app/PHPMailer-master/src/SMTP.php';


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['message']);

    if(empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || empty($message)) {
        $_SESSION['message'] = 'Por favor complete todos los campos correctamente';
        header('Location: contact.php');
        exit;
    }

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'cmaximito111@gmail.com';
        $mail->Password = 'jzsn megc zlan glxd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom($email, $name);
        $mail->addAddress('cmaximito111@gmail.com');

        // Verificar si se subió un archivo y adjuntarlo
        if(isset($_FILES['attachment']) && !empty($_FILES['attachment']['name'][0])) {
            foreach ($_FILES['attachment']['name'] as $key => $filename) {
                if($_FILES['attachment']['error'][$key] === UPLOAD_ERR_OK) {
                    $uploadFile = $_FILES['attachment']['tmp_name'][$key];
                    $uploadName = $filename;
                    $mail->addAttachment($uploadFile, $uploadName);
                }
            }
        }


        // Contenido
        $mail->isHTML(true);
        $mail->Subject = 'Mensaje Del Usuario ' . $name; 
        $mail->Body = "
<div style='max-width: 600px; margin: 0 auto; font-family: \"Poppins\", sans-serif; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border-radius: 15px; overflow: hidden;'>
    <div style='background: linear-gradient(135deg, #1b4b36 0%, #2d6a4f 100%); padding: 30px; text-align: center; border-bottom: 4px solid #4caf50;'>
        <img src='https://rojas-lawfirm.com/wp-content/uploads/2020/06/rojas-abogados-gobernacion-santa-cruz.jpg' 
             alt='Santa Cruz Guide Logo' 
             style='width: 100px; display: block; margin: 0 auto 15px; border-radius: 50%; border: 2px solid #4caf50; object-fit: cover;'>
        <h1 style='color: #fff; margin: 0; font-size: 28px; text-transform: uppercase; letter-spacing: 2px;'>🗺️⁀જ✈︎ [Santa Cruz Guide]</h1>
        <p style='color: #4caf50; margin: 5px 0 0; font-size: 16px;'>Santa Cruz De La Sierra</p>
    </div>

        <div style='padding: 30px; background: linear-gradient(45deg, #f0faf5 0%, #e0f0e5 100%);'>
            <div style='background: white; padding: 25px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); transform: perspective(1000px) rotateX(2deg); border-left: 4px solid #4caf50;'>
                <h3 style='color: #1b4b36; margin-top: 0; font-size: 22px;'>📨 Nuevo Mensaje Del Usuario $name</h3>
                
                <div style='border-bottom: 2px solid #e0f0e5; padding-bottom: 15px; margin-bottom: 20px;'>
                    <p style='margin: 10px 0;'><strong style='color: #2d6a4f;'>👤 Nombre:</strong> $name</p>
                    <p style='margin: 10px 0;'><strong style='color: #2d6a4f;'>📩 Email:</strong> $email</p>
                    ".(!empty($phone) ? "<p style='margin: 10px 0;'><strong style='color: #2d6a4f;'>📱 Teléfono:</strong> $phone</p>" : "")."
                </div>

                <div style='background: #f0faf5; padding: 20px; border-radius: 8px; position: relative;'>
                    <div style='position: absolute; top: -12px; left: 20px; background: #4caf50; color: white; padding: 5px 15px; border-radius: 5px; font-size: 14px;'>Mensaje</div>
                    <p style='color: #1b4b36; line-height: 1.6; margin: 15px 0 0;'>".nl2br($message)."</p>
                </div>
            </div>

            <div style='margin-top: 25px; text-align: center; color: #2d6a4f; font-size: 12px; border-top: 2px solid #e0f0e5; padding-top: 20px;'>
                <p>🕒 Enviado el ".date('d/m/Y H:i')." desde el formulario de contacto</p>
                <p style='margin: 5px 0;'>🗺️⁀જ✈︎  [Santa Cruz Guide]</p>
                <p style='margin: 0;'>📍 [Av.Omar Chavez Ortiz]</p>
            </div>
        </div>
    </div>
    ";
        $mail->send();
        $_SESSION['message'] = '✅ Mensaje enviado correctamente. ¡Gracias por contactarnos!';
    } catch (Exception $e) {
        $_SESSION['message'] = "❌ Error al enviar el mensaje: {$mail->ErrorInfo}";
    }

    header('Location: contact.php');
    exit;
}