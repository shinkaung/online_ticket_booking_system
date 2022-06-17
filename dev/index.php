<?php
session_start();
date_default_timezone_set("Asia/Yangon");
if(isset($_POST['submit'])){
    $date = $_POST['date'];
    $c_date = date("Y-m-d");
    $from = $_POST['from'];
    $to = $_POST['to'];
    $link = 'searching.php?from='.$from.'&to='.$to.'&date='.$date;
    if($date >= $c_date){
        header("Location: $link");
    } else {
        echo '<script>window.alert("Not Available Date!!")</script>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
 
    <!------------------------------ Searching HTML Code ------------------------------>
    <form action="index.php" method="post">
        <div id="mid">
            <div id="intro">
            <h1>Book Online Bus Ticket</h1>
                <p>The leading bus ticketing system in Myanmar. Find the </p>
                <p>best price for your bus tickets.</p>
                <div id="operator">
                    <div id="onum"><b>70+</b></div>
                    <div id="opt">Operators</div>
                </div>
                <div id="secure_payment">
                    <div id="c_logo">
                    <img src="images/correct.png" width="20px" height="20px">
                    </div>
                    <div id="secure">Secure and Fast Payment</div>
                </div>
            </div>
            <div id="search-ticket">
                <div id="title-search"><b>Search Trip</b></div>
                <div id="starting-point">
                    <div id="from-logo">
                    <img src="images/bus.png" width="30px" height="30px">
                    </div>
                    <div id="from-combo">
                        <select id="from-place" name="from">
                            <option>Select City</option>
                            <option value="Yangon">Yangon</option>
                            <option value="Naypyidaw">Naypyidaw</option>
                            <option value="Mandalay">Mandalay</option>
                            <option value="TaungGyi">Taung Gyi</option>
                        </select>
                    </div>
                </div>
                <div id="destination-point">
                    <div id="dest-logo">
                    <img src="images/placeholder.png" width="30px" height="30px">
                    </div>
                    <div id="dest-combo">
                        <select id="to-place" name="to">
                            <option>Select City</option>
                            <option value="Yangon">Yangon</option>
                            <option value="Naypyidaw">Naypyidaw</option>
                            <option value="Mandalay">Mandalay</option>
                            <option value="TaungGyi">Taung Gyi</option>
                        </select>
                    </div>
                </div>
                <div id="calendar">
                    <div id="calendar-logo">
                        <img src="images/calendar.png" width="30px" height="30px">
                    </div>
                    <div id="im-calendar">
                        <input type="date" id="show-calendar" name="date" value="mm-dd-yyyy">
                    </div>
                </div>
                <div id="button-div">
                    <button class="button" name="submit">Search Now</button>
                </div>
            </div>
        </div>
    <!------------------------------- Help Center Code --------------------------------->
        <div id="help-div">
            <div id="bus-operator">
                <div id="bus-logo">
                    <img src="images/yellowbus.png" width="80px" height="80px">
                </div>
                <div id="bus-info">
                    <h2>70+ Bus Operators</h2>
                    <p>Choose from 70+ major bus operators covering 200 destinations.</p>
                </div>
                
            </div>
            <div id="instant-booking">
                <div id="bus-logo">
                    <img src="images/stopwatch.png" width="80px" height="80px">
                </div>
                <div id="bus-info">
                    <h2>Instant Booking</h2>
                    <p>Book your trip in less than 5 min. Instant confirmation after payment.</p>
                </div>
                
            </div>
            <div id="Secure-payment">
            <div id="bus-logo">
                    <img src="images/credit-card.png" width="80px" height="80px">
                </div>
                <div id="bus-info">
                    <h2>Secure Payment</h2>
                    <p>Pay with VISA, MASTER, MPU, WaveMoney, CBPay, KBZPay and MABPay.</p>
                </div>
                
            </div>
            <div id="Help">
            <div id="bus-logo">
                    <img src="images/help.png" width="80px" height="80px">
                </div>
                <div id="bus-info">
                    <h2>Help 24/7</h2>
                    <p>Our support center is available 24/7 for your questions and concerns.</p>
                </div>
                
            </div>
        </div>

    <!-------------------------------- Popular Routes Code ---------------------------->    
        <div id="popular-trip"> 
            <div id="popular-title">
                <h1>Popular Routes</h1>
            </div>
            <div id="bus-operator">
                <div id="Yan-Man">
                    
                </div>
                
            </div>
            <div id="instant-booking">
                <div id="Yan-Ban">
                    
                </div>
                
            </div>
            <div id="Secure-payment">
                <div id="Yan-Nay">
                   
                </div>
                
            </div>
            <div id="Help">
                <div id="Yan-Maw">
                   
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