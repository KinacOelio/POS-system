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
	 
	//return nothing
}

function addPurchase($purchaseArray){
	//adding the overall purchase
	global $pdo;
	$stmt = $pdo->prepare("INSERT INTO pos.purchases (total, CustomerID, DateTime) VALUES (?, ?, NOW())");
	$total = $purchaseArray['total'];
	$customerID = $purchaseArray['CustomerID'];
	if($purchaseArray['CustomerID'] == 0){
		$customerID = 'NULL';
	}
	$stmt ->execute([$total, $customerID]);
	$stmt = null;
	
	//A: adding to purchase details.
	//A: selecting the most recent purchase
	$purchaseID = $pdo->lastInsertID();
	echo count($purchaseArray['Details']);
	foreach($purchaseArray['Details'] as $details => $line){
		if($line['ProductID'] == '') {return;}
		$stmt = $pdo->prepare("INSERT INTO pos.purchase_details(PurchaseID, PurchaseLine, ProductID, discount, quantity) VALUES (?,?,?,?,?)");
		$purchaseLine = $line['PurchaseLine'];
		$productID = $line['ProductID'];
		$discount = $line['Discount'];
		$quantity = $line['Quantity'];
		$stmt ->execute([$purchaseID, $purchaseLine, $productID, $discount, $quantity]);
		$stmt = null;
	} 
}
//and so on for the various features the site will need


?>