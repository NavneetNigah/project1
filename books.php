<?php 
require('connection.php');
$Query = $dbc->query("SELECT * FROM books ");
session_start();
// $result = $conn->query($sql);
if(isset($_GET['book']))
{
    $id = $_GET['book'];
    
    $Query1 = $dbc->query("SELECT * FROM books WHERE bookID = '$id' ");
    if($Query1->num_rows > 0)
    {
      $row1 = $Query1->fetch_assoc();
      $_SESSION["id"] = $row1['bookID'];
      $_SESSION["name"] = $row1['bookName'];
      $_SESSION["price"] = $row1['price'];

      header("Location: checkout.php");
    }
    else
    {
      echo "Wrong Selection";
    }

}
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shop Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
   a {
    color: #000;
    text-decoration: none;
}
a:hover {
    color: #4CAF50;
    text-decoration: none;
}
.col-md-4.products {
    border: 1px solid;
    padding: 15px;
    text-align: center;
}
.text {
    height: 100px;
}
.buy a {
    box-shadow: 2px 2px 7px;
    padding: 11px 35px;
    border-radius: 50px;
    background-color: antiquewhite;
    font-size: 13px;
    font-weight: bold;
    text-decoration: none;
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
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="books.php">Shop</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Shop</h3>
<?php 
    if($Query->num_rows > 0)
    {
        while($row = $Query->fetch_assoc()) {
    ?>
<div class="col-md-4 products">
  <div><img src="images/<?php echo $row['img']; ?>" height="200px" width="200px"></div>
  <div><b><?php echo $row['bookName']; ?></b></div>
  <div>$<?php echo $row['price']; ?>.00</div>
  <div class="text"><?php echo $row['bookDesc']; ?></div>
  <div class="buy"><a href="?book=<?php echo $row['bookID']; ?>">BUY</a></div>
</div>
<?php 
}
}
?>
</div>

</body>
</html>
