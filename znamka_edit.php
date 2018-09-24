<?php
    include_once './headeradmin.php';
    include_once './database.php';
    
   $idapp = isset($_GET['id']) ? $_GET['id'] : '';

    
    $query4 = "SELECT z.id as zid ,z.ime as zime FROM znamke z WHERE z.id=?";
    $stmt = $pdo->prepare($query4); 
    $stmt->execute([$idapp]);
    $row = $stmt->fetch();
   ?>
<div class="box">
<h1>Spremeni podatke znamke</h1>

<form action="znamka_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['zid']; ?>" />
    <label>Znamka </label>
    <input type="text" name="ime" value="<?php echo $row['zime']; ?>" required="required" />
    <br />
    <input type="submit" value="Shrani" />
</form>
</div>
