<?php
    session_start();
    
    
$allowed = ['/CarForMe/login.php','/CarForMe/login_check.php',
     '/CarForMe/registration.php', '/CarForMe/user_insert.php',
      '/CarForMe/index.php','/CarForMe/apartmaji.php',
    '/CarForMe/info.php'];
    
    
 if (!isset($_SESSION['user_id']) && 
       !in_array($_SERVER['REQUEST_URI'], $allowed)) {
    
     header("Location: login.php");
 
       }
   


?>