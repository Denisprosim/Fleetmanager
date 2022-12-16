<?php
include('includes/db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$query = "  SELECT vehicles_name, task 
            FROM (  SELECT vehicles_name, task 
                    FROM reminder_service WHERE CAST(NOW() AS DATE) = date
                    UNION ALL
                    SELECT vehicles_name, task 
                    FROM reminder_renewal WHERE CAST(NOW() AS DATE) = date) 
            AS output";
$query_run = mysqli_query($connection, $query);

if (mysqli_num_rows($query_run)) {
    $tds = array();
    while ($row = mysqli_fetch_assoc($query_run)) {
        $tds[] = $row;
    }

    $message = "";
    $message .= '<table style="border: 1px solid;"><tr table style="border: 1px solid;"><th style="border: 1px solid;">Vozidlo</th><th table style="border: 1px solid;">Úkon</th></tr>';
    foreach($tds as $td) {
        $message .= "<tr table style='border: 1px solid;'>";
        foreach($td as $tdshort) {
            $message .= "<td table style='border: 1px solid;'>$tdshort</td>";
        }
        $message .= "</tr>";
    }
    $message .= '</table>';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    try {
        //Natavení připojení
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host = "wes1-smtp.wedos.net";
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        //Autentizace
        $mail->Username = "";
        $mail->Password = "";
        $mail->setFrom("info@fltmanager.cz", "Fltmanager");

        $mail->addAddress("", "");
        $mail->isHTML(true);
        $mail->Subject = "Upozornění";
        $mail->Body = $message;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
