<?php
if(isset($_POST['login']) && isset($_POST['password'])&& isset($_POST['password2'])
	&& isset($_POST['regl']) && isset($_POST['cooki'])){
	
	$temp = $simcraft->inscription(	$_POST['login'],
							$_POST['password'],
							$_POST['password2'],
							$_POST['regl'],
							$_POST['cooki'] );
							
	header("Location:index.php?pg=1&rrrSb=".$temp);
}else{
	header("Location:index.php?pg=1&rrrSb=3");
}
?>