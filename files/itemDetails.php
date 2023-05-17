<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Item Details</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $( "#header" ).load( "../files/header.html" );   
   });
</script>
<script src="search.js"></script>
</head>
<body>
<div id="header"></div>
	
	
	<div class="container-fluid p-5">
	<div class="row mb-3 justify-content-md-center">
	<!--<p>Basic Description</p>
	<p>This page should allow an the user to view the details of an item and add it to cart<br> We'll also probably want a coupon creator link that is only visible to admin users</p>-->
    
	
	<?php
    include("config.php");
	$var = $_COOKIE['currentDoginPHP'];
	//echo "The id is " .$var. " ";
    $id = $var;
	$sql = "SELECT id, name, breed, sex, color, birthDt, summary, price, quantity, createdAt, image_path, size, slug,discount FROM dog WHERE id = '".$id."'";
	
    $result = mysqli_query($CN,$sql);
    $obj=array();  
    //$row = mysqli_fetch_array($result);
    //echo"<table>";
	while ($row = mysqli_fetch_assoc($result)) { // Important line !!! Check summary get row on array ..
    	//echo "<tr>";
    	foreach ($row as $field => $value) { // If you want you can right this line like this: foreach($row as $value) {
        	//echo "<td> " . $value . " </td>"; // I just did not use "htmlspecialchars()" function.
            $obj[] = $value;
		}
    	//echo "</tr>";
	}
	//echo "</table>";
    echo "<h2>".$obj[1]."</h2>";
	echo '</div>';
	echo '<div class="row">';
	echo '<div class="col-sm-4">';
    echo '<img src='.$obj[10].' alt="dogimage"  width="400px"  class="float-start d-block rounded" img>';
	echo '</div>';
	echo '<div class="col-sm-8">';
    echo '<p> <strong>Price:</strong> $'.$obj[7].'</p>';
	echo '<p> <strong>Gender:</strong> '.$obj[3].'</p>';
	echo '<p> <strong>Breed:</strong> '.$obj[2].'</p>';
    echo '<p> <strong>Size:</strong> '.$obj[11].'</p>';
    echo '<p> <strong>Summary:</strong> '.$obj[6].'</p>';
    echo '<p> <strong>Quantity: </strong>'.$obj[8].'</p>';
    if ($obj[8]/*quantity*/ > 0){
        echo '<p><button type="button" id="add" class="btn btn-success">Add to Cart <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16"> <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/> <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> </svg></button</p>';
    }
    else{
        echo '<p style="color:#FF0000"> <strong>Out of Stock. </strong></p>';;
    }
    echo '</div>';
	echo '<div id="loginAlert"> </div>';
	echo '</div>';
	?>
    <script>
		add = document.querySelector("#add")
		add.onclick = function(){
			console.log("add to cart has been clicked");
			//PHP Runs on file load
            
            // add if ($obj[8]/*quantity*/ < 0){do not let add to cart}
            
			if(window.sessionStorage.getItem("email") ){
				
			
	 		<?php
                $cookiename = "products";

                  $cart = array();
                
               
				if(!empty($_COOKIE[$cookiename])) {
                    $cart = json_decode($_COOKIE[$cookiename], true);
                }
            
                array_push($cart, $obj);
            
                //setcookie($cookiename, json_encode($cart), time() + 3600, "/");
                //$_COOKIE[$cookiename] = json_encode($cart);
            ?>
            //localStorage.setItem("cart", JSON.stringify(<?php echo json_encode($cart);?>));
            //sessionStorage.setItem("dogarray",<?php echo json_encode($cart); ?>);
            sessionStorage.setItem("cartCount",<?php echo count($cart); ?>);
            yuh = <?php echo json_encode($cart); ?>;
			
	 		console.log(yuh);
			document.cookie="products="+ JSON.stringify(yuh);
			updateCartBadge();
			}
			else {
					document.getElementById("loginAlert").innerHTML = '<div class="alert alert-danger"><strong>Please login before adding to cart!</strong></div>';

			}
		}
	</script>
	<br><br>
	<div id="editDogButton"></div> 
	<script>	
	if (window.sessionStorage.getItem("userType")== "admin"){
			document.getElementById("editDogButton").innerHTML = '<button id="btn1" type="button" class="btn btn-secondary">Edit</button>' ;

	}
	</script>
	<script>
		btn = document.querySelector("#btn1")
		btn.onclick = function(){
	 		jsDog = <?php echo json_encode($obj); ?>;
	 		sessionStorage.setItem("cDog",jsDog);
	 		console.log(jsDog);
			window.location.href = "adminHome.html";
		}
	</script>
		
	</div>
	</div>
		
</body>
</html>