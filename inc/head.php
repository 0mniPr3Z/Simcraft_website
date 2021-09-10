<?php
if($simcraft->connectId() == -1){ 
	$temp = $pg;
}else{
	$temp = $pg."_co";
}
?>

<meta charset="utf-8">
<title>Titre de la page</title>
<link rel="stylesheet" href="css/style.css">
	
<link rel="stylesheet" href="css/<?php echo $temp; ?>.css">
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->