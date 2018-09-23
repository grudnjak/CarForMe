<?php
include_once './header.php';
include_once './database.php';
$idapp = $_GET['id'];


$query = "SELECT a.ime as aime ,a.naslov as anaslov,k.ime as kime,s.url as surl,a.id as aid FROM avtomobili a INNER JOIN kraji k ON k.id = a.kraj_id INNER JOIN slike s ON a.id=s.avtomobil_id "
        . "  WHERE a.id = ? ";
$stmt = $pdo->prepare($query); 
$stmt->execute([$idapp]);
$row = $stmt->fetch();

$query1 = "SELECT o.ime,o.priimek,o.mail,o.id as oid FROM osebe o INNER JOIN avtomobili a ON o.id=a.oseba_id WHERE a.id = ?";
$stmt1 = $pdo->prepare($query1); 
$stmt1->execute([$idapp]);
$row1 = $stmt1->fetch();


$_SESSION["appid"] = $row['aid'];
$_SESSION["osebaid"] = $row1['oid'];

echo "<div class=\"box\"><div class=\"4u\"><section>";
echo "<h1>Ime:</h1>";
echo "<h2>$row[aime]</h2>";
echo "<h1>Naslov:</h1>";
echo "<h2>$row[anaslov]</h2>";
echo "<h1>Kraj:</h1>";
echo "<h2>$row[kime]</h2>";
echo "</div></selection>";
?>

<form action="rezervacija_insert.php" method="post" >
    <label>Datum od: </label>
    <input type="date" name="datum_prihoda" placeholder="YYYYMMDD" required="required" />
    <label>Datum do: </label>
    <input type="date" name="datum_odhoda" placeholder="YYYYMMDD" required="required" />
    <br>
    <br>
    <input type="submit" value="Rezerviraj" name="submit" />

</form>

</div>
