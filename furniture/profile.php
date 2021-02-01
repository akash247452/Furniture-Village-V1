<?php
  require 'header.php';
  require 'con.php'; 
  if(isset($_SESSION['id']) && $_SESSION['id']!='' && $_SESSION['login']='yes')
  {}
  else
  {
      header('location:index.php');
  }
  $id=$_SESSION['id'];

  $sql="select * from user_profiles where id='$id'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
?>

<div class="row text-center d-flex justify-content-center">
    <div class="col-sm-12 col-md-6 border p-4 m-3 rounded center">
        <img src="pictures/profiles/<?php echo $row['img']; ?>" width="140" height="140" background="#777" color="#777" class="rounded-circle">
        <h2><?php echo $row['name']; ?></h2>
        <h4>Email:<?php echo $row['email']; ?></h4>
        <h4>D.O.B:<?php echo $row['dob']; ?></h4>
       <h4> Address:<?php echo $row['address']; ?></h4>
       <a href="profile_edit.php" class="btn btn-primary">Update profile</a>
    </div>
</div>
  <?php
require 'footer.php';
?>