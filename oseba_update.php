<?php
    include_once './session.php';
    include_once './database.php';
  
    $ime = $_POST['ime'];
    $priimek = $_POST['priimek'];
    $datum_roj = $_POST['datum_roj'];
    $idapp = $_POST['id'];
    $kraj = $_POST['kraj'];
    
    
    if (!empty($ime) && !empty($priimek)) {
        $query1 = "SELECT id FROM kraji WHERE ime = ? LIMIT 1"; 
        $stmt1 = $pdo->prepare($query1); 
        $stmt1->execute([$kraj]);
         $row1 = $stmt1->fetch();
         $krajid= $row1['id'];
        
        $query = "UPDATE osebe SET ime=?, priimek=?, datum_roj=?,"
                ."kraj_id=(SELECT id FROM kraji WHERE id=? LIMIT 1) "
                ."WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime,$priimek,$datum_roj,$krajid,$idapp]);

        header("Location: uporabniki.php");
    }
    else {
        header("Location: osebe_edit.php?id=$idapp");
    }
    
?>