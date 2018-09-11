 <?php
    include_once './session.php';
    include_once './database.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];


    
    if (!empty($email) && !empty($pass)) {
        //pripravimo geslo
        $pass = sha1($salt.$pass);
        
        $query = "SELECT * FROM osebe WHERE mail= ? AND geslo= ?";
        $stmt = $pdo->prepare($query); 
        $stmt->execute([$email,$pass]);
         while ($row = $stmt->fetch()) {
               
             $_SESSION['user_id']= '0';
            $user = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['ime'];
            $_SESSION['last_name'] = $user['priimek'];
            $_SESSION['dovoljenje'] = $user['dovoljenje_id'];
            
            
         }  
             header("Location: login.php");
      
            //vse je ok - naredi prijavo
            //rezultat select stavka - shrani v array
            
       
            if ($user['id'] == 3){
            
            $_SESSION['admin']=1; 
            header("Location: adminpanel.php");
       }
          
        else {
            header("Location: index.php");
            }
        }
    
    else {
        
        //preusmeritev na login
      header("Location: login.php");
    }
?>