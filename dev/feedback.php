<?php 
include "configure.php";
session_start();
if(isset($_POST['sendbtn'])){
    $feedback = $_POST['exp'];
    $uid = $_SESSION['uid'];
    $date = date('Y-m-d');
    $sql = "INSERT INTO feedback(uid, comment, `date`) VALUES(?,?,?)";
    $stmt = $connection->prepare($sql);
    $stmt->execute([$uid,$feedback,$date]);
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="about.css">
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

        <!---------------------------- Start of About Body Code --------------------------------------->
        <div id="about-body"> 
            <form method ="POST">
                <div class="container">
                    <div class="head">
                        <div class="heading"><h1>Share your experience</h1></div>
                    </div>
                    <div class="textarea">
                        <textarea name="exp" id="exp" placeholder="Let we know..."></textarea>
                    </div>
                    <div class="end">
                        <div class="submission">
                            <button class="sub btn" name = "sendbtn">Send</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!---------------------------- Footer Code --------------------------------------->
        <footer>
            <div id="footer">
                <div id="footer-contact">
                    <div id="footer-logo"></diV>
                    <div id="contact">
                        <h2>Contact</h2>
                        <p>09 777 111 811, 09 76543 0471, 09 76543 0474</p>
                        <p><a herf="About.php">Ask a question</a></p>
                    </div>
                </div>
                <div id="footer-info">
                    <h2>INFORMATION</h2><br>
                    <p><a herf="searching_ticket.php">Find/Print Your Ticket</a></p>
                </div>
                <div id="footer-legal">
                    <h2>LEGAL</h2><br>
                    <p><a herf="termscondition.html">Terms & Conditions</a></p>  
                </div>
            </div>
        </footer>
</body>
</html>