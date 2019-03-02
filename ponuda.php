<?php
    session_start();
    if (!isset($_SESSION["korisnik"])){
        header("Location: login.php");

    }
    else{
        if($_SESSION['korisnik']) {

            require_once "PHP/konekcija.php";

            include "views/head-ponuda.php";
            include "views/navigation.php";
            if (isset($_GET["p"])){
                $p = $_GET["p"];
                $id=$_GET["id"];
            }else{
                $p =null;
            }
            switch ($p) {
                case "details":
                    $upit = "SELECT * FROM tura WHERE id=:id";
                    $prepare = $conn->prepare($upit);
                    $prepare->bindParam(":id",$id);
                    try{
                         $prepare->execute();
                        $tura = $prepare->fetch();
                    }catch (PDOException $e){
                        echo $e->getMessage();
                    }
                    include "views/tour_details.php";
                    break;
                default:
                    //paginacija
                    $page = isset($_GET['page']) ? $_GET['page'] : null;
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
            }
            include "views/footer.php";
        }
    }
