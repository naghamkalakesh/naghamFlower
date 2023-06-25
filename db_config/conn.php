<!-- connection with database -->
<?php

$host = "localhost";
$db = "test";
$user = "root";
$password = "";

try {
    $conn = mysqli_connect($host, $user, $password, $db);
    // echo("done");
} catch (Exception $e) {
    // echo("Error:" . $e);
}

