<?php
require "konekcija.php";
$upit = "SELECT *,COUNT(n.ime) FROM narudzbina n INNER JOIN tura t ON n.id_ture = t.id GROUP BY id_ture ORDER BY COUNT(n.ime) DESC LIMIT 0,3 ";
$rez = $conn->query($upit)->fetchAll();