<?php
    require '../con.php';
    require 'header.php';
    $categories='';
    $msg='';
    if(isset($_GET['id']) && $_GET['id']!='')
        {
            $del_id=mysqli_real_escape_string($con,$_GET['id']);
            $categories=mysqli_real_escape_string($con,$_GET['name']);
        }
   if(isset($_POST['submit']))
    {  $name=mysqli_real_escape_string($con,$_POST['name']);
        $name=trim($name);
        $row=mysqli_query($con,"select * from categories where name='$name'");
        $check=mysqli_num_rows($row);
        if($check==0)
            {
            if(isset($del_id) && $del_id!='')
            {
            $update="update categories set name='$name' where id='$del_id'";
            mysqli_query($con,$update);
            }
            
            else
            {
                $insert="insert into categories(name,status) values ('$name',1)";
                mysqli_query($con,$insert);
            }
            header('location:admin.php');
            }
        else
        {
            $msg="Categories already exist!";
        }
    }   
?>
<form method="post" action="#">
    <div class="content pb-0">
        <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Categories</strong><small> Form</small></div>
                    <div class="card-body card-block">
                    <div class="form-group"><label for="company" class=" form-control-label">Category name</label><input type="text" id="company" placeholder="Enter category name" class="form-control" name='name' value="<?php echo $categories; ?>" required></div>
                    <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                    <span id="payment-button-amount">Submit</span>
                    </button>
                    <h6 class="text-danger mt-3 mb-2"><?php echo $msg; ?></h6>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</form>
<?php
    require 'footer.php';
?>