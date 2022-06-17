<?php
    session_start();
    date_default_timezone_set("Asia/Yangon");
    include "configure.php";
    $seatArr = explode(",", $_POST['select_seat']);
    $uid = $_SESSION['uid'];
    $bid = $_POST['bid'];
    $bdate = $_POST['date'];
    $btime = date("Y-m-d h:i a");
    $sql = "SELECT * FROM bus_info WHERE id = $bid";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $total = 0;
    $bus_name = '';
    $route = '';
    $dtime = '';
    $seatno = $_POST['select_seat'];
    while($row = $stmt->fetch()){
        $total = $row['price'] * count($seatArr);
        $bus_name = $row['bus_name'];
        $route = $row['route'];
        $dtime = $row['d_time'];
    }
    try{
        $connection->beginTransaction();
        foreach ($seatArr as $value) {
            $insert_sql = "INSERT INTO `booking_info`(`uid`, `bid`, `seat_no`, `status`, `b_date`, `b_time`) VALUES ($uid, $bid, $value, 'PENDING', '$bdate', '$btime')";
            $connection->exec($insert_sql);
        }
        $connection->commit();
        #header("Location: book_ticket.php?tid=$bid");
    }catch(PDOException $e){
        header("Location: seat.php?bid=$bid&date=$bdate");
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
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                    <li><a href="auth.php?s=<?php echo isset($_SESSION['uid']) ? 'logout' :'login'; ?>"><?php echo isset($_SESSION['uid']) ? 'Logout' :'Login'; ?></a></li>
          </ul>
        </div>
      </div>
  </header>
<!------------------------------- Body design code ---------------------------------->
    <div id = "book-ticket-body">
        <div id = "book-ticket-slip">
            <div id = "book-ticket-logo">
                <img src="images/logo.png">
            </div>
            <table style="width:100%">
                <tr>
                    <td>Bus Operator</td>
                    <td><?php echo $bus_name; ?></td>
                </tr>
                <tr>
                    <td>Route</td>
                    <td><?php echo $route; ?></td>
                </tr>
                <tr>
                    <td>Departure Time</td>
                    <td><?php echo $dtime; ?></td>
                </tr>
                <tr>
                    <td>Seat No.</td>
                    <td><?php echo $seatno; ?></td>
                </tr>
                <tr>
                    <td>Total Price</td>
                    <td><?php echo $total; ?></td>
                </tr>
                </table>
        </div>
    </div>

<!---------------------------- Footer Code --------------------------------------->
    <footer>
      <div id="footer">
          <div id="footer-contact">
              <div id="footer-logo"></diV>
              <div id="contact">
                  <h2>Contact</h2>
                  <p>09 777 111 811, 09 76543 0471, 09 76543 0474</p>
                  <p><a herf="#">Ask a question</a></p>
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
              <p><a herf="#">Terms & Conditions</a></p>
              <p><a herf="#">Privacy Policy</a></p>
          </div>
      </div>
  </footer>
</body>
</html>