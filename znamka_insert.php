<?php

include_once './session.php';
include_once './database.php';

$znamka_ime = $_POST['znamka_ime'];




//preverim. če je uporabnik pravilno izpolnil obrazec
if (!empty(znamka_ime)) {


    $query = "INSERT INTO znamke (ime) "
            . "VALUES (?)";



    $stmt = $pdo->prepare($query);
    $stmt->execute([$znamka_ime]);
} else {
    //preusmeritev nazaj
    header("Location: znamke_admin.php");
}



header("Location:znamke_admin.php");
?>