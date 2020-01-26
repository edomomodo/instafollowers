<?php 
require_once('includes/app.php');

if ($auth->is_logged_in()) { header('Location: home.php'); exit();}

if (isset($_POST['submit'])) {
    require_once('classes/plenty.php');
    require_once('includes/database.php');
    if (!isset($db)) {
        $db = getDB();
    }
    $plenty = new Plenty($db);

    //Make sure all POSTS are declared
    if (!isset($_POST['link'])) $errors[] = "Please fill out all fields";
    if (empty($_POST['link'])) $errors[] = "Please fill out all fields";

    if (!isset($errors)) {
        $response = $plenty->getOrSetTest($_POST['link']);
        if (is_array($response)) {
            $result = implode(", ", $response);
        } else {
            $result = $response;
        }
    }

}

require_once('submit_pay.php');

//define page title
$title = 'Demo';

require_once('layout/header.php');
?>

<main id="main">

    <!-- Hero -->
    <section class="container">
        <div class="row">
            <div class="col-12 text-center" style="color:#fff">                
                <?php
                if(isset($_GET['error'])) {
                    echo '<br><h5 class="bg-danger">Error: ' . $_GET['error'] . '</h5>';
                }
                if(isset($_GET['payment'])){
                    echo "<br><h5 class='bg-success'>Success: Payment successful, please check your email for detail.</h5>";
                }
                if(isset($_GET['action'])){
                    if($_GET['action'] == 'joined'){
                        echo "<br><h5 class='bg-success'>Success: Registration successful, please check your email to activate your account.</h5>";
                    }
                    if($_GET['action'] == 'contact'){
                        echo "<br><h5 class='bg-success'>Success: Contact us Send successful.</h5>";
                    }
                }
                ?>
            </div>

        </div>
        <div class="row justify-content-lg-between align-items-lg-center py-5">
            <div class="col-lg-6 col-xl-5 mb-4 text-center text-lg-left">
                <h1 class="display-4 mb-4">Grow your Instagram followers automatically</h1>
                <p class="lead mb-4">Get Instagram followers and make your Instagram followers increase
                    automatically.</p>
            </div>
            <div class="col-lg-6 col-xl-7">
                <img src="img/instagram.png" class="d-none d-lg-block img-fluid" alt="">
            </div>
        </div>
    </section>

    <div class="bg-skew bg-skew-light">

        <!-- Icon blocks -->
        <section class="container">
            <div class="row align-items-center py-5">
                <div class="col-lg-4">
                    <div class="iphone-x mb-5 mx-auto">
                        <div class="screen" style="background-image: url(img/screenshot.png)"></div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-sm-6 mb-6">
                            <div class="media">
                                <span class="icon icon-primary mr-3">
                                    <i class="icon-inner fab fa-accessible-icon" aria-hidden="true"></i>
                                </span>
                                <div class="media-body">
                                    <h3 class="h5 mb-2">Automatic growth</h3>
                                    <p>Forget wasting time on outreach! We will help you to increase your instagram
                                        followers.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-6">
                            <div class="media">
                                <span class="icon icon-primary mr-3">
                                    <i class="icon-inner fas fa-mobile-alt" aria-hidden="true"></i>
                                </span>
                                <div class="media-body">
                                    <h3 class="h5 mb-2">Instant Delivery</h3>
                                    <p>We have instant delivery on all our Instagram followers. As soon as your
                                        payment is verified, instagram followers are credited to your account.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <div class="media">
                                <span class="icon icon-primary mr-3">
                                    <i class="icon-inner fa-font-awesome-flag" aria-hidden="true"></i>
                                </span>
                                <div class="media-body">
                                    <h3 class="h5 mb-2">No Password Required</h3>
                                    <p>We don’t require your password for transactions and your Instagram account
                                        remains 100% secure when you buy IG followers through us.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 mb-4">
                            <div class="media">
                                <span class="icon icon-primary mr-3">
                                    <i class="icon-inner fas fa-code"></i>
                                </span>
                                <div class="media-body">
                                    <h3 class="h5 mb-2">Secure Payment</h3>
                                    <p>We have a secured payment portal which you can use to complete payment. This
                                        makes buying our services safe and easy for you.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- Pricing cards -->
        <section class="container">
            <h3 class="text-center mt-5 mb-4">Choose the plan that suits your needs</h3>
            <div class="row py-5">
                <div class="col-lg-4">
                    <div class="card card-price shadow-lg mb-4">
                        <div class="card-header">
                            <h3 class="h4 font-weight-normal">Silver</h3>
                            <span class="d-block h1 my-2"><span class="h2">$</span><?=$PRICE_LIST[1]['price']?></span>
                            <span class="d-block text-muted"
                                style="text-decoration: line-through;">$<?=$PRICE_LIST[1]['price_off']?></span>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-4">
                                <li class="py-2 text-secondary">
                                    <h3><?=$PRICE_LIST[1]['qty']?> Followers</h3>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-pill btn-outline-primary mb-3" data-toggle="modal"
                                data-target="#payModal" data-pid="<?= $PRICE_LIST[1]['pid'] ?>"
                                data-qty="<?= $PRICE_LIST[1]['qty'] ?>" data-price="<?= $PRICE_LIST[1]['price'] ?>">
                                Get started
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-price card-featured shadow-lg mb-4">
                        <div class="card-header">
                            <h3 class="h4 font-weight-normal">Gold</h3>
                            <span class="d-block h1 my-2"><span class="h2">$</span><?=$PRICE_LIST[2]['price']?></span>
                            <span class="d-block text-muted"
                                style="text-decoration: line-through;">$<?=$PRICE_LIST[2]['price_off']?></span>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-4">
                                <li class="py-2 text-secondary">
                                    <h3><?=$PRICE_LIST[2]['qty']?> Followers</h3>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-pill btn-primary mb-3" data-toggle="modal"
                                data-target="#payModal" data-pid="<?= $PRICE_LIST[2]['pid'] ?>"
                                data-qty="<?= $PRICE_LIST[2]['qty'] ?>" data-price="<?= $PRICE_LIST[2]['price'] ?>">
                                Get started
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card card-price shadow-lg mb-4">
                        <div class="card-header">
                            <h3 class="h4 font-weight-normal">Platinum</h3>
                            <span class="d-block h1 my-2"><span class="h2">$</span><?=$PRICE_LIST[3]['price']?></span>
                            <span class="d-block text-muted"
                                style="text-decoration: line-through;">$<?=$PRICE_LIST[3]['price_off']?></span>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mb-4">
                                <li class="py-2 text-secondary">
                                    <h3><?=$PRICE_LIST[3]['qty']?> Followers</h3>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-pill btn-outline-primary mb-3" data-toggle="modal"
                                data-target="#payModal" data-pid="<?= $PRICE_LIST[3]['pid'] ?>"
                                data-qty="<?= $PRICE_LIST[3]['qty'] ?>" data-price="<?= $PRICE_LIST[3]['price'] ?>">
                                Get started
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div><!-- end bg-skew -->

    <!-- Testimonials -->
    <section class="container" id="check">
        <h2 class="h3 mt-5 mb-4 text-center">Check Orders</h2>
        <div class="row py-5">
            <div class="col-md">

            </div>
            <div class="col-md">
                <blockquote class="bg-white rounded shadow mb-4 p-4 p-lg-5 text-center">

                    <form role="form" method="GET" action="orders.php" autocomplete="off">                        
                        <hr>
                        <?php
                                if (isset($errors)) {
                                    foreach ($errors as $error) {
                                        echo '<p class="bg-danger">' . $error . '</p>';
                                    }
                                }
                                ?>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-lg"
                                placeholder="Email" tabindex="1" required>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-md-6"><input type="submit" name="submit"
                                    value="Check Order" class="btn btn-pill btn-primary" tabindex="2"></div>
                        </div>
                    </form>
                </blockquote>
            </div>
            <div class="col-md">

            </div>
        </div>
    </section>


    <hr class="sep border-primary" role="presentation">

    <!-- Testimonials -->
    <section class="container" id="test">
        <h2 class="h3 mt-5 mb-4 text-center">Try Free Instagram Follower</h2>
        <div class="row py-5">
            <div class="col-md">

            </div>
            <div class="col-md">
                <blockquote class="bg-white rounded shadow mb-4 p-4 p-lg-5 text-center">

                    <form role="form" method="post" action="index.php#test" autocomplete="off">
                        <p>Instagram's URL (example): https://www.instagram.com/zuck/</p>
                        <hr>
                        <?php
                                if (isset($errors)) {
                                    foreach ($errors as $error) {
                                        echo '<p class="bg-danger">' . $error . '</p>';
                                    }
                                }
                                ?>

                        <div class="form-group">
                            <input type="text" name="link" id="link" class="form-control input-lg"
                                placeholder="Instagram's URL" value="<?= isset($_POST['link']) ? $_POST['link'] : '' ?>"
                                tabindex="3" required>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6 col-md-6"><input type="submit" name="submit"
                                    value="Get 1 Free Follower" class="btn btn-pill btn-primary" tabindex="4"></div>
                        </div>
                        <br>
                        <?php if (isset($result)) { ?>
                        <div class="form-group">
                            <h4>Test success.</h4>
                            <h4 style="color: #0b2e13">Follower: <?= $result ?>.</h4>
                        </div>
                        <?php } ?>
                    </form>
                </blockquote>
            </div>
            <div class="col-md">

            </div>
        </div>
    </section>


</main>

<footer class="site-footer mt-5">
    <div class="container">
        <hr class="m-0" role="presentation">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-center mt-4">
            <p class="small text-muted">© <?=APP_NAME . ' ' . date('Y')?></p>
            <ul class="list-inline">
                <li class="list-inline-item">
                <a href="https://www.hitwebcounter.com" target="_blank">
                <img src="https://hitwebcounter.com/counter/counter.php?page=7180072&style=0043&nbdigits=5&type=page&initCount=0" title="Visits Count" Alt="analytics counter"   border="0"></a>  
                </li>            
                <li class="list-inline-item">
                    <a href="contact_us.php">Contact us</a>
                </li>
            </ul>
        </div>
    </div>
</footer>


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
                        <label for="message-text" class="col-form-label">Email:</label>
                        <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email"
                            required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="pid_hidden" id="pid_hidden">
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