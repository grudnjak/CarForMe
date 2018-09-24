<?php

include_once './headeradmin.php';
include_once './database.php';

$query = "SELECT m.id as mid, m.ime as mime,z.ime as zime FROM modeli m INNER JOIN znamke z ON m.znamka_id=z.id ";
$stmt = $pdo->prepare($query);
$stmt->execute();


echo "<table>";
echo "<tr><td>Ime Modela</td><td>Znamka</td><td>Edit</td><td>Izbris</td></tr>";
while ($row = $stmt->fetch()) {
    
    echo " <tr><td>" . $row['mime'] . "</td><td>" . $row['zime'] . "</td>";
   
     echo "<td><a href=\"model_edit.php?id=$row[mid]\">Uredi</a></td><td><a href=\"model_delete.php?id=$row[mid]\">Izbrisi</a></td></tr>";
        
}
echo "</table><br>";
echo "<a href=\"model_dodajanje.php\" class=\"button special \">Dodaj model</a>";
?>
