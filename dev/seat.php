<?php 
session_start();
date_default_timezone_set("Asia/Yangon");
include "configure.php";

$seats = array(1=>1, 2=>2, 3=>3, 4=>4, 5=>5,
               6=>6, 7=>7, 8=>8, 9=>9, 10=>10,
               11=>11, 12=>12, 13=>13, 14=>14, 15=>15,
               16=>16, 17=>17, 18=>18, 19=>19, 20=>20,
               21=>21, 22=>22, 23=>23, 24=>24, 25=>25,
               26=>26, 27=>27, 28=>28, 29=>29, 30=>30,
               31=>31, 32=>32, 33=>33, 34=>34, 35=>35,
               36=>36, 37=>37, 38=>38, 39=>39, 40=>40,
               41=>41, 42=>42, 43=>43, 44=>44, 45=>45);

$bid = $_GET['bid']; 
$bdate = $_GET['date']; 
$sql = "SELECT * FROM `booking_info` WHERE `bid` = $bid AND `b_date` = '$bdate'";
#$sql = "SELECT * FROM booking_info WHERE bid = $bid AND b_date = '$bdate'";
    if($stmt = $connection->prepare($sql)){
        #$stmt->bindParam(":busid", $bid);
        #$stmt->bindParam(":btime", $bdate);
        $stmt->execute();
    } 
    $tid_arr = array();
    while($row = $stmt->fetch()){
        $status = $row['status'];
        if($status == 'CANCELLED'){
            continue;
        }
        $tid = $row['tid'];
        $b_dt = new DateTime($row['b_time']);
        $c_dt = new DateTime(date("Y-m-d h:i a"));
        $interval = $c_dt->diff($b_dt);
        #echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes";
        $h = intval($interval->format('%h'));
        $d = intval($interval->format('%d'));
        $th = $h + ($d * 24);
        if($th < 2 or $status == 'CONFIRMED'){
            $seats[intval($row['seat_no'])] = 0;
        } else {
            array_push($tid_arr, $tid);
        }
    }
    $c = count($tid_arr);
    if($c > 0){
        $connection->beginTransaction();
        foreach ($tid_arr as $value) {
            $connection->exec("UPDATE `booking_info` SET `status`='CANCELLED' WHERE `tid` = $value");
        }
        $connection->commit();
    }
$sql1 = "SELECT * FROM bus_info WHERE id = $bid";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="seat.css">
  <title></title>
  <script type="text/javascript">
    let seatArr = [];
    function flip(seat){
        let no = seat.value;
        let elem = document.querySelector('#seat_arr');
        const total = elem.value.split(",");
        if(no == 0){
            seat.checked = true;
            return;
        }
        if(total.length > 2 && seat.value > 0){
            seat.checked = false;
            alert("Maximum available seat is three!");
            return;
        }
        if(no > 0) {
            seat.checked = true;
            seatArr[no] = no;
        } else {
            seat.checked = false;
            seatArr[-no] = undefined;
        }
        seat.value = -no;  
        //let elem = document.querySelector('#seat_arr');
        let seatStr = '';
        for (let i = 0; i < seatArr.length; i++) {
            let x = seatArr[i];
            if(x == undefined)
                continue;
            seatStr += x + ',';
        }
        elem.value = seatStr.substring(0, seatStr.length - 1);
    }
    </script>
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

  <!---------------------------- Body Code --------------------------------------->
<form method="POST" action=book_ticket.php>
    <div id="seat-body">
        <div id="seat-place">
            <div id="seat-title">
                Please select Seat
            </div>
            <div id="seat-ticket">
                <div id="seat-row-0">
                    Driver
                </div>
                <div id="seat-row-1">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-1" value="<?php echo $seats[1] ?>" type="radio" onclick="flip(this)" <?php if($seats[1] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-1"> 1 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-2" value="<?php echo $seats[2] ?>" type="radio" onclick="flip(this)" <?php if($seats[2] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-2"> 2 </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-3" value="<?php echo $seats[3] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[3] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-3"> 3 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-4" value="<?php echo $seats[4] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[4] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-4"> 4 </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-2">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-5" value="<?php echo $seats[5] ?>" type="radio" onclick="flip(this)" <?php if($seats[5] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-5"> 5 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-6" value="<?php echo $seats[6] ?>" type="radio" onclick="flip(this)" <?php if($seats[6] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-6">  6  </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-7" value="<?php echo $seats[7] ?>" type="radio" onclick="flip(this)" <?php if($seats[7] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-7">  7  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-8" value="<?php echo $seats[8] ?>" type="radio" onclick="flip(this)" <?php if($seats[8] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-8">  8  </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-3">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-9" value="<?php echo $seats[9] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[9] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-9"> 9 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-10" value="<?php echo $seats[10] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[10] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-10">  10  </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-11" value="<?php echo $seats[11] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[11] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-11">  11  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-12" value="<?php echo $seats[12] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[12] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-12">  12  </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-4">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-13" value="<?php echo $seats[13] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[13] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-13"> 13 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-14" value="<?php echo $seats[14] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[14] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-14">  14  </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-15" value="<?php echo $seats[15] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[15] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-15">  15  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-16" value="<?php echo $seats[16] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[16] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-16">  16  </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-5">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-17" value="<?php echo $seats[17] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[17] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-17"> 17 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-18" value="<?php echo $seats[18] ?>" type="radio" onclick="flip(this)" <?php if($seats[18] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-18">  18  </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-19" value="<?php echo $seats[19] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[19] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-19">  19  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-20" value="<?php echo $seats[20] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[20] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-20">  20  </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-6">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-21" value="<?php echo $seats[21] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[21] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-21"> 21 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-22" value="<?php echo $seats[22] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[22] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-22">  22  </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-23" value="<?php echo $seats[23] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[23] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-23">  23  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-24" value="<?php echo $seats[24] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[24] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-24">  24  </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-7">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-25" value="<?php echo $seats[25] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[25] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-25"> 25 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-26" value="<?php echo $seats[26] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[26] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-26">  26  </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat"  id="seat-radio-1-27" value="<?php echo $seats[27] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[27] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-27">  27  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-28" value="<?php echo $seats[28] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[28] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-28">  28  </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-8">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-29" value="<?php echo $seats[29] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[29] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-29"> 29 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-30" value="<?php echo $seats[30] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[30] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-30">  30  </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-31" value="<?php echo $seats[31] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[31] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-31">  31  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-32" value="<?php echo $seats[32] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[32] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-32">  32  </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-9">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-33" value="<?php echo $seats[33] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[33] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-33"> 33 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-34" value="<?php echo $seats[34] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[34] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-34">  34  </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-35" value="<?php echo $seats[35] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[35] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-35">  35  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-36" value="<?php echo $seats[36] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[36] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-36">  36  </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-10">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-37" value="<?php echo $seats[37] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[37] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-37"> 37 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat"  id="seat-radio-1-38" value="<?php echo $seats[38] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[38] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-38">  38  </label>
                        </li>
                        <li class="seat"></li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-39" value="<?php echo $seats[39] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[39] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-39">  39  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat" id="seat-radio-1-40" value="<?php echo $seats[40] ?>" required="" type="radio" onclick="flip(this)" <?php if($seats[40] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-40">  40  </label>
                        </li>
                    </ol>
                </div>

                <div id="seat-row-11">
                    <ol class="seats">
                        <li class="seat">
                            <input role="input-passenger-seat"  value="<?php echo $seats[41] ?>" id="seat-radio-1-41" type="radio" onclick="flip(this)" <?php if($seats[41] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-41"> 41 </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat"  value="<?php echo $seats[42] ?>" id="seat-radio-1-42" type="radio" onclick="flip(this)" <?php if($seats[42] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-42">  42  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat"  value="<?php echo $seats[43] ?>" id="seat-radio-1-43" type="radio" onclick="flip(this)" <?php if($seats[43] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-43">  43  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat"  value="<?php echo $seats[44] ?>" id="seat-radio-1-44" type="radio" onclick="flip(this)" <?php if($seats[44] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-44">  44  </label>
                        </li>
                        <li class="seat">
                            <input role="input-passenger-seat"  value="<?php echo $seats[45] ?>" id="seat-radio-1-45"  type="radio" onclick="flip(this)" <?php if($seats[45] == 0) echo 'checked'?>>
                            <label for="seat-radio-1-45">  45  </label>
                        </li>
                    </ol>
                </div>

            </div>
        </div>
        <div id="seat-info">
            <div id="book-summary">
                <b>Booking Summary</b>
            </div>
            <div id="info-table">
                <table style="width:100%">
                <tr>
                    <?php while($row1 = $stmt1->fetch()){?>
                    <td>Bus Operator</td>
                    <td><?php echo $row1['bus_name']; ?></td>
                </tr>
                <tr>
                    <td>Route</td>
                    <td><?php echo $row1['route']; ?></td>
                </tr>
                <tr>
                    <td>Departure Time</td>
                    <td><?php echo $row1['d_time']; ?></td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td><?php echo $row1['price']; ?></td>
                </tr>
            <?php 
                 } 
            ?>
                </table>
                <input type="hidden" name="bid" value="<?php echo $bid ?>">
                <input type="hidden" name="date" value="<?php echo $bdate ?>">
                <input type="hidden" name="select_seat" id="seat_arr" value="">
                <input type="submit" name="book_ticket" id = "book-btn" value="Book Ticket">
                <input type="submit" name="buyticket" id = "buy-btn" value="Buy Ticket">
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
