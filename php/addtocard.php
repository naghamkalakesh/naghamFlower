<?php
session_start();
    if(empty($_SESSION["hasOpen"])){
        $_SESSION['Message'] = "please log in before choice any product";
        header("location:../login.php");
    }
include "../db_config/connection.php";
    $userID = $_SESSION["id"];
    $productID = $_GET["productid"];
    $price = $_GET["price"];

    $sqlInsertCart = "INSERT INTO `cart`( `Product_ID`, `price`, `User_ID`) VALUES ($productID,'$price',$userID)";
    $stmtInsertCart = $db->query($sqlInsertCart);
    if($stmtInsertCart){
        $_SESSION['Message'] = "Product in my card"; 
        header("location:../shop.php");

    }


?>