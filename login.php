<?php
include 'config.php';
?>

<?= template_header('Login') ?>
<?= template_nav_login() ?>

<section class="section">
    <div class="container is-max-desktop">
        <h1 class="title">Login</h1>
        <hr>
        <form action="login_validate.php" method="POST">
            <?php if(isset($_GET['error'])) { ?>
                <div class="error box has-background-warning"> <?php echo $_GET['error']; ?></div>
            <?php } ?>
            <?php if(isset($_GET['success'])) { ?>
                <p class="success box has-background-primary"> <?php echo $_GET['success']; ?></p>
            <?php } ?>
            <div class="field">
                <label class="label">Email</label>
                <p class="control has-icons-left has-icons-right">
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
                    <button class="button is-primary" type="submit">Login</button>
                </p>
            </div>
        </form>
        <p class="mt-2">
            Don't have an account yet? <a id="signUpLink" href="register.php">Sign up</a>
        </p>
    </div>
</section>
</body>

</html>