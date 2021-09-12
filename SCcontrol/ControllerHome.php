<?php
class ControllerHome extends Simcraft_system{
	private $_articleManager;
	private $view;
	
	public function __construct($url){
		if(isset($url) && count($url) > 1)
				throw new Exception('404');
		else
			$this->articles();
	}
	
	private function articles(){
			$this->_articleManager = new Article_Manager;
			$articles = $this->_articleManager->getArticles();
			
			require_once($this->getViewRep().'home.php');
	}
	
}
?>