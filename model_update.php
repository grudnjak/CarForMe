<?php
    include_once './session.php';
    include_once './database.php';
  
    $ime = $_POST['ime'];
    $idapp = $_POST['id'];
    $moc = $_POST['moc'];
    $vrata = $_POST['vrata'];
    $znamka = $_POST['znamka'];
    
    
    if (!empty($ime)) {
        $query1 = "SELECT z.id as zid  FROM znamke z WHERE z.ime = ?";
        $stmt1 = $pdo->prepare($query1); 
        $stmt1->execute([$znamka]);
        $row1 = $stmt1->fetch();
        $znamkaid= $row1['zid'];
        
        $query = "UPDATE modeli SET ime=? , st_vrat=?, moc=?, znamka_id=? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime,$vrata,$moc,$znamkaid,$idapp]);

        header("Location: modeli_admin.php");
    }
    else {
        header("Location: model_edit.php?id=$idapp");
    }
    
?>