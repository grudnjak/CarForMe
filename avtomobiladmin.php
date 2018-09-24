<?php
    include_once './headeradmin.php';
    include_once './database.php';
    $idapp = $_GET['id'];


$query = "SELECT a.ime as aime ,a.naslov,k.ime,s.url as url,a.id FROM avtomobili a INNER JOIN kraji k ON k.id = a.kraj_id INNER JOIN slike s ON a.id=s.avtomobil_id  WHERE a.id = ? ";
$stmt = $pdo->prepare($query);
$stmt->execute([$idapp]);
$query1 = "SELECT o.ime,o.priimek,o.mail FROM osebe o INNER JOIN avtomobili a ON o.id=a.oseba_id WHERE a.id = ?";
$stmt1 = $pdo->prepare($query1);
$stmt1->execute([$idapp]);
$post = $stmt1->fetch(true);
?>
<?php

echo "<section id=\"three\" class=\"wrapper style1\">";
echo "<div class=\"container\">";
echo "<div class=\"row\"><div class=\"8u\"><section>";


while ($row = $stmt->fetch()) {
    if (!empty($row['url'])) {
        echo "<img src=\"$row[url]\" alt=\"$row[aime]\" class=\"app_slika\" > ";
    } else {
        echo "<img src=\"images/default_image.png\"  class=\"app_slika\" > ";
    }
    echo "</selection></div>";
    echo "<div class=\"4u\"><section>";
    echo "<h1>Ime:</h1>";
    echo "<h2>$row[aime]</h2>";
    echo "<h1>Naslov:</h1>";
    echo "<h2>$row[naslov]</h2>";
    echo "<h1>Kraj:</h1>";
    echo "<h2>$row[ime]</h2>";
    echo "<ul class=\"actions\">";
    echo "<li><a href=\"vse_rezervacija_admin.php?id=$row[id]\" class=\"button alt\">Vse rezervacije</a></li>";
    echo "</ul>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "<br>";
}


echo "<div class=\"container\"><div class=\"row\"><div class=\"6u\">";
echo "<h3>Ime in Priimek</h3><p>$post[0] $post[1]</p>";
echo "</div>";
echo "<div class=\"6u\">";
echo "<h3>Mail</h3><p>$post[2]</p>";
echo "</div>";
echo "<div class=\"6u\">";
echo "<h3>Tel. številka</h3><p>$post[3]</p>";
echo "</div></div>";
echo "</div>";
?>
