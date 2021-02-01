<?php
require 'header.php';
require 'con.php';
$added='';
$product_id=mysqli_real_escape_string($con,$_GET['product_id']);
$result=mysqli_query($con,"select * from products where id='$product_id'");
if(isset($_POST['add_to_cart'])  && isset($_SESSION['id']))
{   
    $qty=mysqli_real_escape_string($con,$_POST['qty']);
    $user_id=$_SESSION['id'];
    $cart=mysqli_query($con,"SELECT * FROM cart WHERE user_id='$user_id' and product_id='$product_id'");
    $cart1=mysqli_num_rows($cart);
    if($cart1==0)
    {
    mysqli_query($con,"insert into cart (user_id,product_id,qty) values ('$user_id','$product_id','$qty')");
    $added='Added!';
    }
    else
    {
        $added='Already Added!'; 
    }
}
$row=mysqli_fetch_assoc($result);
?>
<div class="container">
<div class="card ">
    <div class="row">
        <div class="col-lg-5 col-sm-12 col-md-5">
        <img src="pictures/products/<?php echo $row['img']; ?>" class="card-img" alt="...">
        </div>
        <div class="col-lg-5 col-sm-12 col-md-6">
            <div class="card-body">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $row['name']; ?></h2>
                    <h3 class="card-title text-secondary"><?php echo $row['short_desc']; ?></h2>
                    <h4 class="display-5"><?php echo $row['sp']; ?> &nbsp;<del><?php echo $row['mrp']; ?> </del></h4>
                    <h6 class="text-muted">Design No: &nbsp;<?php echo $row['design']; ?> Meters</h6>
                    <h6 class="text-muted">Height From Groun Level: &nbsp;<?php echo $row['height']; ?> Meters</h6>
                    <h6 class="text-muted">Dimensions: &nbsp;<?php echo $row['dimensions']; ?> Meters</h6><br>
                    <form method="post">
                    <label>Qty:</label>
                    <select name="qty">
                        <?php for($q=1;$q<=$row['qty'];$q++)
                            {
                                echo "<option>".$q."</option>";
                            }
                        ?>
                    </select><br>
                    <?php if($added!='Added!' && $added!='Already Added!')
                    {echo "<button type='submit' name='add_to_cart' class='btn btn-primary'>Add to cart</button></form>";}
                    else
                    {
                        echo "<a href='#' class='btn btn-light'>$added</a>";
                    }?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
  <h5 class="card-header">Description</h5>
  <div class="card-body">
    <h5 class="card-title text-dark">Features:</h5>
    <p class="card-text "><?php echo $row['description']; ?></p>
    <h5 class="card-title text-dark">Warranty info:</h5>
    <p class="card-text"><?php echo $row['description']; ?></p>

  
</div>

<div class="row ">
    <div class="col-12 border border-top border-right-0 border-left-0 mt-5 mb-3 bg-light">
        <div class="section-tittle text-center mb-85">
            <h2 class="mt-3 mb-3 display-5 text-dark">Similar Products</h2>
        </div>
    </div>
</div>

<div class="owl-carousel owl-theme">
<?php 
    $category_id_passed=$row['category_id'];
    $sql1="select * from products where category_id='$category_id_passed' and status=1";
    $result2=mysqli_query($con,$sql1);
    while($row2=mysqli_fetch_assoc($result2)){
    
?>


<div class="card m-2 text-center rounded-lg item">
    
    <img src="pictures/products/<?php echo $row2['img']; ?>" class="card-img-top" alt="...">
    <div class="card-body">
    <a href="product_detail.php?product_id=<?php echo $row2['id'];?>">
        <h5 class="card-title btn btn-white"><?php echo $row2['name']; ?></h5></a>
        <h6 class="display-5"><?php echo $row2['sp']; ?> &nbsp;<del><?php echo $row2['mrp']; ?> </del></h6>
        <p class="card-text"><?php echo $row2['short_desc']; ?></p>
    
    </div>
</div>
    <?php } ?>
</div>
</div>
</div>
<script>
		$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
		</script>
<?php
    require 'footer.php';
?>