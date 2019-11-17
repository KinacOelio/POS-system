<?php
//instantiating the PDO 

define('DBHOST', 'localhost');
define('DBNAME', 'POS');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBCONNSTRING','mysql:host='.DBHOST.'; mysql:dbname='.DBNAME.'; charset=utf8mb4;');
$pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function genericFunction(){

}
?>
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">  
	<link href="Sales Page Style.css" rel="stylesheet"> 
    <title>Sales</title>
</head>

<body>
	<table border=1>
<tr>
  <th>Item</th><th>Quantity</th><th>Price</th><th>Discount</th>
<?php
for($i=50;$i<=1000;$i+=50){
   echo "<tr>";
   echo "<td>$i</td>";
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

</html>1