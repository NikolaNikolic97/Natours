<?php
session_start();
if(!isset($_SESSION['korisnik'])) {
    header("Location: index.php");
} else {
    if($_SESSION['korisnik']->naziv != 'administrator') {
        header("Location: index.php");
    }
}


include "views/head-admin.php";
include "views/admin-navigation.php";
require_once "PHP/konekcija.php";

//popunjavanje tabela
if (isset($_GET["page"])) {
    $page = $_GET["page"];

    switch ($page) {
        case "users":
            $upit = "SELECT *,k.id AS korisnik_id FROM korisnik k INNER JOIN uloga u ON k.uloga_id=u.id";
            $users = $conn->query($upit)->fetchAll();
            include "views/admin/users/table.php";
            break;
        case "tours":
            $upit = "SELECT * FROM tura";
            $tours = $conn->query($upit)->fetchAll();
            include "views/admin/tours/table.php";
            break;
        case "menu":
            $upit = "SELECT * FROM meni";
            $meni = $conn->query($upit)->fetchAll();
            include "views/admin/menu/table.php";
            break;
        case "question":
            $upit = "SELECT * FROM anketa";
            $question = $conn->query($upit)->fetchAll();
            include "views/admin/question/table.php";
            break;
        case "answer":
            $upit = "SELECT * FROM odgovor";
            $answer = $conn->query($upit)->fetchAll();
            include "views/admin/answer/table.php";
            break;
        case "picture":
            $upit = "SELECT * FROM slike";
            $picture = $conn->query($upit)->fetchAll();
            include "views/admin/picture/table.php";
            break;
        case "order":
            $upit = "SELECT ime,prezime,telefon,t.naziv AS naziv_ture,np.naziv AS nacin_placanja FROM  tura t INNER JOIN narudzbina n ON t.id=n.id_ture INNER JOIN nacin_placanja np ON n.id_placanja=np.id ";
            $order = $conn->query($upit)->fetchAll();
            include "views/admin/order/table.php";
            break;
    }
}
else{
    $upit="SELECT *,k.id AS korisnik_id FROM korisnik k INNER JOIN uloga u ON k.uloga_id=u.id";
    $users = $conn->query($upit)->fetchAll();
    include "views/admin/users/table.php";
}


//izvrsavanje promena nad postovima
if (isset($_GET["tour"])){
    $tour = $_GET["tour"];
    if (isset($_GET["id"])) $id = $_GET["id"];
    $upit = "SELECT * FROM kategorija";
    $kategorija = $conn->query($upit)->fetchAll();
    $upit = "SELECT * FROM lokacija";
    $lokacija = $conn->query($upit)->fetchAll();

    switch ($tour){
        case "insert":
            include "views/admin/tours/insert.php";
            break;
        case "update":
            if (isset($_GET["id"])) $id = $_GET["id"];
            $upit ="SELECT * FROM tura WHERE id = :id";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":id",$id);
            try{
                $prepare->execute();
                $nizTura = $prepare->fetch();
                include "views/admin/tours/update.php";
            }catch (PDOException $e){
                echo $e->getMessage();
            }
            break;
    }
}


//izvrsavanje promena za korisnike
if (isset($_GET["edit"])){
    $edit=$_GET["edit"];
if (isset($_GET["id"])){
    $id = $_GET["id"];
}
    switch ($edit){
        case "update":
            $upit = "SELECT *,k.id AS id_korisnika,u.naziv AS uloga FROM korisnik k INNER JOIN uloga u ON k.uloga_id = u.id WHERE k.id=:id";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":id",$id);
            $upit2 = "SELECT * FROM uloga";
            $uloge = $conn->query($upit2)->fetchAll();
            try{
                $prepare->execute();
                $user = $prepare->fetch();
                include "views/admin/users/update.php";
            }catch (PDOException $e){
                echo $e->getMessage();
            }
        break;
        case "insert":
            $upit2 = "SELECT * FROM uloga";
            $uloge = $conn->query($upit2)->fetchAll();
            include "views/admin/users/insert.php";
        break;
    }
}
//izvrsavanje promena za meni
if (isset($_GET["menu"])){
    $menu=$_GET["menu"];
    if (isset($_GET["id"])){
        $id = $_GET["id"];
    }
    switch ($menu){
        case "update":
            $upit = "SELECT * FROM meni  WHERE id=:id";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":id",$id);

            try{
                $prepare->execute();
                $m = $prepare->fetch();
                include "views/admin/menu/update.php";
            }catch (PDOException $e){
                echo $e->getMessage();
            }
            break;
        case "insert":
            include "views/admin/menu/insert.php";
            break;
    }
}
//izvrsavanje promena za odgovore
if (isset($_GET["answer"])){
    $edit=$_GET["answer"];
    if (isset($_GET["id"])){
        $id = $_GET["id"];
    }
    switch ($edit){
        case "insert":
            $upit2 = "SELECT * FROM anketa";
            $pitanja = $conn->query($upit2)->fetchAll();
            include "views/admin/answer/insert.php";
            break;
        case "delete":
            $upit = "DELETE  FROM korisnik WHERE id = :id";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":id",$id);
            try{
                $row = $prepare->execute();
                header("Location: admin.php?page=users");
            }
            catch (PDOException $e){
                echo $e->getMessage();
            }
            break;
    }
}
//izvrsavanje promena za pitanja
if (isset($_GET["question"])){
    $edit=$_GET["question"];
    if (isset($_GET["id"])){
        $id = $_GET["id"];
    }
    switch ($edit){
        case "insert":
            $upit2 = "SELECT * FROM anketa";
            $pitanja = $conn->query($upit2)->fetchAll();
            include "views/admin/question/insert.php";
            break;
        case "delete":
            $upit = "DELETE  FROM korisnik WHERE id = :id";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":id",$id);
            try{
                $row = $prepare->execute();
                header("Location: admin.php?page=users");
            }
            catch (PDOException $e){
                echo $e->getMessage();
            }
            break;
    }
}
//izvrsavanje promena za pitanja
if (isset($_GET["picture"])){
    $edit=$_GET["picture"];
    if (isset($_GET["id"])){
        $id = $_GET["id"];
    }
    switch ($edit){
        case "insert":
            $upit2 = "SELECT * FROM tura";
            $tura = $conn->query($upit2)->fetchAll();
            include "views/admin/picture/insert.php";
            break;
        case "delete":
            $upit = "DELETE  FROM korisnik WHERE id = :id";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":id",$id);
            try{
                $row = $prepare->execute();
                header("Location: admin.php?page=users");
            }
            catch (PDOException $e){
                echo $e->getMessage();
            }
            break;
    }
}


include "views/footer-admin.php";



