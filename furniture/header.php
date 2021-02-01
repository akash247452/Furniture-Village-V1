<?php
require 'con.php';
  $result=mysqli_query($con,"select * from categories where status=1");
?>
<!DOCTYPE html>
<head>
  <title>Furniture Village</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="pictures/favicon.png">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<script src="css/jquery.min.js"></script>
  <script src="css/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<main role="main">
  <nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <a href="index.php"><img class="my-0 mr-md-auto" src="pictures/icon.png" width="200" height="45"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link " href="index.php"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
        </li>
<?php
while($row=mysqli_fetch_assoc($result))
{
?>
  <li>
    <a class="nav-link" href="products.php?category_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a>
  </li>
<?php
}
?>
        <li>
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
    <?php
    session_start();
    if(!isset($_SESSION['login'])){
      echo "<li><a class='nav-link text-dark btn border-dark' href='register.php'>LOGIN/REGISTER</a></li>";

    }?>
    
      </ul>
      <?
        if(isset($_SESSION['id']) && $_SESSION['id']!='' &&  $_SESSION['login']='yes'){
          ?>
          
          <div class="dropdown">
              <button class="btn btn-white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user" aria-hidden="true"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="cart.php">Cart</a>
                <a class="dropdown-item" href="#">Orders</a>
                <a class="dropdown-item" href="#"></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">LOGOUT</a>
              </div>
          </div>

       <?php }
      ?>
    </div>
  </nav>  
</main>