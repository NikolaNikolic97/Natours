<?php

if(isset($_POST['submit'])) {
    include("konekcija.php");
    $href = $_POST['href'];
    $content = $_POST['content'];
    $id = $_POST["id"];



        $upit = "UPDATE meni set href = :href,sadrzaj = :sadrzaj WHERE id =:id ";
        $prepare=$conn->prepare($upit);

        $prepare->bindParam(":href",$href);
        $prepare->bindParam(":sadrzaj",$content);
        $prepare->bindParam(":id",$id);

        try {
            $rez = $prepare->execute();
                header("Location: ../admin.php?page=menu");

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

}
