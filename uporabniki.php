<?php
    include_once './headeradmin.php';
    include_once './database.php';
    
        $query = "SELECT o.id as id, o.ime as oime, o.priimek as opriimek ,o.datum_roj as datumroj,k.ime as kraj FROM osebe o INNER JOIN kraji k ON k.id = o.kraj_id;";
        $stmt = $pdo->prepare($query); 
        $stmt->execute();
        


     
 
echo "<table>";
echo "<tr><td>Ime</td><td>Priimek</td><td>Datum rojstva</td><td>Kraj</td><td>Urejanje</td><td>Izbris</td></tr>";  

while($row = $stmt->fetch()){ 
echo " <tr><td>".$row['oime']."</td><td>" . $row['opriimek'] . "</td><td>" . substr($row['datumroj'],0,-9) . "</td><td>" . $row['kraj'] . "</td>"
        . "<td><a href=\"osebe_edit.php?id=$row[id]\">Uredi</a></td><td><a href=\"osebe_delete.php?id=$row[id]\">Izbrisi</a></td></tr>";  
}

echo "</table>";

