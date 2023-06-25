<?php

session_start();
    include "../db_config/connection.php";

    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $isEmpty = false;

    if(empty($email)){
        Failure("email is empty");
        $isEmpty = true;
    }

    if(empty($pass)){
        Failure("pass is empty");
        $isEmpty = true;
    }
  
    if($isEmpty){
        header("location:../login.php");
    }else{
        $sqlSelectUser = "SELECT * FROM `users` WHERE   email='$email' and `Password`='$pass'  ";
        $stmtSelectUser = $db->query($sqlSelectUser);
        if($stmtSelectUser -> rowCount() >0){
            foreach($stmtSelectUser as $Rows){
                    $_SESSION["hasOpen"] = true;
                    $_SESSION["id"] = $Rows['ID'];
                    $_SESSION['username'] = $Rows['username'];
                    $_SESSION['email'] = $Rows['email'];
                    $_SESSION['Position'] = $Rows['Position'];
            }
        }else{
            Failure("Error... Email or Pass has a problem"); 
        }
    }

    function Failure($message){
        $_SESSION['Message'] = $message;
    }

    
    header("location:../login.php");
    
    
?>
