<?php
    include_once './session.php';
    include_once './database.php';

    $id = (int) $_GET['id'];
        //delete avtomobila iz baze

    
    $query = "DELETE FROM avtomobili WHERE id=?";
   $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    
    header("Location: avtomobiliadmin.php");
?>