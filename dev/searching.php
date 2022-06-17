<?php
session_start();
    $from = $_GET['from'];
    $to = $_GET['to'];
    $date = $_GET['date'];
    include "configure.php";
    $sql = "SELECT * FROM bus_info WHERE r_from = :fromplace AND r_to = :toplace";
    if($stmt = $connection->prepare($sql)){
        $stmt->bindParam(":fromplace", $from);
        $stmt->bindParam(":toplace", $to);
        $stmt->execute();
    } 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="searching.css">
  <link rel="stylesheet" type="text/css" href="index.css">
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

    <!------------------------------- Searching Ticket Code ---------------------------------->
  <form method="POST" action=seat.php>
    <div id="search-div">
      <div id="search-trip">
        <div id="search-title">
          <h3>Search Trip</h3>
        </div>
        <div id="search-info">
          <div id="search-from">
            <div id="search-from-logo">
              <img src="images/bus.png" width="30px" height="30px">
            </div>
            <div id="search-from-combo">
                  <select id="from-trip">
                    <option><?php echo $from; ?></option>
                  </select>
            </div>
          </div>
          <div id="search-to">
            <div id="search-from-logo">
              <img src="images/placeholder.png" width="30px" height="30px">
            </div>
            <div id="search-from-combo">
                  <select id="from-trip">
                    <option><?php echo $to; ?></option>
                  </select>
            </div>
          </div>
          <div id="search-date">
            <div id="search-from-logo">
              <img src="images/calendar.png" width="30px" height="30px">
            </div>
            <div id="search-from-combo">
              <input type="text" value="<?php echo $date; ?>">
            </div>
          </div>
          <div id="search-button">
              <a href="index.php" id="back-btn">Back</a>
          </div>
        </div>
      </div>
    </div>
    <!---------------------------- Output of Searching Code --------------------------------------->
      <div id="output-search">
      <div id="search-output">
          <div id="Yangon-Mandalay-Day">

            <?php 
                while($row = $stmt->fetch()){
            ?>
            <div id="YM-bus">
              <div id="YM-info">
                <h3><?php echo $row['d_time']; ?> - Scania - Standard</h3>
                <p><?php echo $row['route']; ?> </p>
                <p>Departs : <?php echo $row['d_time']; ?></p>
                <p>Arrives : 06:00 PM Duration : 11 Hours</p>
              </div>
              <div id="YM-logo">
                <img src="images/<?php echo $row['logo']; ?>">
                <p><?php echo $row['bus_name']; ?></p>
              </div>
              <div id="YM-btn">
                <h2>MMK <?php echo $row['price']; ?></h2>
                <p>1 seat x MMK <?php echo $row['price']; ?></p>
                <a href="<?php echo '/dev/seat.php?bid='.$row['id'].'&date='.$date?>" id="back-btn">SELECT SEAT</a>
              </div>
            </div>
            <?php 
                }
            ?>
          </div>
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