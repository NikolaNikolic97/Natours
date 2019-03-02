<?php
session_start();

    if (!isset($_SESSION["korisnik"])) {

        include "views/head-login.php";
        include "views/navigation.php";
        include "views/section-book.php";
    }
    else{
        header("Location: index.php");
    }
