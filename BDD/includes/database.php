<?php

$servname = "localhost"; 
$dbname = "bd_sami_template_3"; 
$dbuser = "root"; $dbpass = "";

try{	
	$dbco = new PDO("mysql:host=$servname;dbname=$dbname", $dbuser, $dbpass);
	$dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){

echo "Erreur : " . $e->getMessage();

}