<?php
require '../con.php';
require '../header.php';
$category_id=mysqli_real_escape_string($con,$_GET['category_id']);
$result1=mysqli_query($con,"select * from products where category_id='$category_id' and status=1");
$num_of_records=mysqli_num_rows($result1);
$num_of_records;
if(isset($_GET['page_no']))
{
    $page_no=$_GET['page_no'];
}
else{
    $page_no=1;
}
$records_per_page=5;
$no_of_pages=ceil($num_of_records/$records_per_page);
$start_from=($page_no-1)*$no_of_pages;
$sql1="select * from products where category_id='$category_id' and status=1 limit $start_from,$records_per_page";
$result2=mysqli_query($con,$sql1);
while($row=mysqli_fetch_assoc($result2))
{
?>



<?php
}
?>



<nav class="mt-4" aria-label="Page navigation sample">
  <ul class="pagination">

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
</div> <!-- container .//  -->
</section>
<?php
require '../footer.php';
?>