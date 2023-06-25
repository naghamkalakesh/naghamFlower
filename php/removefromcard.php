<?php

session_start();
    include "../db_config/connection.php";

    $cardID = $_GET["cardid"];

    $sqlDeleteFromcard = "DELETE FROM `cart` WHERE ID = $cardID and ischeckout = 0 ";
    $stmtDeleteFromcard = $db->query($sqlDeleteFromcard);

    if($stmtDeleteFromcard){
        $_SESSION["Message"] = "Remove item from Card is done";
        header("location:../card.php");
    }