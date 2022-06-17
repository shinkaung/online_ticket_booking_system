<?php 
include "is_admin.php";
include "configure.php";
if(isset($_POST['create'])){
  $busoperator = $_POST['busoperator'];
  $fromplace = $_POST['fromplace'];
  $toplace = $_POST['toplace'];
  $departuretime = $_POST['departuretime'];
  $price = $_POST['price'];
  $route = $fromplace.' - '.$toplace;

  $file_name = $_FILES['image']['name'];
  $file_tmp =$_FILES['image']['tmp_name'];
  $file_type=$_FILES['image']['type'];
  $target_file = "../images/".$file_name;
  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
  $extensions= array("jpeg","jpg","png");
  if(in_array($file_ext,$extensions)=== false){
    echo '<script>alert("extensions not allowed!!")</script>';

  } else if(move_uploaded_file($file_tmp, $target_file)){
    $sql = "INSERT INTO bus_info(bus_name, r_from, r_to, d_time, price, logo, seat, route) VALUES(?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    if($stmt->execute([$busoperator,$fromplace,$toplace,$departuretime,$price,$file_name,44,$route])){

      echo '<script>alert("Bus Information insert Successfull!!")</script>';
    }else{
      echo '<script>alert("Bus Information insert Fail!!")</script>';
    }
  }else{
    echo '<script>alert("File Uploading Error!!")</script>';
  }
    //header("Location: admin_bus_info.php");
}
?>
<link rel="stylesheet" type="text/css" href="admin.css">
<header role="banner">
  <h1>Admin Panel</h1>
  <ul class="utilities">
    <br>
    <li class="logout warn"><a href="admin.php">Back</a></li>
    <li class="users"><a href="#">Admin Account</a></li>
    <li class="logout warn"><a href="../login.html">Log Out</a></li>
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
    <h2>Bus Information</h2>
    <ul>
      <li>Adminal panel of Bus Information</li><br>
    </ul>
  </section>

  <section class="panel important">
    <h2><u>Insert Bus Information</u></h2>
    <form id="user-edit" method="POST" enctype="multipart/form-data">
      <lable>Bus Operator</lable><br>
      <input type="text" name = "busoperator" placeholder = "Enter Bus Operator"><br><br>
      <lable>From Place</lable><br>
      <input type="text" name = "fromplace" placeholder = "Enter From Place"><br><br>
      <lable>To Place</lable><br>
      <input type="text" name = "toplace" placeholder = "Enter To Place"><br><br>
      <lable>Departure Time</lable><br>
      <input type="text" name = "departuretime" placeholder = "Enter Departure Time"><br><br>
      <lable>Price</lable><br>
      <input type="text" name = "price" placeholder = "Enter Bus Seat Price"><br><br>
      <lable>Images</lable><br>
      <input type="file" name = "image" placeholder = "Enter Bus Operator image"><br><br>
      <input type="submit" id ="update-btn" name ="create" value="Insert">
    </form>
  </section>

</main>
