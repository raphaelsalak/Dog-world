<html>
<head>
<meta charset="utf-8">
<title>Update Confirmation</title>
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
    
    $ID=$_POST['userID'];
	$FN=$_POST['firstName'];
	$LN=$_POST['lastName'];
	$PN=$_POST['mobile'];
    $EM=$_POST['email'];
	$UT=$_POST['usertype'];
	//$PW2=$_POST['password2'];
    
    //if($PW2===$PW){
        $update = "UPDATE user SET firstName='$FN', lastName='$LN', mobile='$PN', email='$EM', usertype='$UT' WHERE id = '$ID'";
        $R=mysqli_query($CN,$update);
	//}
	//else{
	//	echo "Your password don't match!";
	//}

    $R=mysqli_query($CN,$update);
            if($R){
                $statusMsg = "<div class='alert alert-success'>The user $EM has been updated successfully!<br><br></div>";
            }
            else{
				echo "Error: " .$sql. "<br>" .$CN->error;
                $statusMsg = '<div class="alert alert-danger" role="alert"> Something went wrong while updating your user. Please try again.</div>';
            }
echo $statusMsg;

?>
