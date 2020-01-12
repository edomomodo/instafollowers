<?php

require_once('includes/app.php');

//logout
$auth->logout();

//logged in return to index page
header('Location: index.php');
exit;
