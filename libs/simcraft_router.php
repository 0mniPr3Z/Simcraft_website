<?php

class ScRouter extends Simcraft_system{
	private $_ctrl;
	private $_vue;
	
	public function routeReq(){
		try{
			spl_autoload_register(function($class){require_once($this->modRep.'/'.$class.'.php');});
			$url = '';
			if(isset($_GET['url'])){
				$url 				= explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
				$pgName				= ucfirst(strtolower($_GET['url']));
				
				$conFilePath		= $this->conRep."Controller_".$pgName.".php";
				$cssFilePath		= $this->cssRep."Css_".$pgName.".css";
				
				
				if(file_exists($conFilePath)){
					require_once($conFilePath);
					$this->_ctrl = new $conClass($url);
				}else
					throw new Exception('Page introuvable');
				
				
			}else{
				require_once($conRep.'Controller_home.php');
				$this->_ctrl = new Controller_Home($url);
			}
		}catch(Exeption $e){
			$errorMsg = $e->getMessage();
			require($this->pathVue);
		}
	}
	
}