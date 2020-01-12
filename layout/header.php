<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/theme.min.css">
    <link rel="stylesheet" href="css/main.css">
    <title><?=APP_NAME?></title>
</head>
<body>
    <header class="site-header">
        <a href="app.html#main" class="sr-only sr-only-focusable">Skip to main content</a>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light py-3" aria-label="Main navigation">
                <a class="navbar-brand text-dark" href="index.php">
                    <b><?=APP_NAME?></b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav align-items-lg-center text-uppercase pt-3 pt-lg-0 ml-auto">
                        <?php
                        if ($auth->is_logged_in()) {
                         ?>
                        <li class="nav-item">
                            <a class="nav-link" href="home.php">Pricing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="orders.php">Orders</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="DropdownMenu" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <?php echo htmlspecialchars(substr($_SESSION['email'],0, strpos($_SESSION['email'], '@') + 1), ENT_QUOTES); ?>
                                <img src="img/chevron-down.svg"></a>
                            <div class="dropdown-menu mb-2" aria-labelledby="DropdownMenu">
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">LOGIN</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">REGISTER</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>