<?php
    $dns= "mysql:host=localhost;dbname=flowershop";
    $username = "root";
    $pass="";

    try{
        $db = new PDO($dns,$username,$pass);

    }catch(Exception $e){
        $error = $e->getMessage();
        echo "<p>Error Message: $error </p>";
    }