<?php
require 'header.php';
include 'con.php';
    if(isset($_SESSION['id']) && $_SESSION['id']!='' && $_SESSION['login']='yes')
    {}
    else
    {
        header('location:index.php');
    }
?>
<?php
$msg='';
    if(isset($_SESSION['id']) && $_SESSION['id']!='')
        {   $req_img='';
            $id=mysqli_real_escape_string($con,$_SESSION['id']);
            $eresult=mysqli_query($con,"select * from user_profiles where id='$id'");
            $erow=mysqli_fetch_assoc($eresult);
            $e_name=$erow['name'];
            $e_email=$erow['email'];
            $e_address=$erow['address'];
            $e_dob=$erow['dob'];
        }
   if(isset($_POST['submit']))
    {   $name=mysqli_real_escape_string($con,$_POST['name']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $address=mysqli_real_escape_string($con,$_POST['address']);
        $dob=mysqli_real_escape_string($con,$_POST['dob']);
        $imagename=$_FILES['filename']['name'];
        $tempname=$_FILES['filename']['tmp_name'];
        $email=trim($email);
        $result=mysqli_query($con,"select * from user_profiles where email='$email'");
        $check=mysqli_num_rows($result);
        if($check==0)
        {
            $update="insert user_profiles set name='$name' , email='$email', address='$address',dob='$dob' ,img='$imagename' where id='$id'";
            mysqli_query($con,$update);
            move_uploaded_file($tempname,"pictures/profiles/$imagename");
            $msg="Success!";
        }
        elseif($email==$e_email){
            $update="update user_profiles set name='$name' , email='$email', address='$address',dob='$dob' , img='$imagename' where id='$id'";
            mysqli_query($con,$update);
            move_uploaded_file($tempname,"pictures/profiles/$imagename");
            $msg="Success!";
            }
    }   
?>
<div class="container">
<form method="post" action="#" enctype="multipart/form-data">
    <div class="content pb-0">
        <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Profile</strong></div>
                    <div class="card-body card-block">
                    <div class="form-group"><label  class=" form-control-label">Profile picture:</label>&nbsp;&nbsp;&nbsp;&nbsp;<input type="file"  name="filename"  <?php echo $req_img;?>>
                    <div class="form-group"><label class=" form-control-label">Name</label><input type="text"  placeholder="Enter name" class="form-control" name='name' value="<?php echo $e_name; ?>" required></div>
                    <div class="form-group"><label class=" form-control-label">Email</label><input type="text"  placeholder="Enter Email" class="form-control" name='email' value="<?php echo $e_email; ?>" required></div>
                    <div class="form-group"><label class=" form-control-label">address</label><input type="text"  placeholder="Enter address" class="form-control" name='address' value="<?php echo $e_address; ?>" ></div>
                    <div class="form-group"><label class=" form-control-label"> Date of Birth</label><input type="date"  placeholder="Enter Date of Birth" class="form-control" name='dob' value="<?php echo $e_dob; ?>" ></div> 
                     <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                    <span id="payment-button-amount">Submit</span>
                    </button>
                    <h6 class="text-success mt-3 mb-2"><?php echo $msg; ?></h6>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>
</div>
</div>
</div>
<?php
require 'footer.php';
?>