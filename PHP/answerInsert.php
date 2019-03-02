<?php
if(isset($_POST['insert'])) {
include("konekcija.php");
$odgovor = $_POST['odgovor'];
$pitanje = $_POST['pitanje'];

$upit = "INSERT INTO odgovor (odgovor,id_ankete) VALUES (:odgovor,:id_ankete)";
$prepare=$conn->prepare($upit);
$prepare->bindParam(":odgovor",$odgovor);
$prepare->bindParam(":id_ankete",$pitanje);
try {
    $rez = $prepare->execute();
    header("Location: ../admin.php?page=answer");
} catch(PDOException $e) {
    echo $e->getMessage();
}

}