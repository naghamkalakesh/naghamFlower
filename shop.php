<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php

include "db_config/connection.php";
include "include/head.php";

?>

<body id="page-top" class="index">
  <!--top navigation-->

  <?php
  include "include/header.php";
  ?>
  <h1><?php echo $_SESSION["Message"]; ?>
</h1>
  <div class="container featured-products">
    <div class="main-heading">
      <h2>My Lovely Shop</h2>
      <hr>
    </div>

    <div class="row">
      <?php
      $sqlSelectProduct = "SELECT * FROM `products`;";
      $stmtSelectProduct = $db->query($sqlSelectProduct);
      if ($stmtSelectProduct->rowcount() > 0) {
        foreach ($stmtSelectProduct as $Rows) {
          echo "<div class='col-md-4 products-detail'>
          <img src='css/uploadimg/" . $Rows['img'] . "' class='img-responsive' alt='" . $Rows['img'] . "' width='250px' height='250px'/>
          <p> <h3>" . $Rows['Name'] . "</h3>
          <p>" . $Rows['Description']  . "</p>
          <span class='price-tag'>" . $Rows['price'] . "</span>
          <a href='php/addtocard.php?productid=". $Rows["ID"] ."&price=". $Rows['price'] ."'>Add to card</a>
                <br/>
                </div>
";
        }
      }
      ?>



    </div><!--end of row-->

  </div><!--end of featured list-->

  <?php

  include "include/footer.php";

  ?>

  </div>


</body>

</html>