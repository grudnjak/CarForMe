<?php

include_once './session.php';
include_once './database.php';

$model_ime = $_POST['model_ime'];
$znamka = $_POST['znamka'];
$moc = $_POST['moc'];
$st_vrat= $_POST['vrata'];





//preverim. če je uporabnik pravilno izpolnil obrazec
if (!empty(znamka_ime)) {


    $query1 = "SELECT z.id as zid  FROM znamke z WHERE z.ime = ?";
        $stmt1 = $pdo->prepare($query1); 
        $stmt1->execute([$znamka]);
        $row1 = $stmt1->fetch();
        $znamkaid= $row1['zid'];
        
    $query = "INSERT INTO modeli (ime,moc,st_vrat, znamka_id) "
            . "VALUES (?,?,?,?)";



    $stmt = $pdo->prepare($query);
    $stmt->execute([$model_ime,$moc,$st_vrat,$znamkaid]);
} else {
    //preusmeritev nazaj
    header("Location: modeli_admin.php");
}



header("Location:modeli_admin.php");
?>