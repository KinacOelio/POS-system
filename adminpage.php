<!DOCTYPE html>
<html>
<head>
	 <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>admin page</title>
	<!-- Latest compiled and minified CSS -->
	<?php require_once "queries.php"; ?>
	<link href="global.css" rel="stylesheet"> 
	<link href="admin page style.css" rel="stylesheet"> 
	<script src="functions.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	
	<style>
	/* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 700px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
	</style>
	</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
	  <li class="nav-item">
        <a class="nav-link" href="index.php">home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="salespage.php">sales page</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="infopage.php">info page</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link active" href="adminpage.php">admin page</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container-fluid text-left">
<div class="row content">
<div class ="col-md-2 sidenav">
<button class="tablink" style= "width:60%" onclick="openPage('addProduct', this)">add product</button> <br/><br /> <br/><br/>
<button class="tablink" style= "width:60%" onclick="openPage('addCustomer', this)" id="defaultOpen">add Customer</button> <br/><br /> <br/><br/>
<button class="tablink" style= "width:60%" onclick="openPage('restock', this)">restock</button>

</div>
<div class ="col-md-2">
</div>
<div class = "col-md- text-left">

<div id="addProduct" class="tabcontent">
	<h2 align="">Add Product</h2> <br />
    <form action="adminpage.php" target="_self" method="post">	
		<label>Name</label>
		<input type='text' name="itemName" class="form-control">
		<br>
		<label>Price</label>
		<input type='text' name="itemPrice" class="form-control">
		<br>
		<label>Category ID</label>
		<input type='text' name="categoryID" class="form-control">
		<br>
		<input type="submit" value="addProduct" name="submit" class="btn btn-info">
	</form>
	
</div>

<div id="addCustomer" class="tabcontent">
	<h2 align="">Add Customer</h2> <br />
     <form action="adminpage.php" target="_self" method="post">	
		<label>Name</label>
		<input type='text' name="customerName" class="form-control">
		<br>
		<input type="submit" value="addCustomer" name="submit" class="btn btn-info">
	</form> 
</div>

<div id="restock" class="tabcontent">
	<h2 align="">Restock</h2> <br />
      <form action="adminpage.php" target="_self" method="post">	
		<label>Item ID</label>
		<input type='text' name="itemID" class="form-control">
		<br>
		<label>Amount</label>
		<input type='text' name="itemQuant" class="form-control">
		<br>
		<input type="submit" value="restock" name="submit" class="btn btn-info">
	</form>
</div>


<?php 
	//greater if  tests to see if method=post
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		//inner if tests to see specific post choice
		if($_POST["submit"] == "addProduct"){
			if(empty($_POST['itemName']) || empty($_POST['itemPrice']) || empty($_POST['categoryID'])){
			}
			else{
				addProduct($_POST['itemName'], $_POST['itemPrice'], $_POST['categoryID']);
			}
		}else if($_POST["submit"] == "addCustomer"){
			addCustomer($_POST['customerName']);
		}else if($_POST["submit"] == "restock"){
			restock($_POST['itemID'], $_POST['itemQuant']);
		}
	}
?>
</div>
</div>
</div>
</div>
<footer class="container-fluid text-center">
  <p>By Nathan Brackenbury and August Ford</p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>