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
for($i=1;$i<=10;$i+=1){
echo  $_POST["productID".$i];

$detailLine = ["PurchaseLine"=>0,"ProductID" => 0, "Discount" => 0, "Quantity" => 0]; 
$details = [];
for($i = 0; $i < 5; $i++){
	$details[$i] = $detailLine;
	$details[$i]['PurchaseLine'] = $i;
	$details[$i]['ProductID'] = 2;
	$details[$i]['Discount'] = 0;
	$details[$i]['Quantity'] = 1;
}


$purchase = ["total" => 20, "CustomerID"=> 1, "Details" => $details];

addPurchase($purchase);


}
?>
<p>
<a href="salespage.php"><button>new sale</button></a>
</p>
</body>
</html>