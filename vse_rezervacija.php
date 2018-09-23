<?php

include_once './header.php';

include_once './database.php';
$idapp = $_GET['id'];

$query = "SELECT r.datum_odhoda as datumod,r.datum_prihoda as datumdo, o.ime as oime, o.priimek as opriimek, a.ime as aime,o.id FROM rezervacije r INNER JOIN osebe o ON r.oseba_id = o.id "
        . "INNER JOIN avtomobili a ON r.avtomobil_id=a.id WHERE a.id= ?;";

$stmt = $pdo->prepare($query);
$stmt->execute([$idapp]);

echo "<table>";
echo "<tr><td>Ime avtomobila</td><td>Datum od</td><td>Datum do</td><td>Ime in Priimek</td></tr>";

while ($row = $stmt->fetch()) {    

    echo " <tr><td>" . $row['aime'] . "</a></td><td>" . substr($row['datumod'], 0, -9) . "</td><td>" . substr($row['datumdo'], 0, -9) . "</td><td>" . $row['oime'] . " " . $row['opriimek'] . "</td></tr>";
}

echo "</table>";

