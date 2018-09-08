<?php
    session_start();
    
    
$allowed = ['/projekt_apartmaji/login.php','/projekt_apartmaji/login_check.php',
     '/projekt_apartmaji/registration.php', '/projekt_apartmaji/user_insert.php',
      '/projekt_apartmaji/index.php','/projekt_apartmaji/apartmaji.php',
    '/projekt_apartmaji/info.php'];
    
    
 if (!isset($_SESSION['user_id']) && 
       !in_array($_SERVER['REQUEST_URI'], $allowed)) {
    
     header("Location: login.php");
 
       }
   


?>