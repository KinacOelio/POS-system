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
	<style>
	/* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 425px}
    
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
<div class="container-fluid text-left">
	<div class="row content">
	<div class ="col-md-2 sidenav">
	</div>
	<div class ="col-8">
	<table border=1 id='salesTable'>
		<tr>
		<th>Item</th><th>Quantity</th><th>Price</th><th>Discount</th>
		</tr>
			<?php
			session_start();
			//filles the cookie arrays
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				$_SESSION['items'][$_POST['num']] = $_POST['name'];
				$_SESSION['IDs'][$_POST['num']] = $_POST['id'];
				
				$_SESSION['prices'][$_POST['num']] = $_POST['price'];
				if($_SESSION['quants'][$_POST['num']] == ''){
					$_SESSION['quants'][$_POST['num']] = 1;
				}
				if($_SESSION['discounts'][$_POST['num']] == ''){
					$_SESSION['discounts'][$_POST['num']] = 0;
				}
			}
			//creating the table
			for($i=1;$i<=10;$i+=1){
			echo '<form method="post" action="search.php" target="search.php" onsubmit="searchPanel()">';
			echo "<input type='submit' name='row' value=$i id='hide'>";
			echo "<tr>";
			echo "<td><input type='text' name='productID".$i."' value='".$_SESSION['items'][$i]."'></td>";
			echo "<td><input type='text' name='quantity".$i."' value='".$_SESSION['quants'][$i]."'></td>";
			echo "<td>".$_SESSION['prices'][$i]."</td>";
			echo "<td><input type='text' name='discount".$i."' value='".$_SESSION['discounts'][$i]."'></td>";
			echo "</tr>";
			echo '</form>';
			}
			?>
	</table>

	
<form action="checkoutpage.php" target="_parent" method="post">
	<input type="submit" >
</form>
	</div>
	<div class ="col-md-2 sidenav">
	</div>
</div>
<footer class="container-fluid text-center">
  <p>By Nathan Brackenbury and August Ford</p>
</footer>

<script src="functions.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>