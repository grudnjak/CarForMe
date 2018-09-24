<?php
    include_once './session.php';
    include_once './database.php';
  
    $ime = $_POST['ime'];
    $priimek = $_POST['priimek'];
    $datum_roj = $_POST['datum_roj'];
    $idapp = $_POST['id'];
    
    
    if (!empty($ime) && !empty($priimek)) {
        $query = "UPDATE osebe SET ime=?, priimek=?, datum_roj=?,"
                ."kraj_id=(SELECT id FROM kraji WHERE ime=? LIMIT 1) "
                ."WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime,$priimek,$datum_roj,$mail,$telefon,$kraj,$idapp]);

        header("Location: uporabniki.php");
    }
    else {
        header("Location: osebe_edit.php?id=$idapp");
    }
    
?>