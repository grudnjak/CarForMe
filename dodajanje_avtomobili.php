<?php
//dodajanje avtomobila
include_once './header.php';
include_once './database.php';
$query1 = "SELECT ime FROM kraji k ";
$stmt = $pdo->prepare($query1);
$stmt->execute();
$options = "";
while ($row = $stmt->fetch()) {

    $options = $options . "<option>$row[ime]</option>";
}

$query2 = "SELECT ime FROM modeli m ";
$stmt1 = $pdo->prepare($query2);
$stmt1->execute();
$options1 = "";
while ($row = $stmt1->fetch()) {

    $options1 = $options1 . "<option>$row[ime]</option>";
}
$query3 = "SELECT ime FROM znamke z ";
$stmt2 = $pdo->prepare($query3);
$stmt2->execute();
$options2 = "";

while ($row = $stmt2->fetch()) {

    $options2 = $options2 . "<option>$row[ime]</option>";
}
?>
<div class="box">
    <form action="car_insert.php" method="post" >
        <label>Ime avtomobila</label>
        <input type="text" name="app_ime" placeholder="Vnesi ime" required="required" />
        <label>Opis</label>
        <input type="text" name="app_opis" placeholder="Vnesi opis" required="required" />
        <label>Naslov</label>
        <input type="text" name="app_naslov" placeholder="Vnesi naslov" required="required" />
        <label>Kraj</label>
        <select name="app_kraj">
            <?php echo $options; ?>
        </select>
        <label>Znamka</label>
        <select name="app_znamka">
            <?php echo $options2; ?>
        </select>
        <label>Model</label>
        <select name="app_model">
            <?php echo $options1; ?>
        </select><br>

        <input type="submit" value="Vnesi avtomobil" name="submit" />

    </form>

