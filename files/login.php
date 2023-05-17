<script src="..files/scripts/login.js"></script>
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
	<div id="loginAlert">
	</div>
	</div>
</div>
<?php
    
    include("config.php");
    //$CN=mysqli_connect("localhost","root","group12");
	//$DB=mysqli_select_db($CN,"shop");
    
    session_start();
   
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      //password and email from login.html
      $EM=$_POST['email'];
	  $PW=$_POST['password'];
      
      $sql = "SELECT * FROM user WHERE email = '".$EM."' and password = '".$PW."'";
      $result = mysqli_query($CN,$sql);
      
      $row =mysqli_fetch_assoc($result);
     
	  $userType = $row["usertype"];
	  
	  $_SESSION["email"] = $row["email"];
	  $EM = $row["email"];
	  $_SESSION["userId"] = $row["id"];
	  $_SESSION["usertype"] = $row["usertype"];
	  $_SESSION["firstname"] = $row["firstName"];
	  $_SESSION["lastname"] = $row["lastName"];
	
	  $fname = $row["firstName"];
	  $lname = $row["lastName"];
	  $phoneNumber = $row["mobile"];	
	  $userID = $row["id"];
	?>
		<script type="text/javascript"> 
			window.sessionStorage.setItem("lname", '<?php echo"$lname"?>');
			window.sessionStorage.setItem("fname", '<?php echo "$fname"?>');
			window.sessionStorage.setItem("email", '<?php echo "$EM"?>');
			window.sessionStorage.setItem("phoneNumber", '<?php echo "$phoneNumber"?>');
			window.sessionStorage.setItem("userType", '<?php echo "$userType"?>');		
			window.sessionStorage.setItem("userID", '<?php echo "$userID"?>');

			

</script>

<?php
	  if($row["usertype"]=="user"){
		   $_SESSION["email"] = $EM;
		  $_SESSION["usertype"] = "user";
		 // header("location:../index.html");
		  echo" <script type='text/javascript'> window.location.href = '../index.html';</script>";
		
	  }
	  else if($row["usertype"] == "admin"){
		  $_SESSION["email"] = $EM;
		  $_SESSION["usertype"] = "admin";
		  //echo "admin";
		  echo" <script type='text/javascript'> window.location.href = '../index.html';</script>";
	
	  }
	  else{
			  ?>
				<script>
					document.getElementById("loginAlert").innerHTML = '<div class="alert alert-danger" 	role="alert">Email or Password is incorrect!</div>' ;
				</script>

			<?php
	     	//echo "email or password is incorrect";
	  }
		
		//header("Location: {$_SERVER["HTTP_REFERER"]}");

      /*
      if($result)
      {
		$Message="login found";
      }
      else
      {
		$Message="info not found";
      }
     
      echo($Message);
      */
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      /*if($count == 1) {
         //session_register("myemail");
         //$_SESSION['email'] = $EM;
         $Message="Thank you for logging in. Welcome to DogWorld";
        //header("location: welcome.php");
      }else {
         $Message = "Your Email or Password is invalid";
      }
      echo($Message);*/
		$CN->close();
   }
?>