<?php
/*
	28cases * 48px = 
	12 cases * 48px = 336px
	
	
*/	

Class MAP extends SIMCRAFT{

private function initCase($x, $y){
	
}

public function getCaseInfo($x, $y){
	$sql = "SELECT * FROM `map` WHERE `x`='".$x."' AND `y`='"$y"'";
	$cases = $this->reqFetchAll($sql);
	if(count($cases) > 0){
		return $cases[0];
	}else{
		$this->initCase($x, $y);
		$this->getCaseInfo($x, $y);
	}
}

public function getCaseTabInfo($userX, $userY, $col, $row){
	$x = $this->getRealcase($userX, $col);
}



}

$map = new MAP();
?>