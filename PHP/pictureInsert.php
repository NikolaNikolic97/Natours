<?php
include "funkcija_slike/funkcije.php";
require "konekcija.php";
if(isset($_POST['insert'])){
    $desc = $_POST['desc'];
    $id_tour = $_POST['tour'];
    $pic=$_FILES["file"];
    $tmp = $pic["tmp_name"];
    $picName = $pic["name"];
    $picSize = $pic["size"];
    $picType = $pic["type"];

    $errors = [];
    $formati = array("image/jpg", "image/jpeg", "image/png", "image/gif");

    if(!in_array($picType, $formati)){
        $errors[] = "Tip fajla nije ok.";
    }

    if($picSize > 3000000){
        $errors[] = "Fajl mora biti manji od 3MB.";
    }

    if(count($errors) == 0){

        $fileName = time().$picName;
        $pathBase = "img/".$fileName;
        $path ="../img/".$fileName;

        if(move_uploaded_file($tmp, $path)){

            $putanja_mala = "img/mala_".$fileName;
            malaSlika($pathBase, '../'.$putanja_mala, 300, 200);

            $slika = "INSERT INTO slike VALUES('',:src, :alt, :mala,:id)";

            $prepare = $conn->prepare($slika);
            $prepare->bindParam(":alt", $desc);
            $prepare->bindParam(":src", $pathBase);
            $prepare->bindParam(":mala", $putanja_mala);
            $prepare->bindParam(":id", $id_tour);

            try{
                $rez = $prepare->execute();
                if ($rez){
                    echo $rez;
                    header("Location: ../admin.php?page=picture");
                }
            }
            catch(PDOException $ex){
                echo $ex->getMessage();
            }

        } else {
            echo "Nije uspeo upload fajla!";
        }
    }

}