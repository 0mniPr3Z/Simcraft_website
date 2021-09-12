<?php
	session_start();
require_once'libs/simcraft.php';
?>
<!doctype html>
<html lang="fr">
<head>
  <?php include'inc/head.php'; ?>
</head>
<body >
	<?php
		include 'inc/cookiesbar.php';
		include 'inc/lang.php';
	?>
	
</div>
	<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
	<?php
		if(!isset($_COOKIE['preloaded']) && $pg=0){ ?>
		<div class="preloader"><div></div></div>
	<?php }else{$simcraft->setHoldCookie('preloaded', 'ok');} ?>
	<div class="pageHeader">
		<img class="headerlogo" src="img/logoHeader.png" alt="<?php echo $vocabSite[0]; ?>">
		<nav>
			<?php include"inc/navbar.php"; ?>
		</nav>
		
	</div>
	<br>
	  <?php
		//echo $console;
		if(isset($player)){
			
		}else{
			if($pg == 1)
				include"inc/entrance.php";
			else
				include"inc/home.php";
		}
	?>
	<div class="pageFooter">
		<?php include'inc/footer.php';?>
	</div>
	<script src="js/someTools.js"></script>

</body>
</html>