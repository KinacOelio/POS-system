<?php
//instantiating the PDO 

define('DBHOST', 'localhost');
define('DBNAME', 'POS');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBCONNSTRING','mysql:host='.DBHOST.'; mysql:dbname='.DBNAME.'; charset=utf8mb4;');
$pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function genericFunction(){
	return 'test';
}

function getProducts($name_fragment){
	$sth = $dbh->prepare("SELECT name, colour FROM fruit");
	$sth->execute();
}


function getCustomer($name_fragment){

	//return array
}


function addCustomer($name){


	//return nothing
}

function addItem($name){

	//retern nothing
}

function add purchase($TOTAL, $CUSTOMER, $ITEMS_ARRAY){


}
//and so on for the various features the site will need


?>