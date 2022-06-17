<?php 
include "is_admin.php";
include "configure.php";
$status = $_GET['status'];
$tid = $_GET['id'];
if($status == 0){
	$update_sql = 'UPDATE `booking_info` SET `status`= "CONFIRMED" WHERE `tid` = ?';
	$stmt = $connection->prepare($update_sql);
	$stmt->execute([$tid]);
} else {
	$sql = 'DELETE FROM booking_info WHERE tid=?';
	$stmt = $connection->prepare($sql);
	$stmt->execute([$tid]);
}
header("Location: admin_book_ticket.php");
?>