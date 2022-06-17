<?php
include "is_admin.php";
include "configure.php";
$tid = $_GET['id'];
$sql = 'DELETE FROM booking_ticket WHERE tid=?';
$stmt = $connection->prepare($sql);
$stmt->execute([$tid]);
header("Location: admin_book_ticket.php");

?>