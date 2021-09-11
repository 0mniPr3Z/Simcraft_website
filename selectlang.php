<?php
	
include'libs/simcraft.php';

if(isset($_POST['lang']) && ($_POST['lang'] == 'fr' || $_POST['lang'] == 'en')){
	$lang = strval($_POST['lang'].'_'.strtoupper($_POST['lang']));
	$simcraft->setHoldCookie('lang',$lang);
}
if(isset($_POST['pg']))
	$pg = intval($_POST['pg']);
header("Location:index.php?pg=1");
?>