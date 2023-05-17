<!DOCTYPE html>
<html>
<head>
</head>
<body
	  <div class="container-fluid">
	  <header>
	  <h1>Orders</h1>
	  </header><table>
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
 session_start();
 $q = intval($_GET['q']);
    //$CN=mysqli_connect("localhost","root","group12");
	//$DB=mysqli_select_db($CN,"shop");
  if($q == 1){
      $sql = "SELECT * FROM shop.order";
      $result = mysqli_query($CN,$sql);
      
     
	  while ($row = mysqli_fetch_assoc($result)) { 
      	echo "<tr>";
    	foreach ($row as $field => $value) { 
        	echo '<td style="text-align:center"> '  . $value . ' </td>'; 
    	}
    	echo "</tr>";
	  }
	  echo "</table>";
  }
 
  else if($q == 2){
	  $sql = "SELECT * FROM shop.order order by total";
      $result = mysqli_query($CN,$sql);
      
     
	  while ($row = mysqli_fetch_assoc($result)) { 
      	echo "<tr>";
    	foreach ($row as $field => $value) { 
        	echo '<td style="text-align:center"> '  . $value . ' </td>'; 
    	}
    	echo "</tr>";
	  }
	  echo "</table>";
	  
  }
  else if($q == 3){
	  $sql = "SELECT * FROM shop.order order by userId";
      $result = mysqli_query($CN,$sql);
      
     
	  while ($row = mysqli_fetch_assoc($result)) { 
      	echo "<tr>";
    	foreach ($row as $field => $value) { 
        	echo '<td style="text-align:center"> '  . $value . ' </td>'; 
    	}
    	echo "</tr>";
	  }
	  echo "</table>";
	  
  }
  else if($q == 4){
	  $sql = "SELECT * FROM shop.order order by createdAt";
      $result = mysqli_query($CN,$sql);
      
     
	  while ($row = mysqli_fetch_assoc($result)) { 
      	echo "<tr>";
    	foreach ($row as $field => $value) { 
        	echo '<td style="text-align:center"> '  . $value . ' </td>'; 
    	}
    	echo "</tr>";
	  }
	  echo "</table>";
	  
  }
  else if($q == 5){
	  $sql = "SELECT * FROM shop.order order by createdAt desc;";
      $result = mysqli_query($CN,$sql);
      
     
	  while ($row = mysqli_fetch_assoc($result)) { 
      	echo "<tr>";
    	foreach ($row as $field => $value) { 
        	echo '<td style="text-align:center"> '  . $value . ' </td>'; 
    	}
    	echo "</tr>";
	  }
	  echo "</table>";
	  
  }


   

	?>
         </tr>
         <tr>
			 </div>
