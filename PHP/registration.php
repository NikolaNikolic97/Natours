<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';



if (isset($_POST["registracija"])) {

    require_once "konekcija.php";

    $name = $_POST["name"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $vPass = $_POST["vPass"];


    $reName = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/";
    $errors = [];

    if (!preg_match($reName, $name)) {
        $errors[] = "greska kod imena";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "greska email";
    }
    if (strlen($pass) < 6) {
        $errors[] = "greska password";
    }
    if ($pass !== $vPass || strlen($vPass) < 6) {
        $errors[] = "ne poklapa se password";
    }

    if (count($errors)) {
        http_response_code(422);
    }
    else {
        $pass = md5($pass);
        $token = md5(time() . $email);

        $upit = "INSERT INTO korisnik (ime_prezime,password,email,uloga_id,aktivan,token) VALUES(:name,:pass,:email,2,0,:token);";
        $prepare = $conn->prepare($upit);
        $prepare->bindParam(":name", $name);
        $prepare->bindParam(":pass", $pass);
        $prepare->bindParam(":email", $email);
        $prepare->bindParam(":token", $token);

                try {
                    $code = $prepare->execute() ? 201 : 500;
                    if($code == 201) {
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
                            $mail->Subject = 'Activate your account';
                            $href = "http://localhost/PHPsajt/PHP/activeUser.php?a=" . $token;
                            $mail->Body    = 'To activate your account please fallow <a href="' . $href . '">this</a> link';

                            $mail->send();
                            echo json_encode(["odg" => "SUCCESSFUL REGISTRATION"]);
                        }
                        catch (Exception $e) {
                            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                        }
                    }
                }
                catch (PDOException $e) {
                    http_response_code(409);
                }
        }
    http_response_code($code);
}
