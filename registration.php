<?php
    include_once './header.php';
      include_once './database.php';
   $query1 = "SELECT ime FROM kraji k ";
   $result1 = mysqli_query($link, $query1);
   $options= "";
   
   while ($row2 = mysqli_fetch_array($result1))
   {
       $options = $options."<option>$row2[ime]</option>";
       
   }
?>
<div class="box">
<form action="user_insert.php" method="post">
    <label>Ime</label>
    <input type="text" name="first_name" placeholder="Vnesi ime" required="required" />
    <label>Priimek</label>
    <input type="text" name="last_name" placeholder="Vnesi priimek" required="required" />
    <label>E-pošta</label>
    <input type="email" name="email" placeholder="Vnesi e-pošto" required="required" />
    <label>Telefonska stevilka</label>
    <input type="text" name="tel" placeholder="Vnesi telefonsko številko" required="required" />
    <label>Datum rojstva</label>
    <input type="date" name="date" placeholder="YYYYMMDD" required="required" />  
    <label>Kraj</label>
    <select name="kraj">
        <?php echo $options;?>
    </select>
    <label>Geslo 1x</label>
    <input type="password" name="pass1" placeholder="Vnesi geslo" required="required" />
    <label>Geslo 2x</label>
    <input type="password" name="pass2" placeholder="Vnesi geslo" required="required" />
    
  
    <br>
    <input type="submit" value="Registriraj" />
</form>

</div>

<?php
    include_once './footer.php';
?>