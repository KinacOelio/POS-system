<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <?php require_once "queries.php"; ?>
	<title>info page </title>
	<link href="infopage.css" rel="stylesheet"> 
	<link href="global.css" rel="stylesheet"> 
	<script src="functions.js"></script>
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


<button class="tablink" onclick="openPage('listcust', this)">list customers</button>
<button class="tablink" onclick="openPage('listprod', this)" id="defaultOpen">list products</button>

<div id="listcust" class="tabcontent">
    <form action="infopage.php" target="_self" method="post">	
		<input type="submit" value="listMatchingCustomers" name="submit">
		<input type='text' name="text">		
	</form>
	
</div>

<div id="listprod" class="tabcontent">
    <form action="infopage.php" target="_self" method="post">	
		<input type="submit" value="listMatchingItems" name='submit'>
		<input type='text' name="text">
	</form> 
</div>

<?php 
	//greater if  tests to see if method=post
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		//inner if tests to see specific post choice
		if($_POST["submit"] == "listMatchingCustomers"){
			$array = getMatchingCustomers("/".$_POST["text"]."/m");
			for($i = 0; $i < sizeof($array); $i++){
				$name = $array[$i];
				echo "<p>".$name."</p>";
			}
		}else if($_POST["submit"] == "listMatchingItems"){
			$array = getMatchingProducts("/".$_POST["text"]."/m");
			for($i = 0; $i < sizeof($array); $i++){
				$name = $array[$i];
				echo "<p>".$name."</p>";
			}
		}
		
	}
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>