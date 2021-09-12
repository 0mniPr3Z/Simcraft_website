<?php
class Article extends Article_manager{
	private $_id;
	private $_autor_id;
	private $_lang_id;
	private $_title;
	private $_intro;
	private $_content;
	private $_etiquette;
	private $_likes;
	private $_publi_date;
	private $_last_update;
	private $keywords;
	private $case_id;
	private $_topic_id;
	
	//INITIALIZE
	public function __construct(array $data){
		$this->hydrate($data);
	}
	public function hydrate(array $data){
		foreach($data as $key => value){
			$method = 'set'.ucfirst($key);
			if(method_exists($this, $method))
				$this->$method($value);
		}
	}
	
	//SETTERS
	public function setId($id){
			$id = (int) $id;
			if($id > 0)
				$this->_id = $id;
	}
	public function setAutor($autor){
			$id = (int) $autor;
			if($autor > 0)
				$this->_autor_id = $autor;
	}
	public function setLang($lang){
			if(is_string($lang) && ($lang == 'fr_FR' || $lang == 'en_EN'))
				$this->$_lang_id = $lang;
			else
				$this->$_lang = 'fr_FR';
	}
	public function setTitle($title){
			if(is_string($title) && $title != NULL)
				$this->$_title = $this->strDisplayEncode($title, 25);
			else
				$this->$_title = "TITLE LOADING FAILED";
	}
	public function setIntro($intro){
			if(is_string($intro) && $intro != NULL))
				$this->$_title = $this->strDisplayEncode($intro, 250);
			else
				$this->$_title = "INTRO LOADING FAILED";
	}
	public function setContent($content){
			if(is_string($content) && $content != NULL))
				$this->$_title = $this->strDisplayEncode($intro, 900);
			else
				$this->$_title = "CONTENT LOADING FAILED";
	}
	public function setEtiquette($etiquette){
		$this->$_etiquette = (int) $etiquette;
	}
	public function setLikes($likes){
		$this->$_likes = (int) $likes;
	}
	public function setPubli_date($publi_date){
		$this->_publi_date = $publi_date;
	}
	public function setLast_update($last_update){
		$this->_last_update = $last_update;
	}
	public function setKeyswords($keywords){
			if(is_string($keywords) && $keywords != NULL)){
				$keywordsArray = explode(' ', $keywords);
				$this->$_keywords = [];
				foreach($keywordsArray as $keyword => value){
					array_push($this->$_keywords, strDisplayEncode($keyword, 25));
				}
			}else
				$this->$_title = "CONTENT LOADING FAILED";
	}
	public function setCase_id($case_id){
			$case_id = (int) $case_id;
			if($case_id > 0)
				$this->_case__id = $case_id;
	}
	public function setTopic($topic){
			$topic = (int) $topic;
			if($topic > 0)
				$this->_topic_id = $topic;
	}
	
	//GETTERS
	public function getId(){
			return $this->_id;
	}
	public function getAutorId(){
			return $this->_autorId;
	}
	public function getLang(){
			return $this->_lang;
	}
	public function getTitle(){
			return $this->_title;
	}
	public function getIntro(){
			return $this->_intro;
	}
	public function getContent(){
			return $this->_content;
	}
	public function getEtiquette(){
			return $this->_etiquette;
	}
	public function getLikes(){
			return $this->_likes;
	}
	public function getPubliDate(){
			return $this->_publi_date;
	}
	public function getLastUpdate(){
			return $this->_last_update;
	}
	public function getKeyswords(){
			return $this->_keywords;
	}
	public function getCaseId(){
			return $this->_case_id;
	}
	public function getTopicId(){
			return $this->_topic_id;
	}
	
	
	
	public function getUsers(){
		return this->getAll('users', 'Users');
	}
	
}
?>