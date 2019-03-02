<?php
session_start();
    if (isset($_POST["book"])){
        $firstName=$_POST["firstName"];
        $lastName=$_POST["lastName"];
        $phone=$_POST["phone"];
        $id=$_POST["id_tour"];
        $payment = $_POST["payment"];
        $errors=[];
        $reName = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})*$/";
        $rePhone = "/^06[012345689]-[0-9]{6,7}$/";
        $korisnik=$_SESSION['korisnik'];

        if (!preg_match($reName,$firstName)){
            $errors[]="error firstName";
        }
        if (!preg_match($reName,$lastName)){
            $errors[]="error lastName";
        }
        if (!preg_match($rePhone,$phone)){
            $errors[]="error phone";
        }
        if(count($errors)==0) {
            require "konekcija.php";
            $upit = "INSERT INTO narudzbina VALUES ('',:ime,:prezime,:telefon,:id_ture,:id_placanja)";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":ime", $firstName);
            $prepare->bindParam(":prezime", $lastName);
            $prepare->bindParam(":telefon", $phone);
            $prepare->bindParam(":id_ture", $id);
            $prepare->bindParam(":id_placanja", $payment);
            try {
                $rez = $prepare->execute();
                if ($rez) {
                    //http_response_code(201);
                    //echo json_encode(["odg"=>"uspesno"]);

                    echo "USPESNO STE IZVRSILI NARUCIVANJE";
                }
            } catch (PDOException $e) {
                http_response_code(500);
                // echo json_encode(["odg"=>"nesupesno"]);
                echo "DOSLO JE DO GRESKE NA SERVERU";
            }
        }
        else{
            http_response_code(422);
            // echo json_encode(["odg"=>"nesupesno"]);
            echo "MORATE POPUNITI POLJA ISPRAVNO";
        }
    }
    else{
        http_response_code(404);
        echo "ERROR 404";
        //echo json_encode(["odg"=>"nesupesno"]);
    }