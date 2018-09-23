<?php
    include_once './session.php';
    include_once './database.php';

    $id = (int) $_GET['id'];
    
    
    $query = "DELETE FROM avtomobili WHERE id=?";
   $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    
    header("Location: avtomobili.php");
?>