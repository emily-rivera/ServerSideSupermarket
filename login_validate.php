<?php
session_start();
include "config.php";

// Authenticate the login
if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if (empty($email)) {
        header("Location: login.php");
        exit();
    } else if (empty($password)) {
        header("Location: login.php");
        exit();
    } else {
        $sql = "SELECT * FROM ServeSideSuperAccounts WHERE email='$email' AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $password) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                header("Location: dashboard.php");
                exit();
            } else {
                header("Location: login.php?error=Incorrect username or password");
                exit();
            }
        } else {
            header("Location: login.php?error=Incorrect username or password");
            exit();
        }
    }
} else {
    header("Location: login.php");
    exit();
}