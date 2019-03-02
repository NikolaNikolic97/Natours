<?php


if(isset($_POST['insert'])) {
    include("konekcija.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $uloga_id = $_POST['uloga'];
    $pass = $_POST["pass"];
    $vPass = $_POST["vPass"];
    if (isset($_POST["aktivan"])){
        $aktivan = $_POST["aktivan"];
    }
    else{
        $aktivan = 0;
    }



    $errors = [];

    $reName = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/";


    if(!preg_match($reName, $name)) {
        array_push($errors, "ime je nije dobro");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Email nije dobar.");
    }
    if(strlen($pass) < 6){
        array_push($errors, "password nije dobar");

    }

    if(strlen($vPass) < 6 || $vPass !== $pass ){
        array_push($errors, "password nije isti");
    }

    if(count($errors)) {
        $code = 422;
        http_response_code($code);
        echo json_encode(["code"=>$code]);
    } else {
        $token = md5(time().$email);
        $pass = md5($pass);
        $upit = "INSERT INTO korisnik (ime_prezime,email,password,aktivan,uloga_id,token) VALUES (:ime,:email,:pass,:aktivan,:uloga,:token)";
        $prepare=$conn->prepare($upit);

        $prepare->bindParam(":ime",$name);
        $prepare->bindParam(":email",$email);
        $prepare->bindParam(":aktivan",$aktivan);
        $prepare->bindParam(":uloga",$uloga_id);
        $prepare->bindParam(":pass",$pass);
        $prepare->bindParam(":token",$token);

        try {
            $rez = $prepare->execute();

            if ($rez){

                $code = 201;
                http_response_code($code);
                echo json_encode(["code"=>$code]);
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