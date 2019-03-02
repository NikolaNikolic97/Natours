<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


$status = 404;
if (isset($_POST["contact"])) {

    require_once "konekcija.php";

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $comment = $_POST["comment"];


    $reName = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/";
    $rePhone = "/^06[012345689]-[0-9]{6,7}$/";
    $errors = [];

    if (!preg_match($reName, $firstName)) {
        $errors[] = "greska kod imena";
    }
    if (!preg_match($reName, $lastName)) {
        $errors[] = "greska kod imena";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "greska email";
    }
    if (!preg_match($rePhone, $phone)) {
        $errors[] = "greska kod telefona";
    }
    if (strlen($comment) == 0) {
        $errors[] = "morate uneti komentar";
    }

    if (count($errors)) {
        $status = 422;
    }
    else {
        $status = 200;
    }
    if ($status == 200) {
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'nikola.nikolic.23.16@ict.edu.rs';                 // SMTP username
            $mail->Password = '6VnR2rRN';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                 // TCP port to connect to

            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            //Recipients
            $mail->setFrom('nikola.nikolic.23.16@ict.edu.rs', 'Registratio Form');
            $mail->addAddress($email);     // Add a recipient

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Message forom' . $firstName . ' ' . $lastName;
            $mail->Body = $comment . " message from " . $email;

            $mail->send();
            echo json_encode(["odg" => "Uspesno ste poslali poruku adminu"]);
        }
        catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
}
http_response_code($status);
