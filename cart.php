<?php
include 'config.php';
session_start();

if(!(isset($_SESSION['cart']))) {
    $_SESSION['cart'];
}

$cart_item = $_SESSION['cart'];
?>

<?= template_header('Your Cart') ?>
<?= template_nav_cart() ?>

<section class="section">
    <a class="button is-primary" href="dashboard.php">
        <span class="icon">
            <i class="fas fa-arrow-left"></i>
        </span>
        <span><strong>Back</strong></span>
    </a>
    <div class="container mt-5">
        <h1 class="title">Your Cart</h1>
        <hr>
        <div class="columns is-desktop">
            <div class="column is-three-fifths">
                <?php
                $grandtotal = 0;
                foreach($cart_item as $key => $val) {
                    $sql = "SELECT * FROM ServeSideSuperProducts WHERE product_id = '$key'";
                    $result = mysqli_query($conn, $sql);
                    $record = mysqli_fetch_assoc($result);
                    $subtotal = $val*$record['price'];
                    $grandtotal += $subtotal;
                    ?>
                    <div class="box">
                    <div class="columns is-mobile is-vcentered">
                        <div class="column is-quarter">
                            <figure class="image is-128x128">
                                <img src="./images/<?php echo $record['product_img']; ?>">
                            </figure>
                        </div>
                        <div class="column is-three-fifths">
                            <h1 class="title is-size-4"><?php echo $record['name']; ?></h1>
                            <h2 class="subtitle is-size-6 mb-3">$<?php echo $record['price'];?> x <?php echo $val;?></h2>
                        </div>
                        <div class="column is-one-fifth">
                            <h1 class="title">$<?php echo number_format((float)$subtotal, 2, '.', '');?></h1>
                        </div>
                    </div>
                </div>
                <?php
                }
                if (empty($_SESSION['cart'])) {
                    echo "<h1 class='subtitle'>No items in cart.</h1>";
                }
                ?>
            </div>
            <div class="column box is-two-fifths has-background-light p-5">
                <div class="columns is-mobile mt-2">
                    <div class="column is-two-thirds">
                        <h1 class="title">Total</h1>
                    </div>
                    <div class="column">
                        <h1 class="title">$<?php
                        echo number_format((float)$grandtotal, 2, '.', '');?></h1>
                    </div>
                </div>
                <hr class="has-background-grey-lighter">
                <h1><strong>Pickup Location</strong></h1>
                <p> 1234 Fruit Drive, Fruitland, OR 98765 </p>
                <br>
                <h1><strong>Merchant Notes</strong></h1>
                <p>
                    Payment is <strong> cash only.</strong> Please have the full amount upon arrival.
                </p>
                <br>
                <p>
                    Orders will be held until <strong>8pm</strong>
                </p>
                <br>
                <div class="has-text-centered mt-6">
                    <a href="confirm.php" class="button is-primary">Confirm Order</a>
                </div>
            </div>
        </div>
    </div>
  </section>
</body>

</html>