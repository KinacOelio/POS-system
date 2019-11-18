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
	return array
}

function getProducts($ProductID_fragment){
	return array
}

function getCustomer($name_fragment){

	return array
}

function getCustomer($CustomerID_fragment){

	return array
}

function addCustomer($name){


	return nothing
}

function addItem($name){

	retern nothing
}

and so on for the various features the site will need


?>