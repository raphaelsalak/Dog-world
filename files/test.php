<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
   $(document).ready(function(){
    $( "#header" ).load( "header.html" );
   });
  </script>
<div id="header"></div>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4">
	<br>
	<div id="registerAlert">
	</div>
	</div>
</div>
<?php
	
    include("config.php");

/*
if(isset($_POST["submit"])){
	echo "it works";
}
else{
	//sends user back to register.html if they got there the wrong way
	header("location: register.html");
}
*/
    //$CN=mysqli_connect("localhost","root","group12");
	//$DB=mysqli_select_db($CN,"shop");
  if($_SERVER["REQUEST_METHOD"] == "POST"){
	
	$FN=$_POST['firstName'];
	$LN=$_POST['lastName'];
	$PN=$_POST['mobile'];
	$EM=$_POST['email'];
	$PW=$_POST['password'];
    $PW2 = $_POST['password2'];
    
    if($PW2===$PW){
        $INSERT="insert into user(firstName,lastName,mobile,email,password,registeredAt,usertype)values('$FN','$LN','$PN','$EM','$PW',CURRENT_TIMESTAMP,'user')";
        $R=mysqli_query($CN,$INSERT);
	}
	else{
		?><script> document.getElementById("registerAlert").innerHTML = '<div class="alert alert-danger"><strong>Your passwords do not match!</strong></div>';
		</script>
		<?php 
		//echo "Your password don't match!";
	}
    /*
	$INSERT="insert into user(firstName,lastName,mobile,email,password,registeredAt,usertype)values('$FN','$LN','$PN','$EM','$PW',CURRENT_TIMESTAMP,'$UT')";
	$R=mysqli_query($CN,$INSERT);
    */
    
	if($R)
	{ 
		?><script> document.getElementById("registerAlert").innerHTML = '<div class="alert alert-success"><strong>Registration Successful!</strong></div>';
		</script>
		<?php 
	  //$Message="User $FN has been registered successfully";
       header('Refresh: 2; URL=login.html');
	 

	}
	else
	{
	?><script> document.getElementById("registerAlert").innerHTML = '<div class="alert alert-danger"><strong>Registration Unsuccessful!</strong></div>';
		</script>
		<?php 
		//$Message="User upload failed for $FN, please try again.";
	}
	//echo $R;
   //echo $Message;
	//$Response[]=array("Message"=>$Message);
	//echo json_encode($Response);
  }
?>
