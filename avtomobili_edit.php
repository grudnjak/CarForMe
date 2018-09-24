<?php
include_once './header.php';
include_once './database.php';

$idapp = isset($_GET['id']) ? $_GET['id'] : '';


$query4 = "SELECT a.id as aid,a.ime as aime,a.opis as aopis,a.naslov as anaslov,m.ime as mime, a.model_id as model FROM avtomobili a INNER JOIN kraji k ON k.id=a.kraj_id INNER JOIN modeli m ON m.id=a.model_id WHERE a.id=? ";
$stmt = $pdo->prepare($query4);

$stmt->execute([$idapp]);
$row = $stmt->fetch();
$model= $row['model'];
$query = "SELECT m.ime as mime,m.id as mid FROM modeli m ";
$stmt1 = $pdo->prepare($query);
$stmt1->execute();
$options1 = "";


while ($row1 = $stmt1->fetch()) {

   if($row1['mid'] == $row['model'])
       { $options1 = $options1."<option selected=\"selected\">$row1[mime]</option>";
       
       }
       
       else{
           $options1 = $options1."<option>$row1[mime]</option>";
       }
       
}
?>
<div class="box">
    <h1>Spremeni podatke o avtomobilu</h1>

    <form action="car_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['aid']; ?>" />
        <label>Ime</label>
        <input type="text" name="ime" value="<?php echo $row['aime']; ?>" required="required" />
        <label>Opis</label>
        <input type="text" name="opis" value="<?php echo $row['aopis']; ?>" required="required" />
        <label>Naslov</label>
        <input type="text" name="naslov" value="<?php echo $row['anaslov']; ?>" required="required" />
        <label>Model</label>
        <select name="app_model">
            <?php echo $options1; ?>
        </select>
        <br />
        <input type="submit" value="Shrani" />
    </form>
</div>
