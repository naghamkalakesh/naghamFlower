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
  <h1><?php echo $_SESSION["Message"]; ?></h1>
  <div class="container featured-products">
    <div class="main-heading">
      <h2>My card</h2>
      <hr>
    </div>

    <div class="row">
      <?php
       $userID = $_SESSION["id"];
     $sqlSelectCard = "SELECT c.ID, p.Name , c.price FROM cart c INNER JOIN products p ON c.Product_ID=p.ID WHERE c.ischeckout = 0 AND c.User_ID =$userID";
      ?>
<table class="table">
<tr>
  <th>ID</th>
  <th>Product Name</th>
  <th>Price</th>
  <th>Actions</th>
</tr>
<?php
$sum = 0;
$stmtSelectCard = $db->query($sqlSelectCard);
if($stmtSelectCard -> rowCount()>0){
  foreach($stmtSelectCard as $row){
    echo "
    <tr>
      <td>" . $row['ID'] . "</td>
      <td>" . $row['Name'] . "</td>";
      $price = trim($row['price'],'$');
      $sum =  $sum + intval($price);
     echo "<td>" . $row['price'] ."</td>
      <td><a href='php/removefromcard.php?cardid=".$row['ID']."'>Remove From card</a></td>
 
    </tr>
    
    ";
  }
  echo "<tr>
    <td colspan='2'>
      Total amount
      </td>
      <td>$sum $</td></tr>";
}






?>
</table>

    </div><!--end of row-->

  </div><!--end of featured list-->

  <?php

  include "include/footer.php";

  ?>

  </div>


</body>

</html>