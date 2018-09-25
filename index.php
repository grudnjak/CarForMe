<?php
    include_once './header.php';
     include_once './database.php';
        
    $query = "SELECT COUNT(*) FROM avtomobili";
    $stmt = $pdo->prepare($query); 
    $stmt->execute();
    $row = $stmt->fetchColumn(); 
 

    $query1 = "SELECT COUNT(*) FROM osebe";
    $stmt1 = $pdo->prepare($query1); 
    $stmt1->execute();
    $row1 = $stmt1->fetchColumn(); 
    
    $query2 = "SELECT COUNT(DISTINCT k.id)FROM kraji k INNER JOIN avtomobili a ON k.id=a.kraj_id";
    $stmt2 = $pdo->prepare($query2); 
    $stmt2->execute();
    $row2 = $stmt2->fetchColumn(); 
    
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
<!-- One -->
			<section id="one" class="wrapper style1">
				<header class="major">
					
				</header>
				<div class="container">
					<div class="row">
						<div class="4u">
							<section class="special box">
						<?php  echo "<div class=\"prikaz\">$row1 </div><br>"; ?>
								<h3>Število različnih uporabnikov</h3>
								
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<?php  echo "<div class=\"prikaz\">$row</div><br>"; ?>
								<h3>Število različnih avtomobilov</h3>
							
							</section>
						</div>
						<div class="4u">
							<section class="special box">
								<?php  echo "<div class=\"prikaz\">$row2</div><br>"; ?>
								<h3>Št. Krajev kjer so avtomobili</h3>
								</section>
						</div>
					</div>
				</div>
			</section>

		