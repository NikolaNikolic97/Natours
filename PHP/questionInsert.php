<?php
if(isset($_POST['insert'])) {
    include("konekcija.php");
    $pitanje = $_POST['pitanje'];

    $upit = "INSERT INTO anketa  VALUES ('',:pitanje)";
    $prepare=$conn->prepare($upit);
    $prepare->bindParam(":pitanje",$pitanje);
    try {
        $rez = $prepare->execute();
        header("Location: ../admin.php?page=question");
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

}