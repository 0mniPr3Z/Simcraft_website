<?php
	if($simcraft->connectId() == -1){ 
		$temp = $pg;
	}else{
		$temp = $pg."_co";
	}
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?php echo $vocabSite[0]; ?></title>

<link rel="stylesheet" type="text/css" href="css/preloader.css">
<link rel="stylesheet" type="text/css" href="css/lang.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<link rel="stylesheet" type="text/css" href="css/<?php echo $temp; ?>.css">

<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
<script src="js/jquery-3.6.0.min.js"></script>
<script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>