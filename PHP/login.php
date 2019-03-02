<?php
session_start();
@ob_start();
require "konekcija.php";


if (isset($_POST["submit"])){

    $password = trim($_POST["pass"]);
    $email= trim($_POST["email"]);


    $reEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    $errors=[];

    if(strlen($password)<6){
        array_push($errors,"password error");
    }
    if(!$reEmail){
        array_push($errors,"email error");
    }

    if(count($errors)){
        echo json_encode(["greska"=>"422"]);
        http_response_code(422);
    }
    else{
        $password = md5($password);

        $upit="SELECT k.id as korId,k.ime_prezime as imePrezime,u.id as ulogaId,u.naziv as naziv FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id WHERE email=:email AND password = :pass AND aktivan=1";
        $prepare = $conn->prepare($upit);
        $prepare->bindParam(":email",$email);
        $prepare->bindParam(":pass",$password);


        try{
            $prepare->execute();
            $rez = $prepare->fetch();
            if ($rez){
                if ($prepare->rowCount() == 1) {

                    $_SESSION["korisnik"] = $rez;

                    if (isset($_SESSION["korisnik"])) {

                        if ($_SESSION["korisnik"]->naziv == "administrator") {
                            http_response_code(201);
                            echo json_encode(["lokacija"=>"admin.php"]);
                        }
                        else {
                            http_response_code(201);
                            echo json_encode(["lokacija"=>"ponuda.php"]);
                        }
                    }
                }

            }
            else{
                echo json_encode(["greska"=>"500"]);
                http_response_code(500);

            }


        }
        catch (PDOException $e){
            echo $e->getMessage();
        }

    }
}else{
    echo json_encode(["greska"=>"404"]);
    http_response_code(404);


}