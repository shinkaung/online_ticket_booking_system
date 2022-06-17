<?php 
include "is_admin.php";
include "configure.php";
if(isset($_POST['create'])){
  $username = $_POST['uname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $com_password = $_POST['repassword'];
  if ($password == $com_password){
    //$pass = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user_info(username, email, password, role) VALUES(?,?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$username, $email, $password, 0]);
    echo '<script>alert("Account Created Successfull!!")</script>';
    header("Location: admin.php");
}else{
    echo '<script>alert("Password are not the same!!")</script>';
  }
}
?>
<link rel="stylesheet" type="text/css" href="admin.css">
<header role="banner">
  <h1>Admin Panel</h1>
  <ul class="utilities">
    <br>
    <li class="logout warn"><a href="admin.php">Back</a></li>
    <li class="users"><a href="#">Admin Account</a></li>
    <li class="logout warn"><a href="../auth.php?s=logout">Log Out</a></li>
  </ul>
</header>
<nav role='navigation'>
  <ul class="main">
    <li class="dashboard"><a href="admin.php">Dashboard</a></li>
    <li class="users"><a href="admin.php">User accounts</a></li>
    <li class="edit"><a href="admin_bus_info.php">Bus Information</a></li>
    <li class=""><a href="admin_book_ticket.php">Booking Tickets</a></li>
    <li class="comments"><a href="admin_report.php">Feedbacks</a></li>
  </ul>
</nav>

<main role="main">
  
  <section class="panel important">
    <h2>User accounts</h2>
    <ul>
      <li>Adminal panel of user accounts information</li><br>
      <a href="create_user_account.php" id = "create-user-btn">Create User Accounts</a>
    </ul>
  </section>

  <section class="panel important">
    <h2><u>Create User Accounts</u></h2>
    <form id="user-edit" method="POST">
      <lable>User Name</lable><br>
      <input type="text" name = "uname" placeholder = "Enter User Name"><br><br>
      <lable>Email Address</lable><br>
      <input type="text" name = "email" placeholder = "Enter Email Address"><br><br>
      <lable>Password</lable><br>
      <input type="password" name = "password" placeholder = "Enter Password"><br><br>
      <lable>Confirm Password</lable><br>
      <input type="password" name = "repassword" placeholder = "Enter Repeat Password"><br><br>
      <input type="submit" id ="update-btn" name ="create" value="Create">
    </form>
  </section>

</main>
