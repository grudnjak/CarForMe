<?php
    include_once './header.php';
?>
<div class="box">
<h1>Prijava</h1>

<form action="login_check.php" method="post">
    <label>E-pošta</label>
    <input type="email" name="email" required="required" />
    <label>Geslo</label>
    <input type="password" name="pass" required="required" />
    <br />
    <input type="submit" value="Prijavi" />
</form>
</div>

<?php
    include_once './footer.php';
?>