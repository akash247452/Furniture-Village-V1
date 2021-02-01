<?php 
require 'header.php';
?>
<?php
require 'con.php';
$email_error='';
$password_error='';
$cpassword_error='';
$succes_msg='';
if(isset($_POST['submit']))
{
	if(isset($_POST['submit']))
	$name=mysqli_real_escape_string($con,$_POST['name']); 
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$password= mysqli_real_escape_string($con,$_POST['password']); 
	$cpassword= mysqli_real_escape_string($con,$_POST['cpassword']); 
	$password_error='';
    $uppercase = preg_match('@[A-Z]@', $password);
	$lowercase = preg_match('@[a-z]@', $password);
	$number = preg_match('@[0-9]@', $password);
	$specialChars = preg_match('@[^\w]@',$password);
	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
	{
		if(!$uppercase ){ $password_error='Include at least one Uppercase.'.$password_error;}
		if( !$lowercase ){$password_error='Include at least one lowerercase.<br>'.$password_error;}
		if(!$number ){$password_error='Include at least one numbers.<br>'.$password_error;}
		if(!$specialChars ){$password_error='Include at least one Special characters.<br>'.$password_error;}
		if(strlen($password) < 8){ $password_error= 'Password should be at least 8 characters in length.<br>';}
	}
	elseif($password==$cpassword)
	{
		$result = mysqli_query($con,"SELECT * FROM user_profiles WHERE email='$email'");
		$data = mysqli_num_rows($result);
		if($data==0)
		{   $insert="INSERT INTO user_profiles (name,email,password) VALUES('$name','$email','$password')";
			$query = mysqli_query($con,$insert); 
			if($query)
			{
				$succes_msg="You are registered successfully.";
			}
			else
			{
				$succes_msg="Error!";
			}
		}
		else
		{ 
			$email_error="You are already registered";

		}
	}
	else
	{
		$cpassword_error="Oops! Password did not match! Try again.";
		
	}
}
?>
<!DOCTYPE html>
<head>
<style>
    input.transparent-input{
       background-color:rgba(0,0,0,0) !important;
       border-style: rounded;
  		border-width: 2px;
    }

.container-fluid {
  background-image: url('pictures/register.jpg');
}

</style>
</head>

<body>
<div class="container-fluid">
<div class="main">
	<br>
	<br>
<form method="post">
<div class="col-6 text-center">
    <h2 class="mt-3 mb-3 display-5 text-dark">Register</h2>
</div>
<div class="form-group">
<label>Name :</label>
<input type="text" class="form-control col-md-6 transparent-input" name="name" id="name" required >
</div>
<div class="form-group">
<label>Email :</label>
<input type="email" class="form-control col-md-6 transparent-input" name="email" id="email" required>
<span class="field_error text-danger" id="email_error"><?php echo $email_error; ?></span>
</div>
<div class="form-group">
<label>Password :</label>
<input type="password" class="form-control col-md-6 transparent-input" name="password" id="password" required>
<span class="field_error text-danger" id="password_error"><?php echo $password_error; ?></span>
<small class="text-dark">Password should be at least 8 characters in length and should include at least one <br>upper case letter, one number, and one special character.</small>

</div>

<div class="form-group">
<label>Confirm Password :</label>
<input type="password" class="form-control col-md-6 transparent-input" name="cpassword" id="cpassword" required>
<span class="field_error text-danger" id="cpassword_error"><?php echo $cpassword_error; ?></span>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary" name="submit">Register</button>
<a href="login.php" class="btn border-dark">I am already a member</a>

</div>
<div class="form-output register_msg">
	<p class="field error text-success"><?php echo $succes_msg; ?></p>
</div>
</form>
</div>
<br>
<br>
<br>

</div>
</body>
</html>

<?php 
require ('footer.php');
?>        