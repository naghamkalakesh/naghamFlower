<?php
session_start();
    include "../db_config/connection.php";

     $Name = $_POST['name'];
     $Descreption = $_POST['Description'];
     $cat = $_POST['category'];
     $Price = $_POST['Price'];
   if(empty($cat)){
    $_SESSION["Message"] = "please choice a category :(";
    header("location:../newproduct.php");
   }
    $target_dir = "../css/uploadimg/";
    $target_name = $_FILES["img"]["name"];
    $tmp_name = $_FILES['img']['tmp_name'];
    $target_store = $target_dir . $target_name;
    
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
        move_uploaded_file($tmp_name,$target_store);
       $sqlInsertproduct = "INSERT INTO `products`(`catID`, `Name`, `Description`, `img`, `price`) VALUES ($cat, '$Name','$Descreption','$target_name','$Price') ";
        $stmtInsertProduct = $db->query($sqlInsertproduct);
        if($stmtInsertProduct){
            $_SESSION["Message"] = "Insert has completed :)";
            header("location:../newproduct.php");
        }
       

    } else {
        $_SESSION["Message"] = "File is not an image.";
        header("location:../newproduct.php");
    }
      
?>