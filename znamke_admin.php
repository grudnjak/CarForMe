<?php

include_once './headeradmin.php';
include_once './database.php';

$query = "SELECT z.id as zid, z.ime as zime FROM znamke z";
$stmt = $pdo->prepare($query);
$stmt->execute();


echo "<table>";
echo "<tr><td>Ime Znamke</td><td>Edit</td><td>Izbris</td></tr>";
while ($row = $stmt->fetch()) {
    
    echo " <tr><td>" . $row['zime'] . "</td>";
   
     echo "<td><a href=\"znamka_edit.php?id=$row[zid]\">Uredi</a></td><td><a href=\"znamka_delete.php?id=$row[zid]\">Izbrisi</a></td></tr>";
        
}
echo "</table><br>";
echo "<a href=\"znamka_dodajanje.php\" class=\"button special \">Dodaj znamko</a>";
?>
