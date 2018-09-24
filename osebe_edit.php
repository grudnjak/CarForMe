<?php
    include_once './headeradmin.php';
    include_once './database.php';
    
   $idapp = isset($_GET['id']) ? $_GET['id'] : '';

    
    $query4 = "SELECT o.id as oid ,o.ime as oime ,o.priimek as opriimek ,o.datum_roj as datroj,k.ime as kime,o.kraj_id as krajid FROM osebe o INNER JOIN kraji k ON k.id=o.kraj_id WHERE o.id=?";
    $stmt = $pdo->prepare($query4); 
    $stmt->execute([$idapp]);
    $row = $stmt->fetch();
 
    $query1 = "SELECT ime, id FROM kraji;";
    $stmt1 = $pdo->prepare($query1); 
    $stmt1->execute();
    $options= "";
   
   while ($row2 = $stmt1->fetch())
   {
       if($row2['id'] == $row['krajid'])
       {$options = $options."<option selected=\"selected\">$row2[ime]</option>";}
       else{
           $options = $options."<option>$row2[ime]</option>";
       }
       
   }
   ?>
<div class="box">
<h1>Spremeni podatke uporabnika</h1>

<form action="oseba_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['oid']; ?>" />
    <label>Ime</label>
    <input type="text" name="ime" value="<?php echo $row['oime']; ?>" required="required" />
    <label>Priimek</label>
    <input type="text" name="priimek" value="<?php echo $row['opriimek']; ?>" required="required" />
    <label>Datum rojstva</label>
    <input type="text" name="datum_roj" value="<?php echo substr($row['datroj'],0,-9); ?>" required="required" />
    <label>Kraj</label>
    <select name="kraj">
        <?php echo $options;?>
    </select>
    <br />
    <input type="submit" value="Shrani" />
</form>
</div>
