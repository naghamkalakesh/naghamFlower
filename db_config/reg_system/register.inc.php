<?php


require("./db_config/conn.php");



if (isset($_POST["submit"])) {

    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];


    $FileName = $_FILES['image']['name'];
    $FileSize = $_FILES['image']['size'];
    $FileType = $_FILES['image']['type'];
    $FileTmp = $_FILES['image']['tmp_name'];

    // adding the usable types of an image into an array
    $ValidImageExtension = ['jpg', 'jpeg', 'png'];

    // dividing the name into name + type using explode; it returns an array
    $imageExtension = explode('.', $FileName);

    $imageExtension = strtolower(end($imageExtension));


    $checkEmail = "SELECT * FROM user WHERE email = '$email'";

    $checkEmail_result = mysqli_query($conn, $checkEmail);

    $rowCount = mysqli_num_rows($checkEmail_result);

    $error = [];

    if ($rowCount > 0) {
        $error["email"] = "Email is already in use";
    }
    // checking if the name or email or password or the repeated password are not empty
    elseif (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        array_push($error, "All fields are required");
    }

    // checking if the user is writing the email with all the important details
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "Email is not valid");
    }

    // checking that the password must not be less than 5 characters
    elseif (strlen($password) < 5) {
        array_push($error, "Password too short");
    }

    // checking if the password is the same in the repeat password field
    elseif ($password !== $confirm_password) {
        array_push($error, "Passwords do not match");
    }

    // Verifying if the entered name and password conform to the specified pattern.
    elseif (!preg_match('/^[a-zA-Z0-9_-]+$/', $name) || !preg_match('/^[a-zA-Z0-9_\-\p{P}]+$/', $password)) {
        array_push($error, "Invalid password or name");
    }

    // checking if the length of the name is greater than 15 characters
    elseif (strlen($name) > 15) {
        array_push($error, "Name must be less than 15 characters");
    } elseif ($_FILES['image']['error'] === 4) {
        array_push($error, "Error while selecting an image");
    } elseif (!in_array($imageExtension, $ValidImageExtension)) {
        array_push($error, "Wrong type of image");
    } elseif ($FileSize > 1000000) {
        array_push($error, "File too large");
    } else {

        // Generate unique image name
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;

        // Move uploaded file to "images" folder with new name
        move_uploaded_file($FileTmp, 'images/' . $newImageName);
        // Hash the password
        $password_hashed = password_hash($password, PASSWORD_BCRYPT);

        // Insert user data into database
        $sql = "INSERT INTO user (username, email, password,image, date) VALUES ('$name', '$email', '$password_hashed','$newImageName', NOW())";

        $result = mysqli_query($conn, $sql);

        header("location:login.php");
    }
}
