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
	//August: will complete when I have more familiarity with fetch_assoc with prepared statements.
	//return array
}


function addCustomer($name){
	global $pdo;
	$stmt = $pdo->prepare("INSERT INTO pos.customers (Name) VALUES (?)");
	$stmt->execute([$name]);
	$stmt = NULL;
	//return nothing
}

function addItem($name){
	//August: slight confusion for do you want me to take an item name and return it's details? Do you want me to add it to pos.products?
	 
	//retern nothing $TOTAL, $CUSTOMER, $ITEMS_ARRAY
}

function addPurchase($total, $customerID){
	// A: proxy function heading:  function addPurchase($purchase){
	//A: Here I've attempted to reorder this function with parameters as well as prepared statements for extra security.
	global $pdo;
	//A: adding to purchases
	//$sql = "INSERT INTO pos.purchases (total, CustomerID, DateTime) VALUES (1, 2, NOW())";
	//$pdo->query($sql);
	$stmt = $pdo->prepare("INSERT INTO pos.purchases (total, CustomerID, DateTime) VALUES (?, ?, NOW())");
	$stmt ->execute([$total, $customerID]);
	$stmt = null;
	//A: adding to purchase details.
	//A: selecting the most recent purchase
	$purchaseID = $pdo->lastInsertID();
	
	//A: didn't see the purchase object earlier. will update later. 
	/*
		$purchaseLine = $items_array['PurchaseLine'];
		$productID = $items_array['ProductID'];
		$discount = $items_array['Discount'];
		$quantity = $items_array['Quantity'];
		
		$stmt = pdo->prepare("INSERT INTO poc.purchase_details(PurchaseID, PurchaseLine, ProductID, discount, quantity) VALUES (?,?,?,?,?)");
		$stmt ->execute([$purchaseID, $purchaseLine, $productID, $discount, $quantity]);
		$stmt = null;
	*/
}
//and so on for the various features the site will need


?>