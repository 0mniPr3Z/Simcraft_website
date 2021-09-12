<?php
$dbConfig 	= array($username,$password,$dbname,$host);

/*:
 *@package		SIMCRAFT
 *@class		SIMCRAFT_SYSTEM
 *@author		0mniPr3z <hernandezpa[at]live.fr>
 *@desc			The class object for the global system processing.
 */
abstract class Simcraft_system{

global $username,
		$password,
		$dbname,
		$host,
		$libPath,
		$scPath,
		$modRep,
		$conRep,
		$vueRep,
		$jsRep,
		$cssRep,
		$imgRep,
		$siteUrl,
		$tempTime,
		$stayTime;

private function _construct(){
	return 0;
}
//DATABASE METHODS
private static function setDb(){
	try{
		self::$pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
		self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return 0;
	}catch(PDOException $e){
		echo  "Erreur : " . $e->getMessage();
	}
	return $pdo;
}
private function db(){
	if(self::$pdo == null)
		$this->self::setDb();
	return self::$pdo;
}
protected function reqExec($ql){
	$req = $this->db()->prepare($sql);
	$req->execute();
	$req->closeCursor();
}
private function reqFetchAll($sql){
	$req = $this->db()->self::prepare($sql);
	$req->execute();
	while($data = $req->fetch(PDO::FETCH_ASSOC)){
		$var[] = new $obj($data);
	};
	return $var;
	$req->closeCursor();
}
protected function getAll($table){
	$sql = "SELECT * FROM ".$table;
	return $this->reqFetchAll($sql);
}

//STRING
protected function strDisplayEncode($str, $length){
	return substr(utf8_encode($str), 0, $length);
}



















/*
//COOKIE MANAGEMENT
/*:
 *@method
 *@param	{String}					
 *@desc	make		setTempCookie with predefined short timestamp
 *//*	
	protected function setTempCookie($name, $value){
		$timestamp = time() + 60 * $this->shortTime;
		setcookie($name, $value, $timestamp);
	}
	
	
	
	
	
protected function tempCookieSub($post){
	$this->setTempCookie('loginsub',$post['login']);
	$this->setTempCookie('mail',$post['mail']);
}
protected function setHoldCookie($name, $value){
	$timestamp = time() + 60*60*24*6004;
	setcookie($name, $value, $timestamp);
}
//DataBase Basic Function

protected function reqExec($ql){
	$req = $this->db()->prepare($sql);
    $req->execute();
}
protected function reqFetchAll($sql){
	$req = $this->db()->prepare($sql);
    $req->execute();
	return $req->fetchAll(PDO::FETCH_ASSOC);
}

//Subscribe sanity login
private function checkLoginSyntax($login){
	if(preg_match('`^([a-zA-Z]{1,20})$`', $login))
		return 1;
	return 0;
}
private function checkLoginExist($login){
	$sql = '"SELECT * FROM users WHERE login = '.strtolower($login).'"';
	$user = $this->reqFetchAll($sql);
	if(count($user) > 0)
		return 1;
	return 0;
}
private function checkLogin($login){
	if($login != NULL){
		if($this->checkLoginSyntax($login) == 1){
			if($this->checkLoginExist($login) != 1){
				return 1;
			}else{
				return 4;
			}
		}else{
			return 2;
		}
	}else{
		return 3;
	}
}
//Subscribe
public function inscription($login, $pass, $pass2, $mail, $regl, $cooki){
	if($this->checkLogin($login) == 1){
		$loginOK = strtolower($login);
		if($this->checkMail()){
			return 1;
		}
	}else{
		return $this->checkLogin($login);
	}
}


































//Typo
public function cleanTypo($chaine){
	$string= strtr(
		$chaine,
		"ÀÁÂàÄÅàáâàäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
		"aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
	$result = strtolower(str_replace(' ', '-', $string));
	return $result;
}









public function checkPlayer(){
	if(isset($_SESSION['id'])){
		$playerId= $_SESSION['id'];
		
	}elseif(isset($_COOKIE['playerId'])){
	
		$value = checkConnectCookie($_COOKIE['playerId'], $_COOKIE['pss'], $_COOKIE['login']);
		
		if($value){
			$_SESSION['id'] = $_COOKIE['playerId'];
			return $_SESSION['id'];
		}
	}
	return 0;
}





























//Check Data
private function checkedUserConnect($login, $pass){
	$sql = "SELECT * FROM users WHERE login = '".$login."' AND pass = '".$pass."'";
	$users = reqFetchAll($ql);
	if(count($users) > 0)
		return $userList[0]['id'];
	return -1;
}
private function checkedUserByLogin($login){
	$sql = "SELECT * FROM users WHERE login = '".$login."'";
	$users = reqFetchAll($ql);
	if(count($users) > 0)
		return $userList[0]['id'];
	return -1;
}
private function checkedUserByMail($mail){
	$sql = "SELECT * FROM users WHERE mail = '".$mail."'";
	$users = reqFetchAll($ql);
	if(count($users) > 0)
		return $userList[0]['id'];
	return -1;
}
private function checkedCookie($cookie){
	$login = $cookie['usrnm'];
	$pass = $cookie['pss'];
	if(checkedUserConnect($login, $pass) == -1){
		unset($_COOKIE['simcraft']);
	}
	return checkedUser($login, $pass);
}
//Get User Data
private function getUserDataById($id){
	$sql = "SELECT * FROM users WHERE id = ".$id;
	$users = reqFetchAll($ql);
	if(count($users) > 0)
		return $userList[0];
	return -1;
}
private function getPJData($data){
	$user = getUserDataById($_SESSION['id']);
	if($user != -1){
		if(isset($data) && $data!= NULL)
			return $user[$data];
	}else{
		session_destroy();
	}
}

private function getConnexionList(){
	$sql = ("SELECT * from connexions");
	return $this->reqFetchAll($sql);
}
//Connect
public function connectedMembers(){
	$allConnections = $this->getConnexionList();
	if($allConnections > 0){
		$connected = [];
		for($i = 0; $i< count($allConnections);$i++){
			if($allConnections['0']['timestamp'] - 1800 > time())
				array_push($connected, $allconnexions[$i]);
		}
		return $connected;
	}else{
		return 0;
	}
}
private function createUser($login, $pass, $mail, $cookies){
	$psy = rand(0,5);
	$phys = rand(0,5);
	if($psy + $phys < 4){
		if($psy < $phys)
			$psy+=3;
		else
			$phys+=3;
	}elseif($psy + $phys > 7){
		if($psy > $phys)
			$psy-=1;
			
		else
			$phys-=1;
	}else{
		$psy++;
		$phys++;
	}
	$token = sha1($login."simcraft");
	$sql = "INSERT INTO `users`(`login`, 		`pass`, 	`email`, 	`cookies`, 	`token`, `cash`, `mp`, `pt`, `nrj`, `psy`, 	`phys`, 	`hp`)
						VALUES ('".$login."','".$pass."','".$mail."','".$cookies."','".$token."',100,		0,	0,		10,".$psy.",".$phys.", 100)";
	reqExec($ql);
	$value = [];
	$value['id'] = checkedUser($login, $pass);
	$value['usrnm'] = $login;
	$value['pss'] = $pass;
	if($cookies == 1)
		setcookie('simcraft', $value, -1, '/');
	$_SESSION['id'] = $value['id'];
	return "Vous êtes àprésent connecté";
}
public function getLastArtHome($lang){
	$sql="SELECT * FROM articles WHERE etiquette = 1 AND lang = '".$lang."' ORDER BY publi_date DESC LIMIT 1";
	return $this->reqFetchAll($sql)[0];
}*/
}
?>