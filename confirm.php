<?php
include 'config.php';

session_start();

$_SESSION['cart'] = array();
?>

<?= template_header('Order Placed') ?>

<section class="section is-medium">
      <div class="container p-5 is-max-desktop has-text-centered">
          <h1 class="title">Order Confirmed</h1>
          <p class="subtitle">Thank you for your order.</p>
          <a href="dashboard.php" class="button is-primary">Return to dashboard</a>
          <br>
          <a href="logout.php" class="button is-primary is-light mt-3">Logout</a>
      </div>
  </section>
</body>

</html>