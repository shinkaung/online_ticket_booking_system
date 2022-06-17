<?php
session_start();
include "is_admin.php";
include "configure.php";
$sql = "SELECT * FROM user_info";
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
    <h2>User accounts</h2>
    <ul>
      <li>Admin panel of user accounts information</li><br>
      <a href="create_user_account.php" id = "create-user-btn">Create User Accounts</a>
    </ul>
  </section>
  <section class="panel important">
      <form action="" method="post">
      <table>
<!--   The Head of The Table -->
       <thead>
           <tr>
               <th>ID</th>
               <th>Username</th>
               <th>Email</th>
               <th>Role</th>
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
                 <?php echo $row['uid']; ?>
               </td>
               <td>
                  <?php echo $row['username']; ?>
               </td>
               <td>
                  <?php echo $row['email']; ?>
               </td>
               <td>
                   <?php echo $row['role'] ? 'Admin' : 'User'; ?>
               </td>
               <td>
                 <a href="role_change.php?id=<?php echo $row['uid'];?>" id = "update-btn" >Change Role</a><br>
                 <a onclick="return confirm('Are you want to Delete?')" href="delete_user_accounts.php?id=<?php echo $row['uid'];?>" id = "delete-btn" >Delete</a>
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
