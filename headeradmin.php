<?php
    include_once './session.php';
    
    //header za admina
?>
<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Admin panel - Car4me</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body id="top">

		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
                            <h1><a href="adminpanel.php">Admin panel Car4me</a></h1>
				<nav id="nav">
					<ul>
                                                <li><a href="uporabniki.php">Uporabniki</a></li>
						<li><a href="avtomobiliadmin.php">Avtomobili</a></li>
                                                <li><a href="znamke_admin.php">Znamke</a></li> 
                                                <li><a href="modeli_admin.php">Modeli</a></li> 
                                              <li><a href="index.php">Home CAR4ME</a></li> 
					
                                                <li></li>
                                                  <?php
                                        
                                        if (isset($_SESSION['user_id'])) {
                                            echo '<a href="logout.php" class="button alt">Log out</a>';
                                        }
                                        else {
                                            echo ' <a href="login.php" class="button special ">Log in</a> ';
                                            echo ' <a href="registration.php" class="button alt">Register</a> ';
                                        }
                                    ?>
                                                
                                      <!--       echo '<li><a href="registration.php" class="button special">Sign Up</a></li>';
                                                
                                                ?>-->
					</ul>
				</nav>
			</header>
