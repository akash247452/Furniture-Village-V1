<?php 
    require 'header.php';
    require 'con.php';
    $msg="";
if(isset($_POST['submit']))
{
  
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $password=mysqli_real_escape_string($con,$_POST['password']);
  $sql = "SELECT * FROM user_profiles where email='$email' AND password='$password' and status =1";
  $result =mysqli_query($con,$sql);
  $row5=mysqli_fetch_assoc($result);
  $count=mysqli_num_rows($result);
  if($count>0)
  {session_start();
    $_SESSION['id']=$row5['id'];
    $_SESSION['login']='yes';
    header("Location:index.php");
    die();
  }
  else
  {
    $msg="Please Enter correct details!";
  }
}
?>
<head>
<style> 
.container-fluid{
  background-image: url('pictures/login.jpg');
  height: 200;
  width: 100%;
}
input.transparent-input{
       background-color:rgba(0,0,0,0) !important;
       border-style: rounded;
  		border-width: 2px;
      border-block-color: black;
    }
</style>
<link rel="stylesheet" type="text/css" href="">
</head>
<div class="container-fluid">
  <br>
  <br>
  <br>
<form class="form-signin col-sm-12 col-md-6 col-lg-5" method="post">
<div class="mb-3  text-center">
    <h2 class=" mb-3 display-5 text-dark">Login</h2>
</div>
  <div class="form-label-group">
    <input type="email" id="inputEmail" class="form-control transparent-input"  name="email" placeholder="Email" required ="required">
    <label>Email</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" class="form-control transparent-input" name="password" placeholder="Password" required>
    <label for="inputPassword">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-secondary btn-block" name="submit" type="submit">Sign in</button>
  <h6 class="text-danger mt-2"><?php echo $msg?></h6>
</form>
<br>
<br>
<br>
</div>

<?php 
    require 'footer.php';
?>