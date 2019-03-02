<?php
if(isset($_GET["id"])){
    require "konekcija.php";
    $id = $_GET["id"];
    $upit = "DELETE FROM slike WHERE id = :id";
    $prepare = $conn->prepare($upit);
    $prepare->bindParam(":id",$id);
    try{
        $row = $prepare->execute();
        if ($row){
            header("Location: ../admin.php?page=picture");
        }
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}
