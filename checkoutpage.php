<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <?php require_once "queries.php"; ?>
	<title>checkout page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
</head>
<body>


<?php
session_start();
$details = [];
$purchase = ["total" => 0, "CustomerID"=> 0, "Details" => $details];

//setting total and CID
$total = 0;
for($i=1;$i<=10;$i+=1){
	if($_SESSION['prices'][$i] != ''){
		$total = $total + ($_SESSION['prices'][$i]*$_SESSION['quants'][$i]*(1 - ($_SESSION['discounts'][$i]*.01)));
	}
}
$purchase['total'] = $total;
$purchase['CustomerID'] = 1;

//filling details
$detailLine = ["PurchaseLine"=>0, "ProductID" => 0, "Discount" => 0, "Quantity" => 0]; 
for($i = 1; $i < 10; $i++){
	$details[$i] = $detailLine;
	$id = $_SESSION['IDs'][$i];
	$quantity = $_SESSION['quants'][$i];

	$details[$i]['PurchaseLine'] = $i;
	$details[$i]['ProductID'] = $id;
	$details[$i]['Discount'] = $_SESSION['discounts'][$i];
	$details[$i]['Quantity'] = $quantity;
	echo $quantity;

	sellStock($id, $quantity);
}
$purchase['Details'] = $details;

	addPurchase($purchase);
	$_SESSION['items'] = ['','','','','','','','','','','','','',''];
	$_SESSION['IDs'] = ['','','','','','','','','','','','','',''];
	$_SESSION['prices'] = ['','','','','','','','','','','','','',''];
	$_SESSION['quants'] = ['','','','','','','','','','','','','',''];
	$_SESSION['discounts'] = ['','','','','','','','','','','','','',''];
?>
<h2>your total is <?php echo $total ?> dollars</h2>
<p>
<a href="salespage.php"><button>new sale</button></a>
</p>
</body>
</html>