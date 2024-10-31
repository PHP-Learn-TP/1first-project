<?php
namespace App\Functions\Mailer;

use App\Class\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

/**
 * Envoi un Email a user
 * @param User $user
 * @param int $code
 * @return bool
 */
function sendConfirmationMail(User $user, int $code): bool
{


    $mail = new PHPMailer(true);

    try {
        //Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'faouzanekouko@gmail.com';
        $mail->Password   = 'uwnz yhqf bmqb ftqz';
        $mail->Port       = 587;

        //Destinataires configuration
        $mail->setFrom('faouzanekouko@gmail.com', 'STUDENTS PROJECT');
        $mail->addAddress($user->get_email());

        //Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = 'Confirmation de votre inscription';
        $mail->Body    = "Bonjour <b>{$user->get_firstname()}</b>,\n\nMerci de vous être inscrit sur notre site. Votre inscription a bien été prise en compte.Veillez confirmer votre inscription avec ce code <b>$code</b>\n\nCordialement,\nL'équipe de Test";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
