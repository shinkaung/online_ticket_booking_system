<?php
include "configure.php";
$tid = $_GET['tid'];
$status = $_GET['status'];
if($status == "CONFIRMED"){
	header("Location: look_book_ticket.php");
	return;
}
$sql = "UPDATE `booking_info` SET `status`='CANCELLED' WHERE `tid` = ?";
$stmt = $connection->prepare($sql);
$stmt->execute([$tid]);
header("Location: look_book_ticket.php");
?>