<?php
//instantiating the PDO 

define('DBHOST', 'localhost');
define('DBNAME', 'pos');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBCONNSTRING','mysql:host='.DBHOST.'; mysql:dbname='.DBNAME.'; charset=utf8mb4;');
$pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function genericFunction(){
	return 'test';
}

function getProducts($name_fragment){
	global $pdo;
	$sql = "";
	$result =$pdo->query($sql);
	$element = $result->fetch();
}


function getCustomer($name_fragment){

	//return array
}


function addCustomer($name){


	//return nothing
}

function addItem($name){

	//retern nothing $TOTAL, $CUSTOMER, $ITEMS_ARRAY
}

function addPurchase(){
	global $pdo;
	$sql = "INSERT INTO purchases VALUES (1, 1, 1, getdate()";
	$pdo->query($sql);
	

}
//and so on for the various features the site will need


?>