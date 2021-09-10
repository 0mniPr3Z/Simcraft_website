<?php
if(isset($_POST['login']) && isset($_POST['password'])&& isset($_POST['password2'])
	&& isset($_POST['regl']) && isset($_POST['cooki'])){
	
	$temp = $simcraft->inscription(	$_POST['login'],
							$_POST['pass'],
							$_POST['pass2'],
							$POST['mail'],
							$_POST['regl'],
							$_POST['cooki'] );
	if($temp != 1){
		header("Location:connexion-erreur-".$temp);
		for($i = 0; $i < 4; $i++){
			$simcraft->tempCookie_sub($_POST);
		}
		
	}
}else{
	header("Location:index.php?pg=1&rrrSb=3");
	$_SESSION['tempPOST'] = $_POST;
}
?>