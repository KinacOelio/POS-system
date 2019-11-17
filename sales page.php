<?php
//instantiating the PDO 

define('DBHOST', 'localhost');
define('DBNAME', 'POS');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBCONNSTRING','mysql:host='.DBHOST.'; mysql:dbname='.DBNAME.'; charset=utf8mb4;');
$pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function createCategory(){
  //  global $pdo;
	//$sqlAllCars = "SELECT * FROM cars";
	//$result = $pdo = query("SELECT * FROM kiattome_cars.cars");
	//while($row = $result = fetch()){
	//	if($modelType == $row['type']){
			echo 'test';
	//	}
	//}
}
?>
</script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">  
    <title>Sales</title>
</head>

<body>
<?php echo("test"); ?>
</body>

</html>1