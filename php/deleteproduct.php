<?php
session_start();
include "../db_config/connection.php";
$ID = $_GET['id'];

$img = "";

$sqlSelectProduct = "SELECT img FROM products WHERE ID = $ID";
$stmtSelectProduct = $db -> query($sqlSelectProduct);
foreach($stmtSelectProduct as $row){
        $img = $row['img'];
}

unlink("../css/uploadimg/$img");


$sqlDeleteProduct ="DELETE FROM `products` WHERE `ID` = $ID";
$stmtDeleteProduct = $db->query($sqlDeleteProduct);
if ($stmtDeleteProduct)
{
    $_SESSION['Message']= "Product is deleted";
}
else{
    $_SESSION['Message']= "Product is not deleted";
}
header("location:../editproduct.php");
?>