<?php
require_once('includes/app.php');

//if not logged in redirect to login page
if (!$auth->is_logged_in()) { header('Location: login.php'); exit(); }

require_once('submit_pay.php');

//define page title
$title = 'Members Page';

require_once('layout/header.php');
?>

<div class="row">
    <div class="col col-lg-1">
    </div>
    <div class="col col-lg-8">
        <h2>Pricing</h2>
        <br>
        <table class="table">
            <?php foreach ($PRICE_LIST as $product) { if(0==$product['pid']){continue;} ?>
                <tr>
                    <td width="70%">
                        <?php echo $product['qty']; ?> Followers
                    </td>
                    <td width="25%">$<?php echo $product['price'] . ' ' . PRICE_CURRENCY; ?></td>
                    <td width="20%">
                    <button type="button" class="btn btn-pill btn-primary mb-3" data-toggle="modal"
                                data-target="#payModal" data-pid="<?= $product['pid'] ?>"
                                data-qty="<?= $product['qty'] ?>" data-price="<?= $product['price'] ?>">
                                Order
                            </button>
                    
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="col col-lg-1">
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="payModal" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="payModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="post" action="" autocomplete="off">
                <div class="modal-body">
                    <span>Please enter your Instagram Info.</span><br>
                    <small>&nbsp;&nbsp;Instagram's URL (example): <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;https://www.instagram.com/zuck/</small>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Instagram's URL:</label>
                        <input type="text" name="link" id="link" class="form-control input-lg" placeholder="Instagram's URL"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="pid_hidden" id="pid_hidden">
                        <input type="hidden" name="email" id="email" value="<?=$_SESSION['email']?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" name="submit_pay" class="btn btn-primary" value="Checkout >">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once('layout/footer.php');
?>