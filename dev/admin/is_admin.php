<?php
session_start();
if($_SESSION['role'] == 0){
    header("Location: ../login.php");
    exit();
}
?>