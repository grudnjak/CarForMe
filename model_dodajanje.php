<?php
include_once './header.php';
include_once './database.php';
//dodajanje modela forma
$query3 = "SELECT ime FROM znamke z ";
$stmt2 = $pdo->prepare($query3);
$stmt2->execute();
$options2 = "";
//izpis modelov z option
while ($row = $stmt2->fetch()) {

    $options2 = $options2 . "<option>$row[ime]</option>";
}
?>
<div class="box">
    <form action="model_insert.php" method="post" >
        <label>Ime modela</label>
        <input type="text" name="model_ime" placeholder="Vnesi ime" required="required" />
        <label>Znamka</label>
        <select name="znamka">
        <?php echo $options2; ?>
        </select>
        <label>Moc</label>
        <input type="text" name="moc" placeholder="Vnesi ime" required="required" />
        <label>St. vrat</label>
        <input type="text" name="vrata" placeholder="Vnesi ime" required="required" />
        <br>
        <input type="submit" value="Potrdi" name="submit" />

    </form>

