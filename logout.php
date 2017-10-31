<?php
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['userSession'])) {
	header("Location: index.php");
} else if (isset($_SESSION['userSession'])!="") {
	header("Location: home.php");
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['userSession']);
	$update = ("UPDATE tbl_users SET status='Offline'");
	$DBcon->query($update);
	header("Location: index.php");
}
