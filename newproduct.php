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
            <img src="images/flower-vase1.png" alt="" class="img-responsive" />
            <?php
            if (!empty($_GET["action"]) && $_GET['action'] == 'edit') {
                $ID = $_GET['id'];
                $CatID = $_GET['catid'];
                $sqlSelectOneProduct = "SELECT * FROM products where ID = $ID;";
                $stmtSelctOneProduct = $db->query($sqlSelectOneProduct); ?>
                <form class="form-spacing form-reg" action="php/editproduct.php?id=<?=$ID;?>" method="post" enctype="multipart/form-data">
                    <h1>Edit Products</h1>
                    <hr>
                    <h2><?php
                        if (!empty($_SESSION['Message'])) {
                            echo $_SESSION['Message'];
                        }
                        ?></h2>
                    <select name="category" class="form-control" id="membName">

                        <?php
                        $sqlSelectCat = "SELECT * FROM `categories` WHERE ID = $CatID";
                        $stmtSelectCat = $db->query($sqlSelectCat);
                        if ($stmtSelectCat->rowCount() > 0) {
                            foreach ($stmtSelectCat as $Rows) {
                                echo "<option value='" . $Rows["ID"] . "'>" . $Rows["Category"] . "</option>";
                            }
                        }
                        $sqlSelectCat = "SELECT * FROM `categories`";
                        $stmtSelectCat = $db->query($sqlSelectCat);
                        if ($stmtSelectCat->rowCount() > 0) {
                            foreach ($stmtSelectCat as $Rows) {
                                echo "<option value='" . $Rows["ID"] . "'>" . $Rows["Category"] . "</option>";
                            }
                        }


                        ?>
                    </select>
                    <br />
                    <?php
                    foreach ($stmtSelctOneProduct as $Rows) {
                    ?>
                        <label class="sr-only" for="Name">Name</label>
                        <input type="text" name="name" class="form-control" id="membName" placeholder=" Name" required value="<?= $Rows['Name']; ?>" />
                        <br />
                        <label class="sr-only" for="membEmailid">Discreption</label>
                        <input type="" name="Description" class="form-control" id="membDescription" placeholder="Description" value="<?= $Rows['Description']; ?>"/>
                        <br />
                        <label class="sr-only" for="Price">PasswordAgain</label>
                        <input type="price" name="Price" class="form-control" id="membPrice" placeholder="Price" required value="<?= $Rows['price']; ?>"/>
                        <br />

                        <button type="submit" class="btn btn-lg btn-danger">Edit product</button>
                        <br>
                        <br>



                </form>




            <?php   }
                } else {

            ?>
            <form class="form-spacing form-reg" action="php/newproduct.php" method="post" enctype="multipart/form-data">
                <h1>New Products</h1>
                <hr>
                <h2><?php
                    if (!empty($_SESSION['Message'])) {
                        echo $_SESSION['Message'];
                    }
                    ?></h2>

                <select name="category" class="form-control" id="membName">
                    <option value="">Choice Category</option>
                    <?php
                    $sqlSelectCat = "SELECT * FROM `categories`";
                    $stmtSelectCat = $db->query($sqlSelectCat);
                    if ($stmtSelectCat->rowCount() > 0) {
                        foreach ($stmtSelectCat as $Rows) {
                            echo "<option value='" . $Rows["ID"] . "'>" . $Rows["Category"] . "</option>";
                        }
                    }


                    ?>
                </select>
                <br />
                <label class="sr-only" for="Name">Name</label>
                <input type="text" name="name" class="form-control" id="membName" placeholder=" Name" required />
                <br />
                <label class="sr-only" for="membEmailid">Discreption</label>
                <input type="" name="Description" class="form-control" id="membDescription" placeholder="Description" />
                <br />
                <label class="sr-only" for="img">img</label>
                <input type="file" name="img" class="form-control" id="membimg" placeholder="img" required />
                <br />
                <label class="sr-only" for="Price">PasswordAgain</label>
                <input type="price" name="Price" class="form-control" id="membPrice" placeholder="Price" required />
                <br />

                <button type="submit" class="btn btn-lg btn-danger">Add new product</button>
                <br>
                <br>



            </form>
        <?php } ?>
        </div>
    </main>
    <?php
    include "include/footer.php";
    ?>

































</body>