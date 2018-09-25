<?php
include_once './headeradmin.php';
include_once './database.php';

$idapp = isset($_GET['id']) ? $_GET['id'] : '';
//urejanje modela

$query4 = "SELECT m.id as mid ,m.ime as mime, z.ime as zime, z.id as zid, m.st_vrat as vrata, m.moc as moc FROM znamke z INNER JOIN modeli m ON m.znamka_id=z.id WHERE m.id=?";
$stmt = $pdo->prepare($query4);
$stmt->execute([$idapp]);
$row = $stmt->fetch();

//izpis znamke v option
$znamka = $row['zid'];
$query = "SELECT ime,id FROM znamke z  ";
$stmt1 = $pdo->prepare($query);
$stmt1->execute();
$options1 = "";
while ($row1 = $stmt1->fetch()) {

   if($row1['id'] == $row['zid'])
       { $options1 = $options1."<option selected=\"selected\">$row1[ime]</option>";
       
       }
       
       else{
           $options1 = $options1."<option>$row1[ime]</option>";
       }
       
}
?>

<div class="box">
    <h1>Spremeni podatke modela</h1>

    <form action="model_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['mid']; ?>" />
        <label>Model </label>
        <input type="text" name="ime" value="<?php echo $row['mime']; ?>" required="required" />
        <label>Znamka</label>
        <select name="znamka">
        <?php echo $options1; ?>
        </select>
        <label>Moc </label>
        <input type="text" name="moc" value="<?php echo $row['moc']; ?>" required="required" />
        <label>St. Vrat </label>
        <input type="text" name="vrata" value="<?php echo $row['vrata']; ?>" required="required" />
        <br />
        <input type="submit" value="Shrani" />
    </form>
</div>
