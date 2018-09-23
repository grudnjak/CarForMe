<?php
    include_once './header.php';
?>
<div class="box" >
    <h1>Avtomobil je za ta datum ze rezerviran, poglejte si vse rezervacije</h1>
   
<ul class="actions">
    <?php
    echo "<li><a href=\"vse_rezervacija.php?id=".$_SESSION['appid']."\" class=\"button alt\">Vse rezervacije</a></li>";
        ?>
</ul>
</div>    
