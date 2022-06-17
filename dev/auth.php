<?php
session_start();
$status = $_GET['s'];
if($status == 'logout'){
	unset($_SESSION['uid']);
	header("Location: login.php");
} else {
	header("Location: login.php");
}
?>