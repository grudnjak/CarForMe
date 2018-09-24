<?php
    include_once './session.php';
    include_once './database.php';
  
    $ime = $_POST['ime'];
    $idapp = $_POST['id'];
    
    
    if (!empty($ime)) {
        $query = "UPDATE znamke SET ime=? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime,$idapp]);

        header("Location: znamke_admin.php");
    }
    else {
        header("Location: znamka_edit.php?id=$idapp");
    }
    
?>