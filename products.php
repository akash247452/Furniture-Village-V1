<?php
require 'header.php';
include 'con.php';
$category_id=mysqli_real_escape_string($con,$_GET['category_id']);
$result1=mysqli_query($con,"select * from products where category_id='$category_id' and status=1");
$num_of_records=mysqli_num_rows($result1);

if(isset($_GET['page_no']))
{
    $page_no=$_GET['page_no'];
}
else{
    $page_no=1;
}
$records_per_page=20;
$no_of_pages=ceil($num_of_records/$records_per_page);
$start_from=($page_no-1)*$records_per_page;
$sql1="select * from products where category_id='$category_id' and status=1 limit $start_from,$records_per_page";
$result2=mysqli_query($con,$sql1);
?>

<section class="section-content padding-y">
<div class="container">
<header class="border-bottom mb-4 mt-4 pb-3">
		<div class="form-inline">
			<span class="mr-md-auto"><?php echo $num_of_records; ?> Items found </span>
		</div>
</header>
<div class="row">
<?php
while($row=mysqli_fetch_assoc($result2))
{
?>

<div class="card col-lg-3 col-md-3 col-sm-5 col-6 text-center rounded-lg">

  <img src="pictures/products/<?php echo $row['img']; ?>" height="200" class="card-img-top" alt="wait">
  <a href="product_detail.php?product_id=<?php echo $row['id'];?>">
  <div class="card-body">
  <h5 class="card-title btn btn-white text-dark"><?php echo $row['name']; ?></h5></a>
    <h6 class="display-5">&#8377;<?php echo $row['sp']; ?> &nbsp;&#8377;<del><?php echo $row['mrp']; ?> </del></h6>


</div>

</div>

<?php
}
?>


</div> <!-- row end.// -->


<nav class="mt-4" aria-label="Page navigation sample">
  <ul class="pagination justify-content-center">

<?php if($page_no>1){ ?>
    <li class="page-item"><a  class="page-link" href="?page_no=<?php echo ($page_no-1);  ?>&category_id=<?php echo $category_id;  ?>">Prev</a></li>
<?php } ?>
<?php
    for($i=1;$i<=$no_of_pages;$i++)
    {
        if($i==$page_no)
        { ?>
            <li class="page-item active"><a  class="page-link" href="?page_no=<?php echo $i;  ?>&category_id=<?php echo $category_id;  ?>"><?php echo $i; ?></a></li>
<?php   } 
        else
        { ?>
            <li class="page-item"><a  class="page-link" href="?page_no=<?php echo $i;  ?>&category_id=<?php echo $category_id;  ?>"><?php echo $i; ?></a></li>
<?php       }
    }
?>
<?php if($page_no<$no_of_pages){ ?>
    <li class="page-item"><a  class="page-link" href="?page_no=<?php echo ($page_no+1);  ?>&category_id=<?php echo $category_id;  ?>">Next</a></li>
<?php } ?>

</ul>
</nav>
</div> 
</section>
</div>
</div> 
</section>
<?php
require 'footer.php';
?>