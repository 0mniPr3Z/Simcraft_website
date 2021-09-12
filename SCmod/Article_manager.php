<?php
class Article_manager extends Simcraft_system{
	
	//GETTERS
	public function getArticles(){
		return $this->getAll('articles', 'Article');
	}
}
?>