<?php
require '../con.php';
$msg="";
if(isset($_POST['submit']))
{
  
  $user=mysqli_real_escape_string($con,$_POST['user']);
  $password=mysqli_real_escape_string($con,$_POST['password']);
  $sql = "SELECT * FROM admin where user='$user' && password='$password'";
  $result = mysqli_query($con,$sql);
  $count=mysqli_num_rows($result);
  if($count>0)
  {session_start();
    $_SESSION['admin_username']=$user;
    $_SESSION['admin_login']='yes';
    header("Location:admin.php");
    die();
  }
  else
  {
    $msg="Please Enter correct details!";
  }
}
?>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../pictures/favicon.png">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">
<head>
<form class="form-signin" method="post">
  <div class="text-center mb-4">
    <img class="mb-4" src="../pictures/favicon.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">ADMIN LOGIN</h1>
  </div>

  <div class="form-label-group">
    <input type="text" id="inputEmail" class="form-control"  name="user" placeholder="Username" required ="required">
    <label>User Name</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
  <h6 class="text-danger mt-2"><?php echo $msg?></h6>
</form>

