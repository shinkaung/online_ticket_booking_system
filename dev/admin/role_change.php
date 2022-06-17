<?php
include "is_admin.php";
include "configure.php";
$uid = $_GET['id'];
$sql = 'UPDATE `user_info` SET `role`= 2 - (`role` + 1) WHERE `uid` = ?';
$stmt = $connection->prepare($sql);
$stmt->execute([$uid]);
header("Location: admin.php");
?>