<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thank You Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
  <div class="col-md-6 col-md-offset-3">
  <h4><?php echo $_SESSION['cname']; ?>,Your order has been placed.</h4>
  <h5><a href="index.php">Shop More</a></h5>
  <img src="images/thnks.png">
  </div>
</div>

</body>
</html>
