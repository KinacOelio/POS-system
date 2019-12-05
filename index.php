<!DOCTYPE html>
<?php
	session_start();
	$_SESSION['items'] = ['','','','','','','','','','','','','',''];
	$_SESSION['prices'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	$_SESSION['quants'] = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
	
	define('DBHOST', 'localhost');
	define('DBNAME', 'users');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBCONNSTRING','mysql:host='.DBHOST.'; mysql:dbname='.DBNAME.'; charset=utf8mb4;');
	$message ="";
	$name = "";
	$privilege = "";
	$stmt = "";
	
	try{
		$pdo = new PDO(DBCONNSTRING,DBUSER,DBPASS);
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(isset($_POST["login"])){
			if(empty($_POST["number"]) || empty($_POST["password"])){
				$message = '<div class="alert alert-danger" role="alert"> You must fill in all boxes </div>';
			} else {
				$query = "SELECT * FROM users.employees WHERE id = :number AND password = :password;";
				$stmt = $pdo->prepare($query);
				$stmt->execute(array('number' => $_POST["number"],'password' => $_POST["password"]));
				while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
					$name = $result["fname"];
					print $name;
					$privilege = $result["privilege"];
					print $privilege;
				}
				$c = $stmt->rowCount();
				if($c > 0){
					
					$_SESSION["id"] = $_POST["number"];
					$_SESSION["name"] = $name;
					$_SESSION["privilege"] = $privilege;
					header("location:salespage.php");
				}
			}
		}
	}catch(PDOException $e){
		$message = $e->getMessage();
	}
	
?>
<html lang="en">
<head>
    <meta charset="utf-8">  
	<link href="global.css" rel="stylesheet"> 
	<link href="Sales Page Style.css" rel="stylesheet"> 
	<?php// require_once "queries.php"; ?>
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
	<br />
	<?php echo $message; ?>
	<div class="container">
	<div class= "row content">
	<div class = "col-sm-3">
	</div>
	<div class = "col-sm-6 text-left">
	<h2 align = "">Welcome</h2><br />
	<form method="post">
	
		<label>Employee Number</label>
		<input type="text" name = "number" class="form-control">
		<br />
		
		<label>Password</label>
		<input type="text" name = "password" class="form-control">
		<br />
		<input type="submit" name ="login" class="btn btn-info" value="login">
	</form>
	</div>
	<div class = "col-sm-3">
	</div>
	</div>




<script src="functions.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>