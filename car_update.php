<?php
    include_once './session.php';
    include_once './database.php';
  
    //update avtomobila
    
    $ime = $_POST['ime'];
    $opis = $_POST['opis'];
    $naslov = $_POST['naslov'];
    $idapp = $_POST['id'];
    $model = $_POST['app_model'];
    
    
    if (!empty($ime) && !empty($opis)) {
        $query1 = "SELECT m.id FROM modeli m WHERE m.ime = ?";
        $stmt1 = $pdo->prepare($query1); 
        $stmt1->execute([$model]);
        $row1 = $stmt1->fetch();
        $modelid= $row1[id];
        
        $query = "UPDATE avtomobili SET ime=?, opis=?, naslov=?,model_id=? WHERE id = ?";
                  
        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime,$opis,$naslov,$modelid,$idapp]);
        
        header("Location: avtomobil.php?id=$idapp");
    }
?>