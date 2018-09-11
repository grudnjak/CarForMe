<?php
include_once './session.php';
include_once './database.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$date = $_POST['date'];
$tel = $_POST ['tel'];
$kraj = $_POST ['kraj'];

//preverim. če je uporabnik pravilno izpolnil obrazec
if (!empty($first_name) && !empty($last_name) && !empty($email)
        && !empty($pass1) && ($pass1==$pass2)) {
    //vse ok
    $pass = $salt.$pass1;
    $pass = sha1($pass);
    $query = "INSERT INTO osebe(ime,priimek,mail,geslo,datum_roj,tel_stevlika,kraj_id) "
            . "VALUES (?,?,?,?,?,?,(SELECT id FROM kraji k WHERE k.ime=?))";
   
    
$stmt = $pdo->prepare($query);
$stmt->execute([$first_name,$last_name,$email,$pass1,$date,$tel,$kraj]);
}
else {
    //preusmeritev nazaj
    header("Location: registration.php");
}

header("Location: login.php");

?>