<?php
require 'con.php';
  $result=mysqli_query($con,"select * from categories where status=1");
?>
<footer class="pt-4 md-5 pt-md-5 border-top text-center footer">
    <div class="row">
      <div class="col-md-3 col-sm-6 col-lg-3">
        <img class="mb-2" src="pictures/icon.png" alt="" width="200" height="50">
        <small class="d-block mb-3 text-muted">&copy; 2017-2020 All Rights Reserved.</small>
        <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-linkedin"></a>
          <a href="#" class="fa fa-instagram"></a>
      </div>
      <div class="col-md-3 col-sm-6 col-lg-3">
        <h5>Products</h5>
        <ul class="list-unstyled text-small">
          <?php while($row=mysqli_fetch_assoc($result))
          { ?>
          <li><a class="text-muted" href="products.php?category_id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?> </a></li>
        <?php  }
        ?>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 col-lg-3">
        <h5>Support</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="#">Warranty Services</a></li>
          <li><a class="text-muted" href="#">Terms & <br>Conditions</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-6 col-lg-3">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li><a class="text-muted" href="contact.php">Contact Us</a></li>
          <li><a class="text-muted" href="contact.php">Centres</a></li>
          <li><a class="text-muted" href="team.php">Our Team</a></li>
        </ul>
      </div>
    </div>
  </footer>
  
  </main>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/5c4d4b1d5b.js" crossorigin="anonymous"></script>

</html>