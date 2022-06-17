<?php 
include "configure.php";
session_start();
if(!isset($_SESSION['uid'])){
    header("Location: index.php");
    return;
}
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM `booking_info` AS `bi` LEFT JOIN `bus_info` ON `bi`.`bid` = `bus_info`.`id` WHERE `bi`.`uid` = ? ORDER BY `bi`.`tid` DESC LIMIT 10";
$stmt = $connection->prepare($sql); 
$stmt->execute([$uid]);
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="look_book_ticket.css">
  <title></title>
</head>
<body>
<!------------------------------- Header Noti code ---------------------------------->
<header> 
      <div id="noti">
          <div id="logo">
              <img src="images/logo.png">
          </div>
        <div>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="look_book_ticket.php">Book Ticket</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="auth.php?s=<?php echo isset($_SESSION['uid']) ? 'logout' :'login'; ?>"><?php echo isset($_SESSION['uid']) ? 'Logout' :'Login'; ?></a></li>
          </ul>
        </div>
      </div>
  </header>
<!------------------------------- Body code ---------------------------------->
    <div id="booking_body">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Bus Operator</th>
                    <th>Trip Path</th>
                    <th>Departure Time</th>
                    <th>Seat No</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Function</th>

                </tr>
            </thead>
            <tbody>
<?php 
     while($user = $stmt->fetch()){
?>
                <tr>
                    <td><?php echo $user['bus_name']; ?></td>
                    <td><?php echo $user['route']; ?></td>
                    <td><?php echo $user['d_time']; ?></td>
                    <td><?php echo $user['seat_no']; ?></td>
                    <td><?php echo $user['price']; ?></td>
                    <td><?php echo $user['status']; ?></td>
                    <td>
                        <a onclick="return confirm('Do you want to cancel booking?')" href="booking_cancel.php?tid=<?php echo $user['tid'];?>&status=<?php echo $user['status']; ?>" id = "delete-btn" >Cancel</a>
                        </td>
                </tr>
<?php 
    }
?>
            </tbody>
        </table>
    </div>

  <!---------------------------- Footer Code --------------------------------------->
  <footer>
      <div id="footer">
          <div id="footer-contact">
              <div id="footer-logo"></diV>
              <div id="contact">
                  <h2>Contact</h2>
                  <p>09 777 111 811, 09 76543 0471, 09 76543 0474</p>
                  <p><a herf="About.html">Ask a question</a></p>
              </div>
          </div>
          <div id="footer-info">
              <h2>INFORMATION</h2><br>
              <p><a herf="#">Find/Print Your Ticket</a></p>
              <p><a herf="#">How to Open MPU Ecommerce</a></p>
              <p><a her="#">How to buy using bank Transfer</a></p>
          </div>
          <div id="footer-legal">
              <h2>LEGAL</h2><br>
              <p><a herf="termscondition.html">Terms & Conditions</a></p>
              <p><a herf="#">Privacy Policy</a></p>
          </div>
      </div>
  </footer>
</body>
</html>