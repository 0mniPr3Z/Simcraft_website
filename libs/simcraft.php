<?php
class SIMCRAFT{
/*======= A MODIFIER =======*/
	protected $username = 'root';
	protected $password = '';
    protected $dbname     = 'simcraft';
    protected $host     = 'localhost';
/*===========================*/	
//Gestion de cookies
private function setTempCookie($name, $value){
	$timestamp = time() + 60 * 3;
	setcookie($name, $value, $timestamp);
}
public function tempCookieSub($post){
	$this->setTempCookie('loginsub',$post['login']);
	$this->setTempCookie('mail',$post['mail']);
}
public function setHoldCookie($name, $value){
	$timestamp = time() + 60*60*24*6004;
	setcookie($name, $value, $timestamp);
}
//DataBase Basic Function
private function db(){
    try{
        $pdo = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->username, $this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$retour = 'Connexion réussie';
	}catch(PDOException $e){
		echo  "Erreur : " . $e->getMessage();
	}
	return $pdo;
}
private function reqExec($ql){
	$req = $this->db()->prepare($sql);
    $req->execute();
}
private function reqFetchAll($sql){
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
//Connect
public function connectId(){
	if(isset($_SESSION['id'])){
		return $_SESSION['id'];
	}elseif(isset($_COOKIE['simcraft'])){
		$value = checkCookie($_COOKIE['simcraft']);
		if($value != -1){
			$_SESSION['id'] = $_COOKIE['id'];
			return $_SESSION['id'];
		}else{
			return -1;
		}
	}else{
		return -1;
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
public function getLastArt(){
	$sql="SELECT * FROM articles ORDER BY publi_date DESC LIMIT 1";
	return $this->reqFetchAll($sql)[0];
}
}

$simcraft = New SIMCRAFT();
include 'libs/gettheget.php';
include 'libs/vocab_'.substr($lang,0,2).'.php';