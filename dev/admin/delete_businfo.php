<?php
include "is_admin.php";
include "configure.php";
$id = $_GET['id'];
$sql = 'DELETE FROM bus_info WHERE id=?';
$stmt = $connection->prepare($sql);
$stmt->execute([$id]);
header("Location: admin_bus_info.php");
?>