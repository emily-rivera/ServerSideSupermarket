<?php
include "config.php";

// Check if user sent the following information
if (isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['password'])) {
    // Validate the sent information
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate and save the information in variables
    $first_name = validate($_POST['first_name']);
    $last_name = validate($_POST['last_name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    // If any of the fields are empty, send the user back to the register page
    if (empty($first_name)) {
        header("Location: register.php");
        exit();
    } else if (empty($last_name)) {
        header("Location: register.php");
        exit();
    } else if (empty($email)) {
        header("Location: register.php");
        exit();
    } else if (empty($password)) {
        header("Location: register.php");
        exit();
    } else {
        // If all information is present, if it is, check if email already exists
        // Select all data from the database that is equal to the passed email
        $sql = "SELECT * FROM ServeSideSuperAccounts WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            header("Location: register.php?error=An account with that email already exists.");
            exit();
        } else {
            // Once everything has been validated, add the user to the databse
            $sql2 = "INSERT INTO ServeSideSuperAccounts(first_name, last_name, email, password) VALUES('$first_name', '$last_name', '$email', '$password')";
            $result2 = mysqli_query($conn, $sql2);

            if ($result2) {
                header("Location: login.php?success=Your account has been successfully created!");
                exit();
            } else {
                header("Location: register.php?error=An unknown error occurred.");
                exit();
            }
        }
    }
} else {
    header("Location: register.php");
    exit();
}