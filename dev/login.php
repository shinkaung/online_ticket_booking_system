<?php
session_start();
include "configure.php";
if(isset($_POST['submit'])){
    if(isset($_POST['username']) && 
    isset($_POST['pass'])){
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $sql = "SELECT * FROM user_info WHERE username = ? AND password = ?";
        $stmt = $connection->prepare($sql); 
        $stmt->execute([$username,$password]);

        if($stmt->rowCount() == 1){
            $user = $stmt->fetch();
            $uid = $user['uid'];
            $uname = $user['username'];
            $pass = $user['password'];
            $email = $user['email'];
            $role = $user['role'];
            if($role == 1){
                header("Location: /dev/admin/admin.php");
            } else {
                header("Location: index.php");
            }
            $_SESSION['uid'] = $uid;
            $_SESSION['role'] = $role; 
        } else {
            echo '<script>alert("Username or Password is not correct!!")</script>';
    }
      }else {
        header("Location: login.php");
    } 
  }   
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="login.css">
  <title></title>
</head>
<body>
  <div class="full-screen-container">
    <div class="login-container">
      <h3 class="login-title">Login</h3>
      <form method="POST" action="login.php">
        <div class="input-group">
          <label>User-Name</label>
          <input type="text" class="form__input" name="username"  maxlength="20" required placeholder="Enter the Username"> 
        </div>
        <div class="input-group">
          <label>Password</label>
          <input type="password" class="form__input" name="pass" maxlength="20" required placeholder="Enter Password"> 
        </div>
        <button type="submit" class="login-button" name="submit">Login</button>
        <p>If you are not a member please sign up here. <a href="registration.php">Sign up</a></p>
      </form>
    </div>
  </div>
</body>
</html>