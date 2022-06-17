<?php 
session_start();
include "configure.php";
if(isset($_POST['buy_btn'])){
    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM payment WHERE uid = ?";
    $stmt = $connection->prepare($sql); 
    $stmt->execute([$uid]);
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch();
        $pid = $user['pid'];
    }
    $bus_operator = $_SESSION['bus_operator'];
    $trip_path = $_SESSION['trip_path'];
    $departs = $_SESSION['departs'];
    $arrives = $_SESSION['arrives'];
    $seatnum = $_SESSION['seatno'];
    $bus_ticket_price = $_SESSION['bus_ticket_price'];
    $sql = "INSERT INTO buy_ticket(busoperator, route, departuretime, arrivaltime, seatno, totalprice, uid, pid) VALUES(?,?,?,?,?,?,?,?)";
    $stmt = $connection->prepare($sql);
    if($stmt->execute([$bus_operator, $trip_path, $departs, $arrives, $seatnum, $bus_ticket_price, $uid, $pid])){
        header("Location: book_ticket.php");
    }else{
        echo '<script>alert("Data Update Fail!")</script>';
    }
   

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="book_ticket.css">
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
              <li><a href="Contact.php">Contact</a></li>
              <li><a href="About.html">About</a></li>
              <li><a href="Login.html">Logout</a></li>
          </ul>
        </div>
      </div>
  </header>
<!------------------------------- Body design code ---------------------------------->
<form method = "POST">
    <div id = "book-ticket-body">
        <div id = "book-ticket-slip">
            <div id = "book-ticket-logo">
                <img src="images/logo.png">
            </div>
            <table style="width:100%">
                <tr>
                    <td>Bus Operator</td>
                    <td><?php echo $_SESSION['bus_operator']; ?></td>
                </tr>
                <tr>
                    <td>Route</td>
                    <td><?php echo $_SESSION['trip_path']; ?></td>
                </tr>
                <tr>
                    <td>Departure Time</td>
                    <td><?php echo $_SESSION['departs']; ?></td>
                </tr>
                <tr>
                    <td>Arrival Time</td>
                    <td><?php echo $_SESSION['arrives']; ?></td>
                </tr>
                <tr>
                    <td>Seat No.</td>
                    <td><?php echo $_SESSION['seatno']; ?></td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td><?php echo $_SESSION['bus_ticket_price']; ?></td>
                </tr>
                </table>
                <button name = "buy_btn">Buy Now</button>
        </div>
    </div>
</form>
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