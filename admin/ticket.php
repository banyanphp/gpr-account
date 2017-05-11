<?php

error_reporting(0);
include "include/db.php";

$tid="";
$gid="";



session_start();

$ticket_no = $_POST['pnr'];

 
	$sql = "SELECT * FROM `az_ticket` where ticket_no = '$ticket_no '";
	 $result = mysqli_query($conn, $sql);
	   while($row = mysqli_fetch_assoc($result) )
				{
				$array[] = $row['seat_no'];
				$count=count($array);
				$bus_id =$row['bus_id'];
				$travel_dt =$row['travel_dt'];
				$boarding_point =$row['boarding_point'];
                
				$pass_number =$row['pass_number'];
				$email =$row['email'];
				$food[] = $row['food'];
				
				}
				

		$sql_bus_sh = "SELECT * FROM `az_bus_schedule` where bus_idfk = '$bus_id'";
		
		$result_bus_sh = mysqli_query($conn, $sql_bus_sh);
	    $row_bus_sh = mysqli_fetch_assoc($result_bus_sh);
				{
					$dep_time = $row_bus_sh['dep_time'];
					$arr_time = $row_bus_sh['arr_time'];
					$amount = $row_bus_sh['amount'];
					$total_amount1 =$count*$amount;
					$from_city_id = $row_bus_sh['from_city_idfk'];
					$to_city_id = $row_bus_sh['to_city_idfk'];
				//	$to_city = $row_to_city ['city_name'];
				}
				
				
				 $sql_bus_details = "SELECT * FROM `az_bus` where id = '$bus_id'";
	 $result_bus_details = mysqli_query($conn, $sql_bus_details);
	   while($row_bus_details = mysqli_fetch_assoc($result_bus_details) )
				{
					$bus_name = $row_bus_details['name'];
					
					$seat_type = $row_bus_details['seat_type'];
				}
	 
	
	  $sql_bus_board = "SELECT * FROM `az_stops` where name = '$boarding_point'";
	
	 $result_bus_board = mysqli_query($conn, $sql_bus_board);
	   while($row_bus_board = mysqli_fetch_assoc($result_bus_board) )
				{
					$bname = $row_bus_board['name'];
					$address = $row_bus_board['address'];
					$contact_no = $row_bus_board['contact_no'];
				}
	 
	 
	  $sql_from_city = "SELECT * FROM `az_city` where id = '$from_city_id '";

	 $result_from_city = mysqli_query($conn, $sql_from_city);
	   while($row_from_city = mysqli_fetch_assoc($result_from_city) )
				{
					$from_city = $row_from_city['city_name'];
				//	$to_city = $row_to_city ['city_name'];
				}
				
			 $sql_to_city = "SELECT * FROM `az_city` where id = '$to_city_id '";
	 $result_to_city = mysqli_query($conn, $sql_to_city);
	   while($row_to_city = mysqli_fetch_assoc($result_to_city) )
				{
					//$from_city = $row_from_city['city_name'];
				$to_city = $row_to_city ['city_name'];
				}
		
					  $sql_bus_sh = "SELECT * FROM `az_bus_schedule` where bus_idfk = '$bus_id'";
	 $result_bus_sh = mysqli_query($conn, $sql_bus_sh);
	   while($row_bus_sh = mysqli_fetch_assoc($result_bus_sh) )
				{
					$dep_time = $row_bus_sh['dep_time'];
					$arr_time = $row_bus_sh['arr_time'];
					$amount = $row_bus_sh['amount'];
					$total_amount1 =$count*$amount;
				//	$to_city = $row_to_city ['city_name'];
				}
				foreach ($food as $f)
				{
				 $sql_food = "SELECT price FROM `az_foodmenu` WHERE id ='$f'";
				 $result_food = mysqli_query($conn, $sql_food);
				 while($row_food = mysqli_fetch_assoc($result_food))
				  {
					 $arrfood[] = $row_food['price'];
				 }
						 $food_amount = array_sum($arrfood);	
						$total_amount =	$total_amount1 + $food_amount;
						
						
				}
 

 
				
	
	
	

?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<!--Menu-->
<link href="assets/nav/menu.css" rel="stylesheet" type="text/css">
<script src="assets/nav/script.js"></script>
<!--Menu-end-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Ticket</title>
</head>

<body>
 <?php include("include/header.php"); ?>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center" style="font-family:Arial, Helvetica, sans-serif; border:solid 1px #CCC; padding:20px;">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="24%"><img src="assets/img/logo.png" width="181" height="70"></td>
            <td width="3%">&nbsp;</td>
            <td width="23%" align="right"><p style="font-size:14px; color:#333; line-height:25px;">Need help with your trip??? <br>
              +91 88830 88820 <br>
              helpline.runtowin@gmail.com</p></td>
          </tr>
        </table>
          <hr style="border-bottom:thin dashed #333;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="252"><span style="font-size:20px; color:#C00;"> <?php echo $from_city; ?> - <?php echo $to_city; ?> </span></td>
              <td width="358"><span style="font-size:20px; color:#C00;"> <?php echo $travel_dt; ?> </span></td>
              <td width="383" align="right"><p  style="font-size:14px; color:#333; line-height:25px;"> Ticket no : <?php echo $ticket_no; ?> <br> 
                </p></td>
            </tr>
          </table>
          <hr style="border-bottom:thin dashed #333;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr style="font-size:18px; color:#333;">
              <td> <?php echo $bus_name; ?> </td>
              <td><?php echo $arr_time; ?></td>
              <td><?php echo $dep_time; ?></td>
             
            </tr>
            <tr style="font-size:14px; color:#333;">
              <td height="50"><?php echo $seat_type; ?></td>
            
              <td>Seat Number <?php  foreach($array as $key => $value)
{
	echo $value.' ';
} ?></td>
            </tr>
            <tr style="font-size:18px; color:#333;">
              <td>Boardibg Point Details</td>
              <td><?php echo $bname; ?></td>
              <td><?php echo $address; ?></td>
         
            </tr>
      
          </table>
          <hr style="border-bottom:thin dashed #333;">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="252"><span style="font-size:18px; color:#333;"><?php echo $email; ?> <br>
                <span style="font-size:14px; color:#333;">Seat No. <?php  foreach($array as $key => $value)
{
	echo $value.' ';
} ?></span></span></td>
              <td width="358" align="right"><span style="font-size:18px; color:#C00;">Total Fare :<?php echo $total_amount; ?></span> <br>
                <span style="font-size:14px; color:#333;">( Inclusive of Rs.0 Service Tax )</span></td>
            </tr>
          </table>
          <p style="font-size:14px; color:#333;">Note : This operator accept mTicket, you need not carry a print out</p>
          <hr style="border-bottom:thin dashed #333;">
    <p style="font-size:18px; color:#C00;">Terms &amp; Conditions</p>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top" style="font-size:14px; color:#333; line-height:25px;"><ul>
                <li> Pantase* is ONLY a bus ticket agent. It does not operate bus   services of its own. In order to provide a comprehensive choice of bus   operators, departure times and prices to customers, it has tied up with   many bus operators. Pantase's advice to customers is to choose bus operators they   are aware of and whose service they are comfortable with. </li>
              </ul>
                <p><strong>Pantase responsibilities include:</strong></p>
                <ul>
                  <li> <span>Issuing a valid ticket (a ticket that will be accepted by the bus operator) for its network of bus operators</span></li>
                  <li>Providing refund and support in the event of cancellation</li>
                  <li>Providing customer support and information in case of any delays / inconvenience </li>
                </ul>
                <p><span><strong>Pantase responsibilities do not include:</strong></span></p>
                <ol>
                  <li>The bus operator's bus not departing / reaching on time.</li>
                  <li>The bus operator's employees being rude.</li>
                  <li>The bus operator's bus seats etc not being up to the customer's expectation.</li>
                  <li>The bus operator canceling the trip due to unavoidable reasons.</li>
                  <li>The baggage of the customer getting lost / stolen / damaged.</li>
                  <li>The bus operator changing a customer's seat at the last minute to accommodate a lady / child. </li>
                  <li>The customer waiting at   the wrong boarding point (please call the bus operator to find out the   exact boarding point if you are not a regular traveler on that   particular bus).</li>
                  <li>The bus operator changing   the boarding point and/or using a pick-up vehicle at the boarding point   to take customers to the bus departure point.</li>
                </ol>
                <ul>
                  <li> The departure time mentioned on the ticket are only   tentative timings. However the bus will not leave the source before the   time that is mentioned on the ticket. </li>
                </ul></td>
              <td width="20" valign="top">&nbsp;</td>
              <td valign="top" style="font-size:14px; color:#333; line-height:25px;"><ul>
                <li>
                  <p>Passengers are required to furnish the following at the time of boarding the bus:<br>
                    (1) A copy of the ticket (A print out of the ticket or the print out of the ticket e-mail). <br>
                    (2) A valid identity proof <br>
                    Failing  to do so, they may not be allowed to board the bus.</p>
                </li>
              </ul>
                <ul>
                  <li>
                    <p><span>Change   of bus: In case the bus operator changes the type of bus due to some   reason, Pantase will refund the differential amount to the customer upon   being intimated by the customers in 24 hours of the journey.</span></p>
                  </li>
                </ul>
                <ul>
                  <li>
                    <p>Amenities for this bus as shown on   Pantase have been configured and provided by the bus provider (bus   operator). These amenities will be provided unless there are some   exceptions on certain days. Please note that Pantase provides this   information in good faith to help passengers to make an informed   decision. The liability of the amenity not being made available lies   with the operator and not with Pantase.</p>
                  </li>
                </ul>
                <ul>
                  <li>
                    <p><span>In   case one needs the refund to be credited back to his/her bank account,   please write your cash coupon details to support@pantase.in   * The home delivery charges (if any), will not be refunded in the event   of ticket cancellation </span></p>
                  </li>
                </ul>
                <ul>
                  <li>
                    <p>In case a booking confirmation   e-mail and sms gets delayed or fails because of technical reasons or as a   result of incorrect e-mail ID / phone number provided by the user etc, a   ticket will be considered 'booked' as long as the ticket shows up on   the confirmation page of www.pantase.com</p>
                  </li>
                </ul>
                <ul>
                  <li>
                    <p>Grievances and claims related to the bus journey should be reported to Pantase support team within 10 days of your travel date.</p>
                  </li>
                </ul>
                <ul>
                  <li>
                    <p>Partial Cancellation is <strong>NOT</strong> allowed for this ticket.</p>
                  </li>
                </ul>
                <table border="1" align="center" cellspacing="0" rules="all">
                  <tbody>
                    <tr align="left">
                      <th scope="col" align="left">Cancellation time</th>
                      <th scope="col" align="left">Cancellation charges</th>
                    </tr>
                    <tr>
                      <td>  After 05:30 PM on 6th Sep</td>
                      <td align="left">  Rs. 1290 </td>
                    </tr>
                    <tr>
                      <td>  Between 02:30 PM on 6th Sep-05:30 PM on 6th Sep </td>
                      <td align="left">  Rs. 645 </td>
                    </tr>
                    <tr>
                      <td>  Between 08:30 AM on 6th Sep-02:30 PM on 6th Sep </td>
                      <td align="left">  Rs. 322.5 </td>
                    </tr>
                    <tr>
                      <td>  Till 08:30 AM on 6th Sep </td>
                      <td align="left">  Rs. 129</td>
                    </tr>
                  </tbody>
                </table>
                <p>&nbsp;</p></td>
            </tr>
          </table>
          </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
