<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">  
	<link href="global.css" rel="stylesheet"> 
	<link href="Sales Page Style.css" rel="stylesheet"> 
	<?php require_once "queries.php"; ?>
	
    <title>Sales</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="salespage.php">sales page</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="infopage.php">info page</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="adminpage.php">admin page</a>
      </li>
    </ul>
  </div>
</nav>

<form action="salespage.php" target="_parent" method="post" onsubmit="searchPanel()">
	customer ID<br>
	<input type='text' name='CID' value = 0>
	<table border=1>
		<tr>
		<th>Item</th><th>Quantity</th><th>Price</th><th>Discount</th>
			<?php
			//creating the table
			for($i=1;$i<=10;$i+=1){
			echo "<tr>";
			if($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['productID1']!='' && $i==1){
				$result = getMatchingProducts($_POST['productID1']);
				echo "<td><input type='text' name='productID".$i."' value='$result[0]'></td>";
			}
			else{
				echo "<td><input type='text' name='productID".$i."'></td>";
			}
			echo "<td><input type='text' name='quantity".$i."'></td>";
			echo "<td><input type='text' name='price".$i."'></td>";
			echo "<td><input type='text' name='discount".$i."'></td>";
			echo "</tr>";
			}
			?>
		</tr>
	</table>
	<input type="submit" style="visibility:hidden;">
</form>
	
<form action="checkoutpage.php" target="_parent" method="post">
	<input type="submit">
</form>

<?php 

?>
<script src="functions.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>