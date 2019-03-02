<?php
session_start();
header("Content-type: application/json");
    $id_korisnika = $_SESSION["korisnik"]->korId;
    require "konekcija.php";
    if (isset($_POST["anketa"])) {
        $idOdgovora = $_POST["odgovor"];
        $idAnkete = $_POST["id"];
        $upit = "SELECT * FROM odgovor o INNER JOIN anketa_korisnik ak ON o.id = ak.id_odgovora WHERE odgovoreno = 1 AND id_ankete=:idA AND id_korisnika = :idK";
        $prepare = $conn->prepare($upit);
        $prepare->bindParam(":idK", $id_korisnika);
        $prepare->bindParam(":idA", $idAnkete);
        $prepare->execute();
        $rez = $prepare->fetch();
        if ($rez) {
            http_response_code(409);
            echo json_encode(["odg"=>"vec ste odgovarali na ovu anketu"]);
        }
        else {
            $upit = "INSERT INTO anketa_korisnik (id_korisnika, id_odgovora, odgovoreno) VALUES ($id_korisnika, $idOdgovora,1);";
            try {
                $rez = $conn->exec($upit);
                if ($rez) {
                    http_response_code(201);
                    echo json_encode(["odg" => "Thank you for your cooperation"]);
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }else{
        http_response_code(404);
        echo json_encode(["odg"=>"error 404"]);
    }