<?php
/*:
 *@package		SIMCRAFT
 *@class		SIMCRAFT_SYSTEM
 *@author		0mniPr3z <hernandezpa[at]live.fr>
 *@desc			Complete the configuration variables of the system.
 */

/*==================== BEGIN CONFIG =====================*/

// Informations de connection à la base de donnée
$username 	= 'root';
$password 	= '';
$dbname     = 'simcraft';
$host     	= 'localhost';

//Url du site type 'http://www.nom.domaine'"
$siteUrl	= 'localhost/';

//Cookie
$tempTime	= 3;	//how many time temp cookies stay in minutes max 10
$stayTime	= 3;	//how many time rest cookies stay in years max 100

/*===================== END CONFIG ======================*/

$dbConfig 	= array($username,$password,$dbname,$host);