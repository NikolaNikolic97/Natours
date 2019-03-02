<?php
if(isset($_POST['submit'])) {
    include("konekcija.php");
    $href = $_POST['href'];
    $content = $_POST['content'];


    $upit = "INSERT INTO meni (href,sadrzaj) VALUES (:href,:sadrzaj)";
    $prepare=$conn->prepare($upit);

    $prepare->bindParam(":href",$href);
    $prepare->bindParam(":sadrzaj",$content);

    try {
        $rez = $prepare->execute();
            header("Location: ../admin.php?page=menu");

    } catch(PDOException $e) {
        echo $e->getMessage();
    }

}
