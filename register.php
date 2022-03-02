<?php
require 'config.php';
?>

<?= template_header('Create Account') ?>
<?= template_nav_login() ?>

<section class="section">
    <div class="container is-max-desktop">
        <h1 class="title">Register</h1>
        <hr>
        <form action="register_validate.php" method="POST">
            <?php if(isset($_GET['error'])) { ?>
                <p class="error box has-background-warning"> <?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="field is-horizontal">
                <div class="field-body">
                    <div class="field">
                        <label class="label">First Name</label>
                        <p class="control is-expanded">
                            <input name="first_name" class="input" type="text" placeholder="First Name" required>
                        </p>
                    </div>
                    <div class="field">
                        <label class="label">Last Name</label>
                        <p class="control is-expanded">
                            <input name="last_name" class="input" type="text" placeholder="Last Name" required>
                        </p>
                    </div>
                </div>
            </div>
            <div class="field">
                <label class="label">Email</label>
                <p class="control has-icons-left">
                    <input name="email" class="input" type="email" placeholder="Email" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-envelope"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <label class="label">Password</label>
                <p class="control has-icons-left">
                    <input name="password" class="input" type="password" placeholder="Password" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </p>
            </div>
            <div class="field">
                <p class="control">
                    <button class="button is-primary" type="submit">Sign Up</button>
                </p>
            </div>
        </form>
        <p class="mt-2">
            Already have an account? <a id="signInLink" href="login.php">Sign in</a>
        </p>
    </div>
</section>
</body>
</html>