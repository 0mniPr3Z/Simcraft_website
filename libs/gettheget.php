<?php
//GET THE GET
if(isset($_GET) && $_GET != NULL)
	$SmcGet = $_GET;
else
	$SmcGet = [];
if(isset($_GET['testget']))
	$console = $_GET['testget'];
unset($_GET);
if(isset($SmcGet['testget']))
	$console = $SmcGet['testget'];
else
	$console = "rien dans le get";


if(isset($_COOKIE['lang'])){
	$lang = $_COOKIE['lang'];
}else{
	$lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
}

//Navigation
if(isset($SmcGet['pg']))
	$pg = htmlspecialchars($SmcGet['pg']);
else
	$pg = 0;
//Subscrib
if(isset($SmcGet['rrrSb']))
	$errorSub = intval($SmcGet['rrrSb']);
else
	$errorSub = 0;
//Connection
if(isset($SmcGet['rrrC']))
	$errorCo = intval($SmcGet['rrrC']);
else
	$errorCo = 0;
?>