<?php
include 'config.php';
session_start();

// Check if a cart doesn't exist
if(!(isset($_SESSION['cart']))) {
  $_SESSION['cart'] = array();
}

$out = "";

if(isset($_GET['product_id'])) {
  $product_id = $_GET['product_id'];
  $quantity = $_GET['quantity'];

  // Check the validity of the quantity
  if($quantity > 0) {
    if (isset($_SESSION['cart'][$product_id])) {
      $_SESSION['cart'][$product_id] += $quantity;
    } else {
      $_SESSION['cart'][$product_id] = $quantity;
    }
    header("Location:dashboard.php?added=Item added to cart");
  } else {
    $out="Not a valid quantity";
  }
}

$sql = "SELECT * FROM ServeSideSuperProducts";
$result = mysqli_query($conn, $sql);
?>

<?= template_header('Browse Produce') ?>
<?= template_nav_dashboard() ?>
<section class="section">
  <div class="container">
    <h1 class="title has-text-centered">Hello <?php echo $_SESSION['first_name']; ?></h1>
    <h1 class="subtitle has-text-centered">Start shopping for fresh produce near you</h1>
    <hr>
    <?php if (isset($_GET['complete'])) { ?>
      <div class="complete box has-background-primary has-text-light has-text-centered has-text-weight-bold is-size-4"> <?php echo $_GET['complete']; ?></div>
    <?php } ?>
    <?php if (isset($_GET['added'])) { ?>
      <div class="added box has-background-primary has-text-light has-text-centered has-text-weight-bold is-size-4"> <?php echo $_GET['added']; ?></div>
    <?php } ?>
    <div class="columns is-multiline">
      <?php
      while ($record = mysqli_fetch_assoc($result)) {
      ?>
        <div class="column is-one-third">
          <div class="card">
            <div class="card-image">
              <figure class="image is-4by3">
                <img src="./images/<?php echo $record['product_img']; ?>" alt="produce image">
              </figure>
            </div>
            <div class="card-content">
              <h1 class="title is-4"><?php echo $record['name']; ?></h1>
              <h2 class="subtitle is-6">$<?php echo $record['price']; ?></h2>
              <p><?php echo $record['description']; ?></p>
            </div>
            <footer class="card-footer">
              <div class="card-footer-item">
                <form action="dashboard.php" method="get">
                  <input class="input is-primary" type="number" name="quantity" id="quantity" value="0" min="1" max="<?= $record['quantity'] ?>">
                  <input type="hidden" name="product_id" value="<?= $record['product_id'] ?>">
                  <input type="submit" name="add" value="Add to Cart" class="button is-primary">
                </form>
              </div>
            </footer>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  </div>
</section>
</body>

</html>