<?php
    include_once './headeradmin.php';
    include_once './database.php';
    
    $query = "SELECT COUNT(*) FROM avtomobili";
    $stmt = $pdo->prepare($query); 
    $stmt->execute();
    $row = $stmt->fetchColumn(); 
 

    $query1 = "SELECT COUNT(*) FROM osebe";
    $stmt1 = $pdo->prepare($query1); 
    $stmt1->execute();
    $row1 = $stmt1->fetchColumn(); 
    
    $query2 = "SELECT COUNT(DISTINCT k.id)FROM kraji k INNER JOIN avtomobili a ON k.id=a.kraj_id";
    $stmt2 = $pdo->prepare($query2); 
    $stmt2->execute();
    $row2 = $stmt2->fetchColumn(); 
    
    
    $query3 = "SELECT COUNT(*)FROM rezervacije ";
    $stmt3 = $pdo->prepare($query3); 
    $stmt3->execute();
    $row3 = $stmt3->fetchColumn(); 
    ?>

<div class="box">
    <h2 style="text-align: center">Admin panel</h2>
    <?php
    echo "<h1>Število avtomobilov:</h1>";
    echo "<h2>$row</h2> ";
    echo "<h1>Število krajev z avtomobili:</h1>";
    echo "<h2>$row2</h2>";
    echo "<h1>Število rezervacij:</h1>";
    echo "<h2>$row3</h2>";
    echo "<h1>Število uporabnikov:</h1>";
    echo "<h2>$row1</h2>";
    echo "<a href=\"avtomobiliadmin.php\" class=\"button special \">Avtomobili</a>  <a href=\"uporabniki.php\" class=\"button special \">Uporabniki</a>";
    
   
    ?>
    
</div>