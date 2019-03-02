<?php
    require_once "konekcija.php";

    if(isset($_GET["a"])){
        $token = $_GET["a"];
        $upit = "UPDATE korisnik SET aktivan = 1 WHERE token= :token";
        $prepare = $conn->prepare($upit);
        $prepare->bindParam(":token",$token);
        try{
            $prepare->execute();
            if ($prepare->rowCount() == 1){
                echo "uspesno aktiviran nalog";
            }
            else{
                echo "vec aktivan";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    else{
        header("Location: ../index.php");
    }