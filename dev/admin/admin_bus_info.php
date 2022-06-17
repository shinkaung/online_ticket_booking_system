<?php
include "is_admin.php";
include "configure.php";
$sql = "SELECT * FROM bus_info";
$stmt = $connection->prepare($sql);
$stmt->execute();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="admin.css">
<header role="banner">
  <h1>Admin Panel</h1>
  <ul class="utilities">
    <br>
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
    <h2>Bus Information</h2>
    <ul>
      <li>Admin panel of Bus Information</li><br>
      <a href="insert_new_businfo.php" id = "create-user-btn">Insert New Bus Information</a>
    </ul>
  </section>
  <section class="panel important">
      <form action="" method="post">
      <table>
<!--   The Head of The Table -->
       <thead>
           <tr>
               <th>ID</th>
               <th>Bus Operator</th>
               <th>Route</th>
               <th>Departure Time</th>
               <th>Price</th>
               <th>Logo</th>
               <th>Function</th>
           </tr>
<!--  End of The Head -->
       </thead>
<!--   The Body of The Table -->
       <tbody>
<!--          First Row -->
<?php 
     while($row = $stmt->fetch()){
?>
           <tr>
               <td>
                 <?php echo $row['id']; ?>
               </td>
               <td>
                  <?php echo $row['bus_name']; ?>
               </td>
               <td>
                  <?php echo $row['route']; ?>
               </td>
               <td>
                  <?php echo $row['d_time']; ?>
               </td>
               <td>
                    <?php echo $row['price']; ?>
               </td>
               <td>
                  <img src="../images/<?php echo $row['logo']; ?>"> 
               </td>
               <td>
                 <!--<a href="edit.php?id=<?php echo $row['id'];?>" id = "update-btn" >Update</a><br>-->
                 <a onclick="return confirm('Are you want to Delete?')" href="delete_businfo.php?id=<?php echo $row['id'];?>" id = "delete-btn" >Delete</a>
               </td>
           </tr>
<?php 
    }
?>

<!-- End of The of The Table -->
      </tbody>
<!-- End of The Table -->
   </table>
      </form>
  </section>


</main>
