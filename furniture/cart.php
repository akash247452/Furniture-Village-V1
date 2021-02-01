<?php
  require 'header.php';
  require 'con.php';  
  if(isset($_SESSION['id']) && $_SESSION['id']!='' &&  $_SESSION['admin_login']='yes'){}
else
{  header("Location:login.php");
   die();
}
if(isset($_GET['type']) && $_GET['type']!='')
{
    $type=mysqli_real_escape_string($con,$_GET['type']);
    $id=mysqli_real_escape_string($con,$_GET['id']);
    if($type=='delete')
    {
        $delete_query="delete from cart where id='$id'";
        mysqli_query($con,$delete_query);
    }
}
 ?>
 <div class="container-fluid cart" style="background-image: url('pictures/cart.jpg');">
   <br>
 <table class="table col-md-6 col-lg-6 border border-rounded ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Sr.No</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <?php
    $user_id=$_SESSION['id'];
    $sql="select * from cart where user_id='$user_id'";
    $result=mysqli_query($con,$sql);
    $i=0;
    while($row=mysqli_fetch_assoc($result))
    {
       $product_id= $row['product_id'];
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php  $result1=mysqli_query($con,"select * from products where id='$product_id'"); $row1=mysqli_fetch_assoc($result1); echo $row1['name'];  ?></td>
      <td><?php echo $row['qty']; ?></td>
      <td>&#8377;<?php echo $row1['sp']; ?></td>
      <td><span class="status ">
            <a class="btn-danger p-1 rounded" href="?type=delete&id=<?php echo $row['id'];?>" >Delete</a>
        </span>
      </td>
    </tr>
    
  </tbody>
    <?php $i=$i+1;} ?>
</table>
<br>
</div>
<head>
<style>
    .cart {
       background-color:rgba(0,0,0,0) !important;
       border-style: rounded;
       background-repeat:no-repeat;
    }
</style>

 <?php
    require 'footer.php';
?>