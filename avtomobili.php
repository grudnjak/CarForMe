<?php

include_once './header.php';
?>

<?php

include_once './database.php';
//pridobivanje pod o avtomobilh

$query = "SELECT a.id as aid, a.ime  as aime ,a.opis as aopis,k.ime as kime ,m.ime as mime,z.ime as zime, o.id as oid FROM avtomobili a INNER JOIN kraji k ON k.id = a.kraj_id INNER JOIN modeli m ON m.id=a.model_id INNER JOIN znamke z ON z.id=m.znamka_id INNER JOIN osebe o ON o.id=a.oseba_id";
$stmt = $pdo->prepare($query);
$stmt->execute();



echo "<table>";
echo "<tr><td>Ime</td><td>Opis</td><td>Kraj</td><td>Model </td> <td>Znamka</td><td></td> <td>  </td> </tr>";
while ($row = $stmt->fetch()) {
    
    echo " <tr><td><a href=\"avtomobil.php?id=$row[aid]\">" . $row['aime'] . "</a></td><td>" . $row['aopis'] . "</td><td>" . $row['kime'] . "</td><td>" . $row['mime'] . "</td><td>" . $row['zime'] . "</td>";
    if (isset($_SESSION['user_id'])) {
           if ($_SESSION['user_id'] == $row['oid']) {
            echo "<td><a href=\"avtomobili_edit.php?id=$row[aid]\">Uredi</a></td><td><a href=\"avtomobili_delete.php?id=$row[aid]\">Izbrisi</a></td></tr>";
        } else {

            echo "<td></td><td></td>";
        }
    } else {
        echo "<td></td><td></td>";
    }
}
echo "</table>";
?>
