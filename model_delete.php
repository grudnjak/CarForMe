<?php
    include_once './session.php';
    include_once './database.php';

    //brisanje modela
    $id = (int) $_GET['id'];
    
    
    $query = "DELETE FROM modeli WHERE id=?";
   $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    
    header("Location: modeli_admin.php");
?>