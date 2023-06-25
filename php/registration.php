<?php
session_start();
    include "../db_config/connection.php";

    $isEmpty = false;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $position = "Client";

    if(empty($username)){
        Failure("username is empty");
        $isEmpty = true;
    }

    if(empty($email)){
        Failure("email is empty");
        $isEmpty = true;
    }
    if(empty($pass)){
        Failure("pass is empty");
        $isEmpty = true;
    }

    if(empty($repass)){
        Failure("repass is empty");
        $isEmpty = true;
    }

    if($pass!=$repass){
        Failure("password is not correct by the repass");
        $isEmpty = true;
    }

    if($isEmpty){
        header("location:../registration.php");
    }


    $nagham = "SELECT * FROM `users` WHERE username='$username' and email='$email' and `Password`='$pass' ";
    $stmtNagham = $db->query($nagham);
    if($stmtNagham -> rowCount() >0){
        Failure("$username you are subscribe before ");
    }else{
        $sqlInsertClient = "INSERT INTO `users`(`username`, `email`, `Password`, `Position`) VALUES ('$username','$email','$pass','$position') ";
        $stmtInsertClient = $db->query($sqlInsertClient);
        if($stmtInsertClient){
            Success("Welcome $username in my shop");
        }
    }

    function Failure($message){
        $_SESSION['Message'] = $message;
    }

    function Success($message){
        $_SESSION['Message'] = $message;
    }
    
    header("location:../registration.php");
    
    
?>