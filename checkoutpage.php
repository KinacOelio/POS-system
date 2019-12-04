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
	$total = $total + $_SESSION['prices'][$i];
}
$purchase['total'] = $total;
$purchase['CustomerID'] = 1;

//filling details
$detailLine = ["PurchaseLine"=>0, "ProductID" => 0, "Discount" => 0, "Quantity" => 0]; 
for($i = 1; $i < 10; $i++){
	$details[$i] = $detailLine;
	$details[$i]['PurchaseLine'] = $i;
	$details[$i]['ProductID'] = $_SESSION['items'][$i];
	$details[$i]['Discount'] = 0;
	$details[$i]['Quantity'] = $_SESSION['quants'][$i];
}
$purchase['Details'] = $details;

addPurchase($purchase);
	$_SESSION['items'] = ['','','','','','','','','','','','','',''];
	$_SESSION['prices'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	$_SESSION['quants'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];


?>
<h2>your total is <?php echo $total ?> dollars</h2>
<p>
<a href="salespage.php"><button>new sale</button></a>
</p>
</body>
</html>