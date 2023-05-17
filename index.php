<?php 
	session_start(); 
	if(!isset($_SESSION["email"])){
		header("location: index.html");
	}
?>
<!doctype html>
<html><head>

<title>Home Page</title>
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
       $( "#header" ).load( "../files/signedinheader.php" );  
   }); 
</script>
</head>
<body>
	<div id="header"></div>
	<?php
		echo("hello " .$_SESSION["firstname"]. " " .$_SESSION["lastname"] "your id is: " );
	?>
	<!--<img src="https://img.chewy.com/is/image/catalog/259055_MAIN._AC_SL1500_V1604528504_.jpg" alt="tmp dog">-->
	
</body>
</html> 
