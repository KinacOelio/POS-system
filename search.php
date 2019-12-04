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
	<table>
			<tr>
				<th>name</th><th>Price</th>
			</tr>
	
<form method='post' action='salespage.php' target='_parent' id='items'>

<?php
$id = 'productID'.$_POST['row'];
$array = getMatchingProducts($_POST[$id]);
echo $_POST[$id];

foreach($array as $val){
	echo "<tr><td>";
	echo "<input type='submit' value='".$val['Name']."' name=".$_POST['row']." id='item'>";
	echo "<input name='num' value=".$_POST['row']." style='visibility:hidden;'>";
	echo "<input name='price' value=".$val['Price']." id='test'>";
	echo '</td><td>';
	echo '$'.$val['Price'];
	echo"</td></tr>";
	echo"</td></tr>";
}

if(sizeof($array)==1){
?>
<script type="text/javascript">
    document.getElementById('item').click();
</script>
<?php
}
?>
</form>

<script src="functions.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>