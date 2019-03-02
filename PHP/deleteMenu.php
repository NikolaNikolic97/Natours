<?php
if(isset($_GET["id"])){
    require "konekcija.php";
    $id = $_GET["id"];
    $upit = "DELETE FROM meni WHERE id = :id";
    $prepare = $conn->prepare($upit);
    $prepare->bindParam(":id",$id);
    try{
        $row = $prepare->execute();
        if ($row){
            $upit = "SELECT * FROM meni";
            $meni = $conn->query($upit)->fetchAll();
            if (count($meni)) {
                header("Location: ../admin.php?page=menu");
            }
        }
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}
