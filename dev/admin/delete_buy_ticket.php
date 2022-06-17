<?php
include "is_admin.php";
include "configure.php";
$tid = $_GET['id'];
$sql = 'DELETE FROM buy_ticket WHERE tid=?';
$stmt = $connection->prepare($sql);
$stmt->execute([$tid]);
header("Location: admin_buy_ticket.php");

?>