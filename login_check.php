<?php

include_once './session.php';
include_once './database.php';
//login check
$email = $_POST['email'];
$pass = $_POST['pass'];

$prijava = 0;

if (!empty($email) && !empty($pass)) {
    //pripravimo geslo
    $pass = sha1($salt . $pass);
    $query = "SELECT * FROM osebe WHERE mail= ? AND geslo= ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email, $pass]);
    while ($row = $stmt->fetch()) {
        $prijava = 1;
        $_SESSION['user_id'] = '0';

        $query = "SELECT * FROM osebe WHERE mail= ?";
        $stmt1 = $pdo->prepare($query);
        $stmt1->execute([$email]);
        while ($row1 = $stmt1->fetch()) {

            $_SESSION['user_id'] = $row1['id'];
            $_SESSION['first_name'] = $row1['ime'];
            $_SESSION['last_name'] = $row1['priimek'];
            $_SESSION['dovoljenje'] = $row1['dovoljenje_id'];
        }

        if ($_SESSION['user_id'] == 1) {
            $_SESSION['admin'] = 1;
            header("Location: adminpanel.php");
        } else {
            header("Location: index.php");
        }
    }

    if ($prijava == 0) {
        header("Location: login.php");
    } {
        
    }
}
?>