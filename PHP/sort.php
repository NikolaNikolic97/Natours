<?php
    if (isset($_POST["submit"])){
        $selected = $_POST["selected"];

        switch ($selected){
            case "0":
                $upit = "SELECT COUNT(*) as br FROM tura";
                $obj = $conn->query($upit)->fetch();
                $perPage = 6;
                $linksNumber = ceil($obj->br / $perPage);

                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $from = $perPage * ($page - 1);
                $upit = "SELECT * FROM tura LIMIT $from, $perPage";
                $tours = $conn->query($upit)->fetchAll();
                $upit = "SELECT * FROM kategorija";
                $kat = $conn->query($upit)->fetchAll();
                include "views/allTours.php";
                break;
            case "1":
                $upit = "SELECT COUNT(*) as br FROM tura ORDER BY cena desc ";
                $obj = $conn->query($upit)->fetch();
                $perPage = 6;
                $linksNumber = ceil($obj->br / $perPage);

                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $from = $perPage * ($page - 1);
                $upit = "SELECT * FROM tura LIMIT $from, $perPage";
                $tours = $conn->query($upit)->fetchAll();
                $upit = "SELECT * FROM kategorija";
                $kat = $conn->query($upit)->fetchAll();
                include "views/allTours.php";
                break;
            case "2":
                $upit = "SELECT COUNT(*) as br FROM tura ORDER BY cena desc ";
                $obj = $conn->query($upit)->fetch();
                $perPage = 6;
                $linksNumber = ceil($obj->br / $perPage);

                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $from = $perPage * ($page - 1);
                $upit = "SELECT * FROM tura LIMIT $from, $perPage";
                $tours = $conn->query($upit)->fetchAll();
                $upit = "SELECT * FROM kategorija";
                $kat = $conn->query($upit)->fetchAll();
                include "views/allTours.php";
                break;

        }

    }