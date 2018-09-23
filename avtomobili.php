<?php

include_once './header.php';
?>

<?php

include_once './database.php';

$query = "SELECT a.id, a.ime ,a.opis,k.ime,m.ime,z.ime FROM avtomobili a INNER JOIN kraji k ON k.id = a.kraj_id INNER JOIN modeli m ON m.id=a.model_id INNER JOIN znamke z ON z.id=m.znamka_id";
$stmt = $pdo->prepare($query);
$stmt->execute();



echo "<table>";
echo "<tr><td>Ime</td><td>Opis</td><td>Kraj</td><td>Model </td> <td>Znamka</td><td></td> <td>  </td> </tr>";
while ($row = $stmt->fetch(true)) {
    
    echo " <tr><td><a href=\"avtomobil.php?id=$row[0]\">" . $row['1'] . "</a></td><td>" . $row['2'] . "</td><td>" . $row['3'] . "</td><td>" . $row['4'] . "</td><td>" . $row['5'] . "</td>";
    if (isset($_SESSION['user_id'])) {
        if ($_SESSION['user_id'] == $row[5]) {
            echo "<td><a href=\"avtomobil_edit.php?id=$row[0]\">Uredi</a></td><td><a href=\"avtomobil_delete.php?id=$row[0]\">Izbrisi</a></td></tr>";
        } else {

            echo "<td></td><td></td>";
        }
    } else {
        echo "<td></td><td></td>";
    }
}
echo "</table>";
?>
