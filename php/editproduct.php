<?php
session_start();
include "../db_config/connection.php";
$ID = $_GET['id'];
 $Name = $_POST['name'];
 $Descreption = $_POST['Description'];
 $cat = $_POST['category'];
 $Price = $_POST['Price'];


$sqlUpdateProduct = "UPDATE `products` SET `catID`=$cat,`Name`='$Name',`Description`='$Descreption',`price`='$Price' WHERE `ID` = $ID";
$stmtUpdateProduct = $db->query($sqlUpdateProduct);
if($stmtUpdateProduct){
    $_SESSION["Message"] = "Update product is done";
}
else {
    $_SESSION["Message"] = "Update product is not Success";
}
header("location:../editproduct.php");
?>