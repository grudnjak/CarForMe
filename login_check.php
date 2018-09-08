 <?php
    include_once './session.php';
    include_once './database.php';

    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $email = mysqli_real_escape_string($link, $email);
    $pass = mysqli_real_escape_string($link, $pass);

    
    if (!empty($email) && !empty($pass)) {
        //pripravimo geslo
        $pass = sha1($salt.$pass);
        $query = "SELECT * FROM osebe WHERE mail='$email' AND geslo='$pass'";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result) != 1) {
            //preusmeritev na login
            header("Location: login.php");
        }
        else {
            //vse je ok - naredi prijavo
            //rezultat select stavka - shrani v array
            $_SESSION['user_id']= '0';
            $user = mysqli_fetch_array($result);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['first_name'] = $user['ime'];
            $_SESSION['last_name'] = $user['priimek'];
            $_SESSION['dovoljenje'] = $user['dovoljenje_id'];
            
       
            if ($user['id'] == 3){
            
            $_SESSION['admin']=1; 
            header("Location: adminpanel.php");
       }
          
        else {
            header("Location: index.php");
            }
        }
    }
    else {
        
        //preusmeritev na login
      header("Location: login.php");
    }
?>