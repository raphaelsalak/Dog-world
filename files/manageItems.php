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

	$NA=$_POST['name'];
    $ID=$_POST['userId'];
	$BR=$_POST['breed'];
	$SX=$_POST['sex'];
    $CL=$_POST['color'];
	$BD=$_POST['birthDt'];
	$SU=$_POST['summary'];
    $PR=$_POST['price'];
    $DS=$_POST['discount'];
    $QU=$_POST['quantity'];
    $SL=$_POST['slug'];
    $IM=$_POST['image_path'];
    $SZ=$_POST['size'];

            $insert = "insert into dog(name,userId,breed,sex,color,birthDt,summary,price,discount,quantity,createdAt,slug,image_path,size)values('$NA','$ID','$BR','$SX','$CL','$BD','$SU', '$PR','$DS','$QU',CURRENT_TIMESTAMP,'$SL','$IM','$SZ')";
            $R=mysqli_query($CN,$insert);
            if($R){
                $statusMsg = "<div class='alert alert-success'>The dog $NA has been uploaded successfully!<br><br></div>";
                // add another dog?
                // go home link?
            }
            else{
                $statusMsg = '<div class="alert alert-danger" role="alert"> Something went wrong while adding your dog. Please try again.</div>';
            }


// Display status message
echo $statusMsg;

?>