<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">  
	<link href="Sales Page Style.css" rel="stylesheet"> 
	<?php require_once "queries.php"; ?>
    <title>Sales</title>
</head>

<body>

<h1>Purchase</h1>

	<table border=1>
<tr>
  <th>Item</th><th>Quantity</th><th>Price</th><th>Discount</th>
<?php
getProducts("test");
echo genericFunction();
for($i=50;$i<=1000;$i+=50){
   echo "<tr>";
   echo " <td><input type='text'></td>";
   // replace the ??? with the calls to convertUnits function
   echo "<td>???</td>";
   echo "<td>???</td>";
   echo "<td>???</td>";
   echo "</tr>";
}
?>
</tr>
</table>



</body>

</html>