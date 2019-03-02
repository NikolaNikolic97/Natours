<?php
if(isset($_GET["id"])) {
    require "konekcija.php";
    $id = $_GET["id"];
    $upit = "DELETE  FROM korisnik WHERE id = :id";
    $prepare = $conn->prepare($upit);
    $prepare->bindParam(":id", $id);
    try {
        $row = $prepare->execute();
        header("Location: ../admin.php?page=users");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}