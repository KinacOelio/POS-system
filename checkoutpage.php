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
<h2>your total is 150 dollars</h2>
<h6>item</h6>

<?php
echo $_POST['productID9'];
echo 'tt';
$details = [];
$purchase = ["total" => 0, "CustomerID"=> 0, "Details" => $details];

//setting total and CID
$total = 0;
for($i=1;$i<=10;$i+=1){
	$total += $_POST['price'.$i];
}
$purchase['total'] = $total;
$purchase['CustomerID'] = $_POST['CID'];

//filling details
$detailLine = ["PurchaseLine"=>0, "ProductID" => 0, "Discount" => 0, "Quantity" => 0]; 
for($i = 1; $i < 10; $i++){
	$details[$i] = $detailLine;
	$details[$i]['PurchaseLine'] = $i;
	$details[$i]['ProductID'] = $_POST['productID'.$i];
	echo $_POST['productID'.$i];
	$details[$i]['Discount'] = $_POST['discount'.$i];
	$details[$i]['Quantity'] = $_POST['quantity'.$i];
}
$purchase['Details'] = $details;

addPurchase($purchase);



?>
<p>
<a href="salespage.php"><button>new sale</button></a>
</p>
</body>
</html>