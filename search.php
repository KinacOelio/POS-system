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
	<table id='searchTable'>
			<tr>
				<th id='price'>name</th><th id='price'>Price</th>
			</tr>

<?php
session_start();
$id = 'productID'.$_POST['row'];
$qName = 'quantity'.$_POST['row'];
$dName = 'discount'.$_POST['row'];

$array = getMatchingProducts($_POST[$id]);
$_SESSION['quants'][$_POST['row']] = $_POST[$qName];
$_SESSION['discounts'][$_POST['row']] = $_POST[$dName];

foreach($array as $val){
	echo "<form method='post' action='salespage.php' target='_parent' id='items'>";
	echo "<tr><td id='itemButton'>";
	echo "<input type='submit' name='name'   value='".$val['Name']."' id='itemSubmit'>";
	echo '</td><td id="price">';
	echo '$'.$val['Price'];
	echo"</td></tr>";
	echo "<input               name='num' 	value=".$_POST['row']." id='hide'>";
	echo "<input               name='price' value=".$val['Price']." id='hide'>";
	echo "<input               name='id' value=".$val['ProductID']." id='hide'>";
	echo "</form>";
}

if(sizeof($array)==1){
?>
<script type="text/javascript">
    document.getElementById('itemSubmit').click();
</script>
<?php
}
?>
	</table>


<script src="functions.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>