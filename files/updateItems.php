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

	$NA=$_POST['name'];
	$BR=$_POST['breed'];
	$SX=$_POST['sex'];
    $CL=$_POST['color'];
	$BD=$_POST['birthDt'];
	$SU=$_POST['summary'];
    $PR=$_POST['price'];
    $DS=$_POST['discount'];
    $QU=$_POST['quantity'];
    $IM=$_POST['image_path'];
    $SZ=$_POST['size'];
    $oldname=$_POST['oldname'];
    //if(isset($NA,$oldname)){
    //    $update="update dog set name='$NA' where name='$oldname'";
    //}
    //elseif(isset($NA,$BR,$SX,$CL,$BD,$SU,$PR,$DS,$QU,$IM,$oldname)){
        $update = "UPDATE dog SET name='$NA', breed='$BR', sex='$SX', color='$CL', birthDt='$BD', summary='$SU', price='$PR', discount='$DS', quantity='$QU', updatedAt=CURRENT_TIMESTAMP, image_path='$IM', size='$SZ' WHERE name = '$oldname'";
   //}



    $R=mysqli_query($CN,$update);
            if($R){
                $statusMsg = "<div class='alert alert-success'>The dog $NA has been updated successfully!<br><br></div>";
            }
            else{
                $statusMsg = '<div class="alert alert-danger" role="alert"> Something went wrong while updating your dog. Please try again.</div>';
            }
echo $statusMsg;

?>