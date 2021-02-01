<?php
  require 'header.php';
  require 'con.php';  
if(isset($_GET['page_no']))
  {
      $page_no=$_GET['page_no'];
  }
else
{
      $page_no=1;
}
echo "<div class='container'>";
if(isset($_GET['user_id']))
{

    $user_id=$_GET['user_id'];
    $result=mysqli_query($con,"select * from review where id='$user_id'");
    $row=mysqli_fetch_assoc($result);
    ?>

    <div class="row text-center d-flex justify-content-center">
        <div class="col-sm-12 col-md-5 col-lg-4 border p-2 m-2 rounded center">
            <img src="<?php echo $row['img']; ?>" width="140" height="140" background="#777" color="#777" class="rounded-circle">
            <h5><?php echo $row['user_name']; ?></h5>
            <h6><?php echo $row['review']; ?></h6>
            <h6 class="text-muted"><?php echo $row['comment']; ?></h6>
            <h6><?php for($i=1;$i<=$row['star'];$i++){ echo "&#9733";   }   $j=5-$row['star'];      for($k=$j;$k>0;$k--){ echo "&#9734";   }?></h6>
        </div>
    </div>
    
    <div class="row ">
        <div class="col-12 border border-top border-right-0 border-left-0 mt-3 mb-3 bg-light">
            <div class="section-tittle text-center mb-85">
                <h2 class="mt-2 mb-2 display-5 text-dark">More Reviews</h2>
            </div>
        </div>
    </div>
    <div class="owl-carousel owl-theme row">
    <?php 
    $sql1="select * from review where preference=1";
    $result2=mysqli_query($con,$sql1);
    while($row2=mysqli_fetch_assoc($result2))
    {
    ?>
    <div class="border border-light rounded item">
    <a class="btn btn-white" href="reviews.php?user_id=<?php echo $row2['id']; ?>" role="button">
        <img src="pictures/profiles/<?php echo $email=$row2['email']; $result3=mysqli_query($con,"select * from user_profiles where email='$email'"); $row3=mysqli_fetch_assoc($result3); echo $row3['img']; ?>" width="140" height="140" background="#777" color="#777" class="rounded-circle">
        <h4><?php echo $row2['user_name']; ?></h4>
        <h6><?php echo $row2['review']; ?></h6>
        <?php for($i=1;$i<=$row2['star'];$i++){ echo "&#9733";   }   $j=5-$row2['star'];      for($k=$j;$k>0;$k--){ echo "&#9734";   }?>
        </a>
    </div>
    <?php 
    } 
   ?>
    </div>
    <?php
}
else
{
    ?>
    <div class="col-12 mt-5 mb-3 bg-light">
            <div class="section-tittle text-center mb-85">
                <h2 class="mt-2 mb-2 display-5 text-dark">Customer Reviews</h2>
            </div>
    </div>
    <?php
            $result1=mysqli_query($con,"select * from review");
            $num_of_records=mysqli_num_rows($result1);
            $records_per_page=20;
            $no_of_pages=ceil($num_of_records/$records_per_page);
            $start_from=($page_no-1)*$records_per_page;
            $sql1="select * from review order by preference limit $start_from,$records_per_page";
            $result=mysqli_query($con,$sql1);
            echo "<div class='row'>";
        while($row=mysqli_fetch_assoc($result))
        {
    ?>
            <div class="col-md-3 col-lg-2 col-sm-5 col-5 m-2 rounded text-center">
            <a class="btn btn-light" href="reviews.php?user_id=<?php echo $row['id']; ?>" role="button">
                <img src="pictures/profiles/<?php echo $email=$row2['email']; $result3=mysqli_query($con,"select * from user_profiles where email='$email'"); $row3=mysqli_fetch_assoc($result3); echo $row3['img']; ?>" width="140" height="140" background="#777" color="#777" class="rounded-circle">
                <h5><?php echo $row['user_name']; ?></h5>
                <h6><?php echo $row['review']; ?></h6>
                <h6><?php for($i=1;$i<=$row['star'];$i++){ echo "&#9733";   }   $j=5-$row['star'];      for($k=$j;$k>0;$k--){ echo "&#9734";   }?></h6>
                </a>
            </div>

    <?php 
        } 
    ?>
    </div>
        <div class="col-12">
        <nav class="mt-4">
        <ul class="pagination justify-content-center">
        
        <?php if($page_no>1)
        { 
        ?>
            <li class="page-item"><a  class="page-link" href="?page_no=<?php echo ($page_no-1);  ?>&category_id=<?php echo $category_id;  ?>">Prev</a></li>
        <?php 
        }
        ?>
            
        <?php
        for($i=1;$i<=$no_of_pages;$i++)
        {
            if($i==$page_no)
            { 
        ?>
                <li class="page-item active"><a  class="page-link" href="?page_no=<?php echo $i;  ?>&category_id=<?php echo $category_id;  ?>"><?php echo $i; ?></a></li>

            <?php   } 
            else
            { 
            ?>
                <li class="page-item"><a  class="page-link" href="?page_no=<?php echo $i;  ?>&category_id=<?php echo $category_id;  ?>"><?php echo $i; ?></a></li>
            <?php   
            }
        }
            ?>
        <?php
        if($page_no<$no_of_pages)  
        { 
        ?>
            <li class="page-item"><a  class="page-link" href="?page_no=<?php echo ($page_no+1);  ?>&category_id=<?php echo $category_id;  ?>">Next</a></li>
        
        <?php   
        }  
        ?>
        </ul>
        </nav>
        <div>
        </div>

<?php

}
?>
</div>
</div>
<script>
		$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:3
        },
        600:{
            items:4
        },
        1000:{
            items:7
        }
    }
})
		</script>
<?php
require 'footer.php';
?>