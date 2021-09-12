<?php
//
Class USER extends SIMCRAFT{
	
}
Class PLAYER extends USER{
	
}
if($simcraft->checkPlayer()){
	$player = new PLAYER($simcraft->checkPlayer());
}
?>