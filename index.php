<?php
    include_once './header.php';
     include_once './database.php';
?>
<section id="banner">
				<div class="inner">
					<h2>CAR4ME</h2>
					<p>Najem avtomobilov</p>
					<ul class="actions">
                                            <?php
                                        
                                        if (isset($_SESSION['user_id'])) {
                                            echo '<li><a href="avtomobili.php" class="button big special">Avtomobili</a></li>';
                                        }
                                        else {
                                            echo ' <li><a href="registration.php" class="button big special">Registritajte se</a></li> ';
                                            echo ' <li><a href="info.php" class="button big alt">Informacije</a></li> ';
                                        }
                                    ?>
                                            
					</ul>
				</div>
			</section>

		