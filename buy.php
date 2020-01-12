<?php require_once('includes/app.php');

if (!isset($_GET['pid']) || empty($_GET['pid'])) {
    header('Location: index.php?error=pid_empty'); exit();
}

if (!isset($_GET['uid']) || empty($_GET['uid'])) {
    header('Location: index.php?error=uid_empty'); exit();
}

if (!isset($_GET['link']) || empty($_GET['link'])) {
    header('Location: index.php?error=link_empty'); exit();
}

$_SESSION['memberID'] = $_GET['uid'];

$item = $PRICE_LIST[$_GET['pid']];

require_once('classes/paypalExpress.php');

//define page title
$title = 'Demo';

//include header template
require_once('layout/header.php');
?>

<div class="container">
	<div class="row">
	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			<form role="form" method="post" action="" autocomplete="off">
				<h2>Checkout</h2>
				<?php
				//check for any errors
				if(isset($error)){
					foreach($error as $error){
						echo '<p class="bg-danger">'.$error.'</p>';
					}
				}
				?>
				<ul class="list-unstyled">
					<li>Link: <?=$_GET['link']?></li>
				</ul>
                <table class="table">
                    <tr>
                        <td width="30%">Qty: <?=$item['qty']?></td>
                        <td width="30%">Price: <?=$item['price']?></td>
                        <td width="20%"><?php require_once('paypalButtonFront.php'); ?></td>
                    </tr>
                </table>
			</form>
		</div>
	</div>
</div>

<?php
require_once('layout/footer.php');
?>
