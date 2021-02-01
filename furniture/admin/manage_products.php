<?php
    require '../con.php';
    require 'header.php';
    
    $msg='';
    $row='';
    $e_name='';
    $e_category_id='';
    $e_description='';
    $e_design='';
    $e_dimensions='';
    $e_mrp='';
    $e_sp='';
    $e_height='';
    $e_qty='';
    $e_short_desc='';
    $e_meta_desc='';
    $e_meta_tittle='';
    $e_meta_keyword='';
    $req_img='required';
    $e_id='';
    
    

    if(isset($_GET['id']) && $_GET['id']!='')
        {   $req_img='';
            $e_id=mysqli_real_escape_string($con,$_GET['id']);
            $result=mysqli_query($con,"select * from products where id='$e_id'");
            $row=mysqli_fetch_assoc($result);
            $e_name=$row['name'];
            $e_category_id=$row['category_id'];
            $e_description=$row['description'];
            $e_design=$row['design'];
            $e_dimensions=$row['dimensions'];
            $e_mrp=$row['mrp'];
            $e_sp=$row['sp'];
            $e_height=$row['height'];
            $e_qty=$row['qty'];
            $e_short_desc=$row['short_desc'];
            $e_meta_desc=$row['meta_desc'];
            $e_meta_tittle=$row['meta_tittle'];
            $e_meta_keyword=$row['meta_keyword'];
            
            
        }
   if(isset($_POST['submit']))
    {   $name=mysqli_real_escape_string($con,$_POST['name']);
        $category_id=mysqli_real_escape_string($con,$_POST['category_id']);
        $description=mysqli_real_escape_string($con,$_POST['description']);
        $design=mysqli_real_escape_string($con,$_POST['design']);
        $dimensions=mysqli_real_escape_string($con,$_POST['dimensions']);
        $mrp=mysqli_real_escape_string($con,$_POST['mrp']);
        $sp=mysqli_real_escape_string($con,$_POST['sp']);
        $height=mysqli_real_escape_string($con,$_POST['height']);
        $qty=mysqli_real_escape_string($con,$_POST['qty']);
        $short_desc=mysqli_real_escape_string($con,$_POST['short_desc']);
        $meta_desc=mysqli_real_escape_string($con,$_POST['meta_desc']);
        $meta_tittle=mysqli_real_escape_string($con,$_POST['meta_tittle']);
        $meta_keyword=mysqli_real_escape_string($con,$_POST['meta_keyword']);
        
       
        $imagename=$_FILES['filename']['name'];
        $tempname=$_FILES['filename']['tmp_name'];

        $design=trim($design);
        $row=mysqli_query($con,"select * from products where design='$design'");
        $erow=mysqli_fetch_assoc($row);
        $check=mysqli_num_rows($row);
        if($check==0)
            {
            if(isset($e_id) && $e_id!='')
            {
            $update="update products set name='$name' , category_id='$category_id', design='$design', mrp='$mrp', sp='$sp', qty='$qty',img= '$imagename', 
            dimensions='$dimensions', description='$description', short_desc='$short_desc', height='$height',meta_tittle= '$meta_tittle',meta_desc= '$meta_desc',meta_keyword= '$meta_keyword'
               where id='$e_id'";
            mysqli_query($con,$update);
            move_uploaded_file($tempname,"../pictures/products/$imagename");
            echo '<script>alert("Upload Success!")</script>';
            }
            
            else
            {
                $insert="INSERT INTO products ( name, category_id, design, mrp, sp, qty,img, 
                dimensions, description, short_desc, height, meta_tittle, meta_desc, meta_keyword,
                 status) VALUES ('$name', '$category_id', '$design', '$mrp', '$sp', '$qty', '$imagename', 
                '$dimensions', '$description', '$short_desc', '$height', '$meta_tittle', '$meta_desc', '$meta_keyword'
                 , 1)";
                mysqli_query($con,$insert);
                move_uploaded_file($tempname,"../pictures/products/$imagename");
                echo '<script>alert("Upload Success!")</script>';
            }
            header('location:product_master.php');
            }
        elseif($erow['id']==$e_id){
            $update="update products set name='$name' , category_id='$category_id', design='$design', mrp='$mrp', sp='$sp', qty='$qty',img= '$imagename', 
            dimensions='$dimensions', description='$description', short_desc='$short_desc', height='$height',meta_tittle= '$meta_tittle',meta_desc= '$meta_desc',meta_keyword= '$meta_keyword'
               where id='$e_id'";
            mysqli_query($con,$update);
            move_uploaded_file($tempname,"../pictures/products/$imagename");
            echo '<script>alert("Upload Success!")</script>';
            header('location:product_master.php');
            }
            else{
            $msg="Product design already exist!";
            }
    }   
?>
<form method="post" action="#" enctype="multipart/form-data">
    <div class="content pb-0">
        <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Products</strong><small> Form</small></div>
                    <div class="card-body card-block">
                    <div class="form-group"><label  class=" form-control-label"></label><input type="file"  name="filename"  <?php echo $req_img;?>>
                    <div class="form-group"><label class=" form-control-label">Product name</label><input type="text"  placeholder="Enter Product name" class="form-control" name='name' value="<?php echo $e_name; ?>" required></div>
                    
							   <div class="form-group">
									<label for="categories" class=" form-control-label">Categories</label>
									<select class="form-control" name="category_id">
										<option>Select Category</option>
										<?php
										$res1=mysqli_query($con,"select id,name from categories order by name asc");
										while($row1=mysqli_fetch_assoc($res1)){
											if($row1['id']==$e_category_id){
												echo "<option selected value=".$row1['id'].">".$row1['name']."</option>";
											}else{
												echo "<option value=".$row1['id'].">".$row1['name']."</option>";
											}
											
										}
										?>
									</select>
								</div>
                    <div class="form-group"><label class=" form-control-label">Design no</label><input type="text"  placeholder="Enter Design no" class="form-control" name='design' value="<?php echo $e_design; ?>" required></div>
                    <div class="form-group"><label class=" form-control-label">M.R.P.</label><input type="text"  placeholder="Enter M.R.P." class="form-control" name='mrp' value="<?php echo $e_mrp; ?>" required></div>
                    <div class="form-group"><label class=" form-control-label">Selling Price</label><input type="text"  placeholder="Enter Selling Price" class="form-control" name='sp' value="<?php echo $e_sp; ?>" required></div>
                    <div class="form-group"><label class=" form-control-label">Qty</label><input type="text"  placeholder="Enter Qty" class="form-control" name='qty' value="<?php echo $e_qty; ?>" required></div>
                    <div class="form-group"><label class=" form-control-label">Dimension</label><input type="text"  placeholder="Enter dimension" class="form-control" name='dimensions' value="<?php echo $e_dimensions; ?>" required></div>
                    <div class="form-group"><label class=" form-control-label">Short Description</label><input type="text"  placeholder="Enter Short Description" class="form-control" name='short_desc' value="<?php echo $e_short_desc; ?>" required></div>
                    <div class="form-group"><label class=" form-control-label">Description</label><input type="text"  placeholder="Enter description" class="form-control" name='description' value="<?php echo $e_description; ?>" required></div>
                    <div class="form-group"><label class=" form-control-label">Height</label><input type="text"  placeholder="Enter height" class="form-control" name='height' value="<?php echo $e_height; ?>" required></div>
                    
                    <div class="form-group"><label class=" form-control-label">Meta tittle</label><input type="text"  placeholder="Enter meta tittle" class="form-control" name='meta_tittle' value="<?php echo $e_meta_tittle; ?>"></div>
                    <div class="form-group"><label class=" form-control-label">Meta Description</label><input type="text"  placeholder="Enter meta description" class="form-control" name='meta_desc' value="<?php echo $e_meta_desc; ?>" ></div>
                    <div class="form-group"><label class=" form-control-label">Meta keyword</label><input type="text"  placeholder="Enter meta keyword" class="form-control" name='meta_keyword' value="<?php echo $e_meta_keyword; ?>" ></div>
                    
                    
                     <button type="submit" name="submit" class="btn btn-lg btn-info btn-block">
                    Submit
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