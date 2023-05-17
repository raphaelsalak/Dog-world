<!DOCTYPE html>
<?php  session_start();
?>
<html>
<head>
<meta charset="utf-8">
<title>Orders</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $( "#header" ).load( "../files/header.html" );   
   });
</script>
</head>
<body>
	<div id="header"></div>
	<div class="container-fluid">
	  
	  <h1>Orders</h1>
	  <table>
<table class="table">
         <tr>
            <th>Order ID</th>
            <th>User ID</th>
			<th>Status</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
			<th>Discount</th>
            <th>Total</th>
			<th>Address</th>
            <th>Apt. Number</th>
			<th>City</th>
			<th>Country</th>
            <th>State</th>
            <th>Postal Code</th>
            <th>Phone Number</th>
            <th>Placed On</th>
            <th>Cart Size</th>
			 <?php
 include("config.php");
 //session_start();
 //$q = intval($_GET['q']);
    //$CN=mysqli_connect("localhost","root","group12");
	//$DB=mysqli_select_db($CN,"shop");
	//echo $_SESSION["usertype"];
	$userId = intval($_SESSION["userId"]);
	//echo $userId;
	  include("config.php");
      $sql = "SELECT * FROM shop.order WHERE userId='$userId';";
      $result = mysqli_query($CN,$sql);
      
     
	  while ($row = mysqli_fetch_assoc($result)) { 
      	echo "<tr>";
    	foreach ($row as $field => $value) { 
        	echo '<td style="text-align:center"> '  . $value . ' </td>'; 
    	}
    	echo "</tr>";
	  }
	  echo "</table>";
 

	?>
         </tr>
         <tr>
			 </div>
