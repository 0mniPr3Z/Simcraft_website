<?php
session_start();
require_once'libs/simcraft.php';
?>
<!doctype html>
<html lang="fr">
<head>
  <?php include'inc/head.php'; ?>
</head>
<body>
	<div class="pageHeader">
		<img class="headerlogo" src="img/logoHeader.png" alt="<?php echo $vocabSite[0]; ?>">
		<nav>
			<?php include"inc/navbar.php"; ?>
		</nav>
		
	</div>
	<br>
	  <?php
		//echo $console;
		if($simcraft->connectId() != -1){
			
		}else{
			if($pg == 1)
				include"inc/entrance.php";
			else
				include"inc/home.php";
		}
	?>
	<div class="pageFooter">
		bla
	</div>
</body>
</html>