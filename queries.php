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


function getMatchingCustomers($name_frag){
	global $pdo;
	$sql = "SELECT * FROM pos.customers";
	$array = $pdo->query($sql);
	$retArray = [];
	
	$i = 0;
	while($row = $array->fetch()){
		if(preg_match($name_frag, $row['Name'])){
			$retArray[$i] =  $row['Name'];
			$i+=1;
		}
	}
	return $retArray;
}

function getMatchingProducts($name_frag){
	global $pdo;
	$sql = "SELECT * FROM pos.products";
	$array = $pdo->query($sql);
	$retArray = [];
	
	$i = 0;
	while($row = $array->fetch()){
		if(preg_match($name_frag, $row['Name'])){
			$retArray[$i] =  $row['Name'];
			$i+=1;
		}
	}
	return $retArray;
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
	$sql = "INSERT INTO pos.purchases (total, CustomerID, DateTime) VALUES (1, 2, NOW())";
	
	$pdo->query($sql);
	

}
//and so on for the various features the site will need


?>