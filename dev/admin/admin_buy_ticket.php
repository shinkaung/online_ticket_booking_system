<?php
include "is_admin.php";
include "configure.php";
$sql = "SELECT * FROM booking_info";
$stmt = $connection->prepare($sql);
$stmt->execute();
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
    <h2>Already Buy Tickets Information</h2>
    <ul>
      <li>Admin panel of Already Buying Tickets information</li><br>
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
               <th>Trip Path</th>
               <th>Departure Time</th>
               <th>Arrival Time</th>
               <th>seat No.</th>
               <th>Total Price</th>
               <th>User Id</th>
               <th>payment Id</th>
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
                 <?php echo $row['tid']; ?>
               </td>
               <td>
                  <?php echo $row['busoperator']; ?>
               </td>
               <td>
                  <?php echo $row['route']; ?>
               </td>
               <td>
                  <?php echo $row['departuretime']; ?>
               </td>
               <td>
                  <?php echo $row['arrivaltime']; ?>
               </td>
               <td>
                  <?php echo $row['seatno']; ?>
               </td>
               <td>
                  <?php echo $row['totalprice']; ?>
               </td>
               <td>
                  <?php echo $row['uid']; ?>
               </td>
               <td>
                  <?php echo $row['pid']; ?>
               </td>
               <td>
                 <a onclick="return confirm('Are you want to Delete?')" href="delete_buy_ticket.php?id=<?php echo $row['tid'];?>" id = "delete-btn" >Delete</a>
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
