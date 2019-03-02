<?php

if(isset($_POST['update'])) {
    include("konekcija.php");
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $uloga_id = $_POST['uloga'];
    $idKorisnika = $_POST["idKorisnika"];
    if (isset($_GET["aktivan"])){
        $aktivan = $_GET["aktivan"];
    }

    $errors = [];

    $reName = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/";


    if(!preg_match($reName, $fullname)) {
       array_push($errors, "ime je nije dobro");
   }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email nije dobar.");
    }

    if(count($errors)) {
        var_dump($errors);
        $code = 422;
        http_response_code($code);
        echo json_encode(["code"=>$code]);
    } else {

        $upit = "UPDATE korisnik set ime_prezime = :ime,email = :email,aktivan = :aktivan,uloga_id = :uloga  WHERE id =:id ";
        $prepare=$conn->prepare($upit);

        $prepare->bindParam(":ime",$fullname);
        $prepare->bindParam(":email",$email);
        $prepare->bindParam(":aktivan",$aktivan);
        $prepare->bindParam(":uloga",$uloga_id);
        $prepare->bindParam(":id",$idKorisnika);

        try {
            $rez = $prepare->execute();
            if ($rez){
                  header("Location: ../admin.php?page=users");
            }

        } catch(PDOException $e) {
            $code = 409;
            http_response_code($code);
            echo json_encode(["code"=>$code]);
            echo $e->getMessage();

        }
    }


}else{
    $code = 404;
    http_response_code($code);
    echo json_encode(["code"=>$code]);
}