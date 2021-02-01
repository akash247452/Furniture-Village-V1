<div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <?php 
        require 'con.php';
        $result_beds=mysqli_query($con,"select * from categories where name='Beds'");
        $result_sofas=mysqli_query($con,"select * from categories where name='Sofas'");
        $result_wardrobe=mysqli_query($con,"select * from categories where name='Wardrobes'");
        $result_foldables=mysqli_query($con,"select * from categories where name='Foldables'");
        $beds=mysqli_fetch_assoc($result_beds);
        $sofas=mysqli_fetch_assoc($result_sofas);
        $wardrobes=mysqli_fetch_assoc($result_wardrobe);
        $foldables=mysqli_fetch_assoc($result_foldables);
        ?>
        <div class="carousel-inner">
          <div class="carousel-item active">
                <img src="pictures/card1.jpeg" width="100%" height="100%" background="#777" color="#777" text=" " title=" " >
            <div class="container">
              <div class="carousel-caption">
                <h1>The Beds</h1>
                <p>Sometimes most productive thing you can do is Relax.</p>
                <p><a class="btn btn-lg btn-primary" href="products.php?category_id=<?php echo $beds['id'];?>" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
           <img src="pictures/card2.jpeg" width="100%" height="100%" background="#777" color="#777" text=" " title=" " >
            <div class="container">
              <div class="carousel-caption">
                <h1>Foldable Furniture</h1>
                <p>Make space for Family.</p>
                <p><a class="btn btn-lg btn-primary" href="products.php?category_id=<?php echo $foldables['id'];?>" role="button">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img src="pictures/card3.jpg" width="100%" height="100%" background="#777" color="#777" text=" " title=" " >
            <div class="container">
              <div class="carousel-caption">
                <h1>The Sofa</h1>
                <p>The sofas extends to make room for guest. </p>
                <p><a class="btn btn-lg btn-primary" href="products.php?category_id=<?php echo $sofas['id'];?>" role="button">Learn More</a></p>
              </div>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <div class="container marketing">
      
        <!-- Three columns of text below the carousel -->
        <div class="row text-center">
        
          <div class="col item">
            <img src="pictures/wardrobe.jpeg" width="140" height="140" background="#777" color="#777"  >
            <h2>Wardrobe</h2>
            <p><a class="btn btn-light" href="products.php?category_id=<?php echo $wardrobes['id'];?>" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col item">
            <img src="pictures/beds.jpeg" width="140" height="140" background="#777" color="#777"  >
            <h2>Beds</h2>
            <p><a class="btn btn-light" href="products.php?category_id=<?php echo $beds['id'];?>" role="button">View details &raquo;</a></p>
          </div>
          <div class="col item">
            <img src="pictures/sofa.jpeg" width="140" height="140" background="#777" color="#777" >
            <h2>Sofas</h2>
            <p><a class="btn btn-light" href="products.php?category_id=<?php echo $sofas['id'];?>" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col item">
            <img src="pictures/foldablebeds.jpeg" width="140" height="140" background="#777" color="#777"  >
            <h2>Foldable's</h2>
            <p><a class="btn btn-light" href="products.php?category_id=<?php echo $foldables['id'];?>" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      
    
        <!-- START THE FEATURETTES -->
    
        <hr class="featurette-divider">
    
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Wooden Wardrobes <span class="text-muted"></span></h2>
            <p class="lead">Add a vintage touch to your home with wooden wardrobes and wooden almirahs. Wardrobes, almirahs and cupboards are not just meant for your bedroom.A wooden wardrobe can spruce up your room more than you can imagine.</p>
          </div>
          <div class="col-md-5">
            <img src="pictures/wardrobe.jpeg" width="500" height="500" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto" >
          </div>
        </div>
    
        <hr class="featurette-divider">
    
        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Foldable Furniture</h2> <span class="text-muted">Beds</span></h2>
            <p class="lead">The bed is easy to unfold and set up. It's just as easy to take down. It folds small enough to slide into a closet. There are no springs and no annoying bar running down the middle. The mattress sets on canvas so there is some give to the mattress which makes it more comfortable.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img src="pictures/foldablebeds.jpeg" width="500" height="500" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto" >
          </div>
        </div>
    
        <hr class="featurette-divider">
    
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Modern Designs<span class="text-muted"></span></h2>
            <p class="lead">You must have gotten tired of that old furniture you're having or you have something new and exquisite and you'd like to see what else is on the market.</p>
          </div>
          <div class="col-md-5">
           <img src="pictures/modern.jpeg" width="500" height="500" background="#eee" color="#aaa" class="bd-placeholder-img-lg featurette-image img-fluid mx-auto" >
          </div>
        </div>
      </hr>
        
      </div>
      <!-- /.container -->
      <div class="container marketing border-top text-center">
      <br>
      <div class="d-flex justify-content-center"><a class="btn btn-light" href="reviews.php">Customer Reviews</a></div>
      <br>
      <br>
        
<div class="owl-carousel owl-theme row">
<?php 
  $result2=mysqli_query($con,"select * from review where preference=1");
  while($row2=mysqli_fetch_assoc($result2))
{
?>
        <div class="item">
        <a class="btn btn-light" href="reviews.php?user_id=<?php echo $row2['id']; ?>" role="button">
          <img src="pictures/profiles/<?php echo $email=$row2['email']; $result3=mysqli_query($con,"select * from user_profiles where email='$email'"); $row3=mysqli_fetch_assoc($result3); echo $row3['img']; ?>" width="80" height="80" background="#777" color="#777" class="rounded-circle" >
          <h6><?php echo $row2['user_name'] ?></h6><h6 class="text-muted"><?php echo $row2['review'] ?></h6> <?php for($i=1;$i<=$row2['star'];$i++){ echo "&#9733";   }   $j=5-$row2['star'];      for($k=$j;$k>0;$k--){ echo "&#9734";   }?>
          </a>
        </div>
<?php } ?>  
</div>      
      
    </div>  
    <div class="row">
      <div class="col">
        <img src="pictures/warranty.png" class="w-100 ">
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
            items:5
        },
        1000:{
            items:7
        }
    }
})
		</script>
    