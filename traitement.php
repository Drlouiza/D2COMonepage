<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <!-- Lien vers votre fichier CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $object = $_POST['object'];
        $message = $_POST['message'];

        // Configuration de PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Paramètres du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'testform278@gmail.com'; // Votre adresse email Gmail
            $mail->Password = 'osfi gppx vliw abzx'; // Votre mot de passe Gmail
            $mail->SMTPSecure = 'ssl'; // Activer le chiffrement TLS
            $mail->Port = 465; // Port TLS

            // Destinataires et contenu de l'email
            $mail->setFrom( $email, $firstname. ' ' .$lastname); // Expéditeur
            $mail->addAddress('testform278@gmail.com'); // Destinataire

            // Adresse de réponse avec prénom et nom
            $mail->addReplyTo($email, $firstname . ' ' . $lastname);

            // Contenu de l'e-mail
            $mail->isHTML(true); // Format HTML
            $mail->Subject = $firstname . ' ' . $lastname. ' (' . $object . ')';
            $mail->Body    = $message;

            // Envoyer l'email
            $mail->send();
            echo '<div class="success-message">Message envoyé avec succès !</div>';
        } catch (Exception $e) {
            echo '<div class="error-message">Erreur lors de l\'envoi du message : ' . $mail->ErrorInfo . '</div>';
        }
        } else {
            echo '<div class="error-message">Une erreur s\'est produite. Le formulaire n\'a pas été soumis correctement.</div>';
        }
    ?>

 </body>
</html>