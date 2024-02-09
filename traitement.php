<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $object = $_POST['object'];
    $message = $_POST['message'];

    // Création d'une instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Paramètres du serveur SMTP
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'louizadroai2212@gmail.com';
        $mail->Password   = 'fjkf vnwr qvhh abtk';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Destinataire de l'e-mail
        $mail->setFrom($email, $name);
        $mail->addAddress('louizadroai2212@gmail.com', 'test');

        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message de ' . $name . ' (' . $object . ')';
        $mail->Body    = $message;

        // Envoi de l'e-mail
        $mail->send();
        echo 'Votre message a été envoyé avec succès.';
    } catch (Exception $e) {
        echo "Une erreur s'est produite lors de l'envoi du message : {$mail->ErrorInfo}";
    }
}
?>
