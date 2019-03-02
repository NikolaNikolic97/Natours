<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $price = $_POST["price"];
    $id_cat = $_POST["cat"];
    $id_loc = $_POST["location"];
    $id=$_POST["id"];

    require_once "konekcija.php";
    $errors = [];
    if (strlen($name)<5) array_push($errors,"name");
    if (strlen($desc)<5) array_push($errors,"desc");
    if (strlen($price)<2) array_push($errors,"price");

    if (count($errors)){

    }
    else{

            $upit = "UPDATE tura SET naziv=:name,opis=:desc,id_kategorije=:id_cat,cena=:price,id_lokacije=:id_loc WHERE id =:id ";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":name",$name);
            $prepare->bindParam(":desc",$desc);
            $prepare->bindParam(":id_cat",$id_cat);
            $prepare->bindParam(":price",$price);
            $prepare->bindParam(":id_loc",$id_loc);
            $prepare->bindParam(":id",$id);

            try{
                $row = $prepare->execute();
                header("Location: ../admin.php?page=tours");
            }
            catch (PDOException $e){

            }

    }
}

else{
    // header("Location: ../admin.php?page=tours&tour=insert");
}