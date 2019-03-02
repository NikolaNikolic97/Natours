<?php
    session_start();
    unset($_SESSION["korisnik"]);
    session_destroy($_SESSION["korisnik"]);
    header("Location: ../login.php");