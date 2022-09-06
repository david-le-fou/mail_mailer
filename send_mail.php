<?php
 define('SERVER_HOST_MAIL','rovatravel.com');
 define('PORT','465');
 define('USER','test@rovatravel.com');
 define('PASSWORD','3B#9y2az');
 
 define('EMAIL_DEST','david.david@gmail.com');
 define('EMAIL_EXPEDIT','david.set@gmail.com');
 define('EMAIL_OBJECT','Formulaire');
 define('EMAIL_CONTENU','Mail avec piece jointe');
 define('EMAIL_TEXTE','bonjour je test');
 define('EMAIL_PIECE_JOINT','fichier.pdf');
 
// lance les classes de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;
// path du dossier PHPMailer % fichier d'envoi du mail
require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);
$mail->IsSMTP();

try {
	$mail->Host = SERVER_HOST_MAIL;
    $mail->SMTPDebug = 1; 
    $mail->SMTPSecure = 'ssl'; //<----------------- You missed this 
    $mail->SMTPAuth = true; 
    $mail->Port = 465; // 
    $mail->Username = USER;
    $mail->Password = PASSWORD;
    // $mail->AddAddress('mio2hanitra@gmail.com', 'david');
    $mail->AddAddress('david.propitech@gmail.com', 'web master');
    // $mail->AddAddress('rtt@moov.mg', 'david');
	$mail->AddReplyTo('andrisondavidmail@gmail.com','davi'); 
    $mail->SetFrom('andrisondavidmail@gmail.com', EMAIL_CONTENU);
    $mail->Subject = EMAIL_OBJECT;
    // $mail->AltBody = 'test2';
    //$mail->addAttachment("../export-pdf/pdf/".EMAIL_PIECE_JOINT);         // Pièces jointes en gardant le nom du serveur
    $body = 'testes'; // automatically
    $mail->MsgHTML($body);
    $mail->Send();
    // echo "Message Sent OK</p>\n";

} catch ( phpmailerException $e ) {
    if($_REQUEST['var']=='debug'):
        // echo $e->errorMessage(); 
        $statut = 'ok';
    endif;
} catch ( Exception $e ) {
    if($_REQUEST['var']=='debug'):
        // echo $e->getMessage();
        $statut = "non";
    endif;
     
}
