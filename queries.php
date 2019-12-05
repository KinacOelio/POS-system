<?php
//instantiating the PDO 

define('DBHOST', 'localhost');
define('DBNAME', 'pos');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBCONNSTRING','mysql:host='.DBHOST.'; mysql:dbname='.DBNAME.'; charset=utf8mb4;');
$pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function getMatchingCustomers($name_frag){
	global $pdo;
	$sql = "SELECT * FROM pos.customers";
	$array = $pdo->query($sql);
	$retArray = [];
	
	$i = 0;
	while($row = $array->fetch()){
		if(preg_match("/".$name_frag."/m", $row['Name'])){
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
		if(preg_match("/".$name_frag."/m", $row['Name'])){
			$retArray[$i] =  $row;
			$i+=1;
		}
	}
	return $retArray;
}




function addCustomer($name){
	global $pdo;
	$stmt = $pdo->prepare("INSERT INTO pos.customers (Name) VALUES (?)");
	$stmt->execute([$name]);
	$stmt = NULL;
}

function addProduct($name, $price, $categoryID){
	global $pdo;
	$stmt = $pdo->prepare("INSERT INTO pos.products (name, price, CategoryID, stock, heldstock) values (?, ?, ?, 0, 0)");
	$stmt ->execute([$name, $price, $categoryID]);
	$stmt = null;
}

function restock($ProductID, $amount){
	global $pdo;
	$stmt = $pdo->prepare("UPDATE pos.products SET Stock = Stock + ? WHERE ProductID = ?");
	$stmt ->execute([$amount, $ProductID]);
	$stmt = null;
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

function sellStock($PID, $amount){
	global $pdo;
	$stmt = $pdo->prepare("UPDATE pos.products SET Stock = Stock - ? WHERE ProductID = ?");
	$stmt->execute([$amount, $PID]);
	$stmt = NULL;	
}


?>