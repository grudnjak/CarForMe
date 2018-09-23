<?php
    include_once './session.php';
?>
<!DOCTYPE HTML>
<!--
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>CAR4ME</title>
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
				<h1><a href="index.php">CAR4ME</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="avtomobili.php">Avtomobili</a></li>
                                                    <?php
                                        
                                        if (isset($_SESSION['user_id'])) {
                                            echo '  <li><a href="dodajanje_avtomobili.php">Dodaj avtomobil</a></li>';
                                        }
                                        else {
                                            
                                            echo ' ';
                                        }
                                        if (isset($_SESSION['admin'])) {
                                            echo '<li><a href="adminpanel.php">Admin panel</a></li>';
                                        }
                                    ?>
                                              
						<li><a href="info.php">O nas</a></li>
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
