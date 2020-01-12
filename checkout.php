<?php
require_once('includes/app.php');

//if not logged in redirect to login page
if(!$auth->is_logged_in()){ header('Location: login.php'); exit(); }
require_once('classes/paypalExpress.php');
require_once('includes/database.php');

if (!isset($_GET['pid']) || empty($_GET['pid'])) {
    header('Location: home.php'); exit();
}

$product = $PRICE_LIST[$_GET['pid']];

//define page title
$title = 'Checkout';

//include header template
require_once('layout/header.php');
?>

<div class="row">
    <div class="col col-lg-1">
    </div>
    <div class="col col-lg-8">
        <h2>Checkout</h2>
        <br>
    <br>

        <table class="table">
        <tr>
          <td width="70%"><?php echo $product['qty']; ?></td>
          <td width="10%">$
            <?php echo $product['price']; ?>
          </td>
          <td width="20%">
          <?php require_once('paypalButton.php'); ?>
          </td>
        </tr>
    </table>
    </div>
    <div class="col col-lg-1">
    </div>
</div>

<?php
require_once('layout/footer.php');
?>
