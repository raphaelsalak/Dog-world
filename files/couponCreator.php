<html>
<head>
<meta charset="utf-8">
<title>Upload Confirmation</title>
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
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
	<br>
<?php
    include("config.php");
    //$CN=mysqli_connect("localhost","root","group12");
	//$DB=mysqli_select_db($CN,"shop");
    
    session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      //password and email from login.html
      $code=$_POST['code'];
	  $number=$_POST['number'];
      
      $sql = "insert into coupons(code, percent) values ('".$code."', '".$number."')";
		if($CN->query($sql) === TRUE){
			echo "<div class='alert alert-success'>You have uploaded your coupon successfully!<br><br></div>";
		}
		else{
			echo "Error: " .$sql. "<br>" .$CN->error;
		}
      $CN->close();
	  
		
	}
?>