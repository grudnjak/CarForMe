<?php
include_once './session.php';
include_once './database.php';

$app_ime = $_POST['app_ime'];
$app_opis = $_POST['app_opis'];
$app_naslov = $_POST['app_naslov'];
$app_kraj = $_POST['app_kraj'];
$app_znamka = $_POST['app_znamka'];
$app_model = $_POST['app_model'];
$_SESSION["app_ime"] = $app_ime;



//preverim. če je uporabnik pravilno izpolnil obrazec
if (!empty($app_ime) && !empty($app_opis) && !empty($app_naslov))
        {
  
    
    $query = "INSERT INTO avtomobili(ime,opis,naslov,oseba_id,kraj_id,model_id) "
            . "VALUES (?,?,?,?,(SELECT id FROM kraji k WHERE k.ime= ? LIMIT 1),"
            . "(SELECT id FROM modeli m WHERE m.ime= ? LIMIT 1));";
       
 
$stmt = $pdo->prepare($query); 
$stmt->execute([$app_ime,$app_opis,$app_naslov,$_SESSION['user_id'],$app_kraj,$app_model]);
  
   

}
else {
    //preusmeritev nazaj
    header("Location: dodajanje_apartmaji.php");
}



header("Location: dodajanje_slike.php");

?>