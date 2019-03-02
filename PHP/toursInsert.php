<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $price = $_POST["price"];
    $id_cat = $_POST["cat"];
    $id_loc = $_POST["location"];
    //dohvatanje
    $file = $_FILES["file"];
    $ime = $file["name"];
    $type = $file["type"];
    $tmp = $file["tmp_name"];
    $size=$file["size"];
    var_dump($file);

    require_once "konekcija.php";
    $errors = [];
    if (strlen($name)<5) array_push($errors,"name");
    if (strlen($desc)<5) array_push($errors,"desc");
    if (strlen($price)<2) array_push($errors,"price");
    $niz = ["image/jpg","image/jpeg","image/png","image/gif"];
    if (!in_array($type,$niz)) array_push($errors,"type");
    if($size>3000000)array_push($errors,"size");

    if (count($errors)){
       var_dump($errors);
    }
    else{
        $naziv_fajla = time().$ime;
        $nova_putanja = "img/".$naziv_fajla;
        $putanja = "../img/".$naziv_fajla;
        // upload slike
        if(move_uploaded_file($tmp, $putanja)){

            $upit = "INSERT INTO tura (naziv,opis,id_kategorije,cena,id_lokacije,slika) VALUES (:name,:desc,:id_cat,:price,:id_loc,:file)";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":name",$name);
            $prepare->bindParam(":desc",$desc);
            $prepare->bindParam(":id_cat",$id_cat);
            $prepare->bindParam(":price",$price);
            $prepare->bindParam(":id_loc",$id_loc);
            $prepare->bindParam(":file",$nova_putanja);
            try{
                $row = $prepare->execute();
                if($row){
                    header("Location: ../admin.php?page=tours");
                }
                }
            catch (PDOException $e){
                echo $e->getMessage();
                }
            }
            else{
            echo "ne ulazi u if";
            }
        }
    }

