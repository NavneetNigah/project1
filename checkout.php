<?php 
require('connection.php');
$Query = $dbc->query("SELECT * FROM books ");
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name']))
{
	$id = $_SESSION['id'];
	$bname = $_SESSION['name'];
	$price = $_SESSION['price'];
	$error = array();
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
		$lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
		$address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$payment = filter_var($_POST['payment'], FILTER_SANITIZE_STRING);

		if(empty($fname) || strlen($fname) < 1)
		{
			array_push($error,"Please fill First Name");
		}
		if(empty($lname) || strlen($lname) < 1)
		{
			array_push($error,"Please fill Last Name");
		}
		if(empty($address) || strlen($address) < 1)
		{
			array_push($error,"Please fill Address");
		}
		if(empty($payment) || strlen($payment) < 1)
		{
			array_push($error,"Please Select payment");
		}

		if(empty($error))
		{
			$cinfo = "INSERT INTO orders SET total='$price',FirstName='$fname',LastName='$lname',address='$address',Payment='$payment',bookID='$id' ";
			$ordr = mysqli_query($dbc,$cinfo);

			$query1 = mysqli_query($dbc, "SELECT * FROM inventory WHERE bookID = '$id' ");
	 		$details = mysqli_fetch_array($query1);
	 		$qnty = $details['quantity'];

	 		$nQty = $qnty -1;
	 		$upQnty = mysqli_query($dbc, "UPDATE inventory SET quantity='$nQty' WHERE bookID = '$id' ");

	 		if($ordr && $upQnty)
	 		{
	 			$_SESSION['cname'] = $fname;
	 			header("Location: thanks.php");
	 		}
	 		else
	 		{
	 			echo "error";
	 		}

		}
		else
		{
			foreach ($error as $error) {
				echo "<b>".$error."</b><br>";
			}
			//print_r($error);
		}
	}

}
else
{
	 header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
	div#bookInfo {
    width: 80%;
    margin: auto;
    box-shadow: 2px 2px 7px;
    padding: 10px;
    margin-bottom: 16px;
    font-size: 14px;
    font-weight: bold;
}
</style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">BookStore</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="books.php">Shop</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div id="bookInfo">
  	<span>Product Name : </span> <?php echo $_SESSION['name']; ?><br>
  	<span>Product Price : $</span><?php echo $_SESSION['price']; ?><br>
  </div>
  
<div class="col-md-8 col-md-offset-2">
	<form action="" method="POST">
    <div class="form-group">
      <label for="First Name">First Name:</label>
      <input type="text" class="form-control" id="FirstName" placeholder="Enter First Name" name="fname">
    </div>
    <div class="form-group">
      <label for="lname">Last Name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname">
    </div>
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
    </div>
    <div class="form-group">
	  <label for="payment">Payment:</label>
	  <select class="form-control" id="payment" name="payment">
	    <option value="credit">Credit</option>
	    <option value="debit">Debit</option>
	    <option value="cod">Cash On Devlivery</option>
	  </select>
	</div>
    
    <button type="submit" class="btn btn-default btn-block btn-success">Order</button>
  </form>
</div>

</div>

</body>
</html>
