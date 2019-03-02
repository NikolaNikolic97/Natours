<?php
session_start();
if (!isset($_SESSION["korisnik"])){
    header("Location: index.php");
}
require "PHP/konekcija.php";
include "views/head-ponuda.php";
include "views/navigation.php";
if (isset($_GET["id"])){
    $id=$_GET["id"];
    $upit="SELECT * FROM nacin_placanja";
    $payment = $conn->query($upit)->fetchAll();
    $upit="SELECT * FROM tura WHERE id=:id";
    $prepare = $conn->prepare($upit);
    $prepare->bindParam(":id",$id);
    try{
        $prepare->execute();
        $tour = $prepare->fetch();
        include "views/booking.php";
    }catch (PDOException $e){
        echo $e->getMessage();
    }
}

