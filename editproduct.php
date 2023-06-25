<?php
session_start();
include "db_config/connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php
    include "include/head.php";

?>
    <body id="page-top" class="index">
        <?php
            include "include/header.php";
        ?>
        <main>
            <div class="container">
                <!-- <img src="images/flower-vase1.png" alt="" class="img-responsive"/> -->
                 <h1>List of Products</h1>
                <hr>
                <h2><?php
                if(!empty($_SESSION['Message'])){
                    echo $_SESSION['Message'];
                }
                ?></h2>
               
                <?php
                    $sqlSelectProduct = "SELECT p.ID,c.ID as catID, c.Category, `Name`,`Description`,`img`,`price` FROM products p INNER JOIN categories c ON p.catID = c.ID; ";
                    $stmtSelectProduct = $db->query($sqlSelectProduct);
                    if($stmtSelectProduct ->rowCount() > 0){
                        echo "<table class='table'>
                        <tr>
                            <th>ID</th>
                            <th>CatID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                        ";
                        foreach($stmtSelectProduct as $Rows){
                            echo "<tr>";
                          echo  "<td>" . $ID =  $Rows["ID"]; "</td>";
                          echo  "<td>" . $catID = $Rows["catID"] ;"</td>";
                          echo  "<td>" .   $Rows["Category"] ."</td>";
                          echo  "<td>" .  $Rows["Name"] ."</td>";
                          echo  "<td>" .  $Rows["Description"] ."</td>";
                          echo  "<td>" .  $Rows["img"] ."</td>";
                          echo  "<td>" .  $Rows["price"] ."</td>";
                          ?>
                          <td>
                            <a href="newproduct.php?action=edit&id=<?=$ID;?>&catid=<?=$catID; ?>">Update</a>
                            <a href="php/deleteproduct.php?action=delete&id=<?=$ID;?>">Delete</a>
                          </td>
                          </tr
                  <?php      }
                    }

                ?>
          
            </div>
        </main> 
        <?php
          //  include "include/footer.php";
        ?>
        
        
       
    
    </body>
