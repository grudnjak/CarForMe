<?php

include_once './session.php';
include_once './database.php';

$datum_prihoda = $_POST['datum_prihoda'];
$datum_odhoda = $_POST['datum_odhoda'];




//preverim. če je uporabnik pravilno izpolnil obrazec
if (!empty($datum_prihoda) && !empty($datum_odhoda)) {

    $query1 = " SELECT r.* FROM rezervacije r
                INNER JOIN avtomobili a ON r.avtomobil_id = a.id 
                WHERE a.id = ? 
                AND r.datum_odhoda >= ?
                AND r.datum_prihoda <= ?";
    $id=$_SESSION['appid'];
    $stmt = $pdo->prepare($query1); 
    $stmt->execute([$id,$datum_prihoda,$datum_odhoda]);
    $row = $stmt->fetch();
    $row_count =$stmt->fetchColumn();
    
    if ($row_count < 1) {

        $query6 = "INSERT INTO rezervacije (avtomobil_id,oseba_id,datum_prihoda,datum_odhoda) "
                . "VALUES (?,?,?,?)";
    $userid=$_SESSION['user_id'];
    $stmt1 = $pdo->prepare($query6); 
    $stmt1->execute([$id,$userid,$datum_prihoda,$datum_odhoda]);
    

//preusmeritev nazaj
        header("Location: potrditev_reg.php?id=". $_SESSION['appid']);
    } else {
        header("Location: zavrnitev.php");
    }
} else {

    header("Location: rezervacija.php?id=" . $_SESSION['appid']);
}
?>