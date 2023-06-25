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
        
        <header>
            <div class="container">
                <div class="carousel-wrapper">
                <div id="carousel-example-generic" class="carousel slide"
                 data-ride="carousel" aria-hidden="true">
                    <div class="carousel-inner main-img" role="listbox">
                        <div class="item active">
                            <img src="images/main-image-rose.jpg"/>
                            <div class="carousel-caption banner-text">
                                <h3>Valentine's Day Specials</h3>
                                    <!--<p>Praesent vestibulum aenean nonummy <br/>
                            hendrerit mauris сum sociis natoque.</p>-->
                                                    
                            </div>
                                            
                        </div>
                        <div class="item">
                            <img src="images/main-image-white.jpg"/>
                            <div class="carousel-caption banner-text">
                                <h3>New Ideas for Birthday Bouquets</h3>
                                                    
                            </div>
                             
                            </div>
                    <div class="item">
                        <img src="images/main-image3.jpg"/>
                        <div class="carousel-caption banner-text">
                            <h3>Fresh flowers for every Occasion</h3>
                            <!--<p>Praesent vestibulum aenean nonummy <br/>
                            hendrerit mauris сum sociis natoque.</p>-->
                        
                        </div>
                        </div>
                    </div>
                    <!--controls-->
                   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                    </a>
                   <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                    </a>
                </div>
                </div><!-- end of carousel wrapper-->    
                
                
                
                
                <!-- <div class="row">
                    <div  class="col-md-3 box-left">
                        <h3 class="h3-banner-text">
                            Plants new Arrivals<br/><span class="highlight">Get upto 25% Off!</span>
                        </h3>
               
                    </div>
                   <div  class="col-md-3 box-left-middle">
                        <h3 class="h3-banner-text">
                            Wedding Flowers<br/><span class="highlight">Get upto 25% Off!</span>
                        </h3>
                    </div>
                   <div  class="col-md-3 box-middle">
                       <div class="wrap-outline">
                        <h3 class="h3-banner-text">
                           Romance Bouquets <br/><span class="highlight">Get upto 25% Off!</span>
                        </h3>
                       </div>
                    </div>
                    <div  class="col-md-3 box-right">
                        <h3 class="h3-banner-text">
                            Valentine's Day Flowers<br/><span class="highlight">Get upto 25% Off!</span>
                        </h3>
                    </div>
                   
                </div>       
                </div> -->
                
            </header>
        <div class="container featured-products">
            <div class="main-heading">
                <h2>New products</h2>
                <hr>
                </div>
                
                <div class="row">
                  <?php
$sqlSelectProduct = "SELECT * FROM `products` limit 3;";
$stmtSelectProduct = $db->query($sqlSelectProduct);
if($stmtSelectProduct -> rowcount() > 0 ){
  foreach($stmtSelectProduct as $Rows){
echo "<div class='col-md-4 products-detail'>
        
          <img src='css/uploadimg/". $Rows['img'] . "' class='img-responsive' alt='". $Rows['img'] . "'/>
          <h3>" . $Rows['Name'] . "</h3>
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