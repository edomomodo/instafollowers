<?php
ob_start();
session_start();
require_once('includes/config.php');
require_once('classes/auth.php');
$auth = new Auth();

