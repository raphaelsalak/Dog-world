<html>
<head>
<meta charset="utf-8">
<title>Order Confirmation</title>
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
$data = json_decode($_COOKIE['products'], true);
$ID = $_COOKIE['userid'];  
$FN = $_POST['fNameAdd'];
$LN = $_POST['lNameAdd'];
$EM = $_COOKIE['em'];
$DS = $_POST['discountCode'];// set as zero for now until we test promo codes.
$TO = $_COOKIE['total'];
$AD = $_POST['address'];
$AP = $_POST['aptNum'];
$CT = $_POST['city'];
$CO = $_POST['country'];
$ST = $_POST['state'];
$PO = $_POST['zipCode'];
$PN = $_POST['phoneNum'];
$totalItems = count($data);
$newTotal = str_replace("$","",$TO); // this removes the $ from the total in the cookie
//echo '<p>'.$DS.'</p><br>';
//echo '<p>'.$ID.'</p><br>';
//echo '<p>'.$EM.'</p><br>';
//echo '<p>'.$TO.'</p><br>';
//echo '<p>'.$totalItems.'</p><br>';
//if(isset($_POST['submit']))
//{
    $select = "select percent from coupons where code ='$DS'";
    $discountResult=mysqli_query($CN,$select);
    $row = mysqli_fetch_assoc($discountResult);
    $percs = $row['percent'];
    $discode = $row['code'];
    //$res = mysql_num_rows($discountResult);
    //echo '<p>'.$res.'</p><br>';
    //echo '<p>'.$discountResult.'</p><br>';
    //echo $insert;
    if($discountResult){
        $percent = 0.01;
        $dsConvert = $percs * $percent;
        $discountedMinus = $newTotal * $dsConvert;
        $discountedTotal = $newTotal - $discountedMinus;
        
        $insert = "insert into shop.order(userId, status, firstName, lastName, email, discount, total, address, apt, city, country, state, postalCode, mobile, createdAt, totalItems)values('$ID','Processing','$FN','$LN','$EM','$dsConvert','$discountedTotal','$AD','$AP','$CT','$CO','$ST','$PO','$PN',CURRENT_TIMESTAMP,'$totalItems')";
        $R=mysqli_query($CN,$insert);
        if($R){
			echo "<div class='alert alert-success'>Your order was successfully placed!<br><br><strong>Order Summary:</strong><br>
			User ID: $ID <br>
			Name: $FN $LN<br>
			Email: $EM<br>
			Discount: -$$discountedMinus<br>
			Total: $$discountedTotal<br>
			Address: $AD $CT $ST, $PO<br>
			Status: Processing<br>
			Quantity: $totalItems</div>";
            //echo "<p>Your order has been successfully placed $FN, and a discount of $percs% has been applied. Thanks for shopping at Dogworld.</p>";
            for($i = 0; $i < $totalItems; $i++){
                $idInc = $data[$i][0];
                $update = "UPDATE dog SET quantity = GREATEST(0, quantity - 1) WHERE id = $idInc";
                $U=mysqli_query($CN,$update);
                if($U){
                    //echo "<p> done for ".$idInc."</p>";
                }
            }
            $orderStatus = 1;
            $_COOKIE['products'] = '';
        }
        else{
			echo '<div class="alert alert-danger" role="alert"> Something went wrong while placing your order. Your discount was not applied and your order was not placed. Please try again.</div>';
            //echo "<p>Something went wrong while placing your order. Your discount was not applied and your order was not placed. Please try again.</p>";
            $orderStatus = 0;
        }
    }
    else{
        $insert2 = "insert into shop.order(userId, status, firstName, lastName, email, discount, total, address, apt, city, country, state, postalCode, mobile, createdAt, totalItems)values('$ID','Processing','$FN','$LN','$EM','$DS','$newTotal','$AD','$AP','$CT','$CO','$ST','$PO','$PN',CURRENT_TIMESTAMP,'$totalItems')";
        $rrr=mysqli_query($CN,$insert2);
        if($rrr){
			echo "<div class='alert alert-success'>Your order was successfully placed!<br><br><strong>Order Summary:</strong><br>
			User ID: $ID <br>
			Name: $FN $LN<br>
			Email: $EM<br>
			Total: $$newTotal<br>
			Address: $AD $CT $ST, $PO<br>
			Status: Processing<br>
			Quantity: $totalItems</div>";

            //echo "<p>Your order has been successfully placed $FN. Thanks for shopping at Dogworld.</p>";
            for($i = 0; $i < $totalItems; $i++){
                $idInc = $data[$i][0];
                $update = "UPDATE dog SET quantity = GREATEST(0, quantity - 1) WHERE id = $idInc";
                $U=mysqli_query($CN,$update);
                if($U){
                    //echo "<p> done for ".$idInc."</p>";
                }
            }
            $orderStatus = 1;
            unset($_COOKIE['products']);
        }
        else{
			echo '<div class="alert alert-danger" role="alert"> Something went wrong while placing your order. Please try again.</div>';
           // echo "<p>Something went wrong while placing your order. Please try again.</p>";
            $orderStatus = 0;
        }
    }
if (isset($_COOKIE['products'])) {
    unset($_COOKIE['products']);
    setcookie('products', '', time() - 3600, '/'); // empty value and old timestamp
}
else{
    echo "ok";
}

echo '</body>';
?>
<!--<script>
    let status = <?php echo $orderStatus;?>
        if(status == 1){
            document.cookie = 'products=; Max-Age=0; path=/; domain=' + location.host;
        }
        else{
            <?php echo "HHHHHHHHHHWHHWHWHWHWHHW<br>";?>
            break;
        }

</script>-->
	</div>
	</div>