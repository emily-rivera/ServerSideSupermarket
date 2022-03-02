<?php

// Database connection info
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'W01355413';
$DATABASE_PASS = 'Emilycs!';
$DATABASE_NAME = 'W01355413';

// Connect using the above info
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

// If there is an error with the connection, stop and display the error
if (mysqli_connect_errno()) {
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

function template_header($title="Server-Side Supermarket") {
echo <<<EOT
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>$title</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <link rel="stylesheet" href="./css/styles.css">
    </head>

    <body>
EOT;
}

function template_nav_main() {
echo <<<EOT
    <nav class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                Server-Side Supermarket
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <a class="button is-primary" href="register.php">
                        <strong>Sign up</strong>
                    </a>
                    <a class="button is-primary is-light" href="login.php">
                        <strong>Log in</strong>
                    </a>
                </div>
            </div>
        </div>
    </nav>
EOT;
}

function template_nav_login() {
echo <<<EOT
    <nav class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="index.php">
                Server-Side Supermarket
            </a>
        </div>
    </nav>
EOT;
}

function template_nav_dashboard() {
    echo <<<EOT
    <nav class="navbar">
        <div class="navbar-brand">
            <a class="navbar-item" href="dashboard.php">
                Server-Side Supermarket
            </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item"> 
            <div class="buttons">
                <a class="button is-primary is-light" href="logout.php">
                    <span><strong>Logout</strong></span>
                </a>
                <a class="button is-primary" href="cart.php">
                    <span class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </span>
                    <span><strong>Cart</strong></span>
                </a>
            </div> 
        </div>
    </nav>
EOT;
}

function template_nav_cart() {
echo <<<EOT
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="dashboard.php">
                Server-Side Supermarket
            </a>
        </div>
    <div class="navbar-end">
        <div class="navbar-item"> 
            <div class="buttons">
                <a class="button is-primary is-light" href="logout.php">
                    <span><strong>Logout</strong></span>
                </a>
            </div>
        </div>
    </nav>
EOT;
}

