<?php
session_start();
if (!isset($_SESSION["korisnik"])){
    header("Location: login.php");
}
    require "PHP/konekcija.php";
    $upit = "SELECT * FROM anketa";
    $item = $conn->query($upit)->fetchAll();
    $upit = "SELECT * FROM odgovor";
    $odg = $conn->query($upit)->fetchAll();
    include "views/head.php";
    include "views/navigation.php";
    include "views/section-stories.php";
    include "views/footer.php";