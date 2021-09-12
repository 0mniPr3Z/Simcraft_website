<?php

class Simcraft_router extends Simcraft_system{
	private $_ctrl;
	private $_view;
	
	public function routeReq(){
		
		try{
			spl_autoload_register(function($class){require_once($this->getModRep().'/'.$class.'.php');});
			$url = [];
			if(isset($_GET['url'])){
				$url 				= explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
				$pgName				= ucfirst(strtolower($_GET['url']));
				
				$conFilePath		= $this->getConRep()."Controller_".$pgName.".php";
				$cssFilePath		= $this->getCssRep()."Css_".$pgName.".css";
				
				
				if(file_exists($conFilePath)){
					require_once($conFilePath);
					$this->_ctrl = new $conClass($url);
				}else
					throw new Exception('Page introuvable');
				
				
			}else{
				require_once($this->getConRep().'ControllerHome.php');
				$this->_ctrl = new ControllerHome($url);
			}
		}catch(Exeption $e){
			$errorMsg = $e->getMessage();
			require($this->view);
		}
	}
	
}