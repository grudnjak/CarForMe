<?php
include_once './header.php';
include_once './database.php';
?>
<div class="box">
    <form action="znamka_insert.php" method="post" >
        <label>Ime znamke</label>
        <input type="text" name="znamka_ime" placeholder="Vnesi ime" required="required" />
        <input type="submit" value="Potrdi" name="submit" />

    </form>

