<!-- <!doctype html> !-->
<html>
<head>
<meta charset="utf-8">
<title>View Shopping Cart</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $( "#header" ).load( "../files/header.html" );   
   });
</script>
<script src="search.js"></script>
</head>

	
<style>

	#leftCartdiv {
	  background-color: #c6d6c5;
	  border: 1px solid #596b5e;
	  padding: 10px;
	}
	#leftCartdiv td{
		background-color: rgba(100, 100, 175, 0.8);
		border: 3px solid rgba(0, 0, 0, 0.8);
		padding: 10px;
	}
	
	.extras *{
		display: flex;
		align-items: center;
  		justify-content: center;
	}
	
	.cuBTN1, .cuBTN2 {
	  /*background-color: #4CAF50;*/ /* Green */
	  /*border: none;*/
	 /*color: white;*/
	  /*padding: 15px 32px;*/
	  text-align: center;
	  text-decoration: none;
	  display: inline-block;
	  font-size: 28px;
}
	
	.cuP{
		font-size: 20px;
		text-align: center;
	  text-decoration: none;
	  display: inline-block;
	}
	
		
	
	

	/*
	#leftCartdiv.col-sm-5{
		background-color: rgba(100, 100, 175, 0.8)
		border: 3px solid rgba(0, 0, 0, 0.8);
		padding: 10px;
	}
	*/
</style>

<template class="cloneme" id="Item_Template">
	<div class="row">
		<div class="col-sm-5" id = "picSide">
		<a id ="linkwhenClicked" href="itemDetails.php" style="color:#000000; text-decoration:none;">
			<table>
				<tr>
					<td><div class="thumbnail">
					<img id="imgO" src="" width="100%" height="100%" alt="Pic">
					</div></td>
				</tr>
				<tr>
					<td class="nameBox" id="iName">Dog</td>
				</tr>
			</table>
		</a>
		</div>
		<!-- <div class="extras"> 
			<nobr>-->
		
			<div class="col-sm-1" id = "Spacer1"></div>
			<div class="col-sm-1 text-center" id = "priceQtyS">
				<p id="price" class="cuP">$0.0</p> </td>
			</div>
			<div class="col-sm-1" id = "Spacer2"></div>
			<div class="col-sm-1 text-center" id = "Trashicon">
				<btutton id="remDog" class="cuBTN1"
						 >🗑</btutton>
			</div>
			<div class="col-sm-1" id = "Spacer2"></div>
			<div class="col-sm-1 text-center" id = "DuplicateIcon">
				<btutton id="dupeDog"class="cuBTN2"
						 >+</btutton>
			</div>
		<!-- </nobr>
		 </div> -->
	
							
					
	</div>
	<br> <!-- jank spacer -->
</template>
<body>
	
	<div id="header"></div>
	<!-- This should link back to wherever the user got here from. (likely browse or itemdetails)-->
	<div class="container-fluid">
	<div class="row">
	<div class="col-sm-5" id="leftCartdiv">
		<h3>Shopping Cart</h3>
        <!-- TemplateClonesare inserted here !-->		
	
	</div>
	<div class="col-sm-7">
		<div class="row">
		<h3>Shipping Address</h3>
		<form action="createOrder.php" method="post">
		<div class="row">
  		<div class="col mb-3">
			<input type="text" class="form-control" placeholder="First name" aria-label="First name" name="fNameAdd" required>
 		</div>
  		<div class="col">	
			<input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lNameAdd" required>
  		</div>
		</div>
		<div class="row">
			<div class="mb-3">
			<input type="text" class="form-control" placeholder="Address" aria-label="Address" name="address" required>
			</div>
			<div class="mb-3">
			<input type="text" class="form-control" placeholder="Apartment, suite, etc.(optional)" aria-label="Apartment, suite, etc.(optional)" name="aptNum">
			</div>
			<div class="mb-3">
			<input type="text" class="form-control" placeholder="City" aria-label="city" name="city" required>
			</div>
		</div>
			<div class="row">
  		<div class="col mb-3">
			<input type="text" class="form-control" placeholder="Country" aria-label="country" name="country" required>
 		</div>
  		<div class="col">
			<input type="text" class="form-control" placeholder="State" aria-label="state" name="state" required>
  		</div>
		<div class="col">
			<input type="text" class="form-control" placeholder="Zip Code" aria-label="zipCode" name="zipCode" required>
  		</div>
		<div class="row">
			<div class="mb-3">
			<input type="text" class="form-control" placeholder="Phone Number" aria-label="phoneNum" name="phoneNum" required>
			</div>
		</div>
		</div>	
			<hr>
		<!--<form>
			
			<div class=" col-6 m-3">-->
			<label for="discountCode" class="col-form-label">Promo Code:</label>
			<input type="text" class="form-control" placeholder="Discount Code" aria-label="Discount Code" name="discountCode" id="discountCode">
			
			<!--<div class="m-3">
			<button name="discountBtn" id="discountBtn" class="btn btn-block btn-success" type="submit" >Enter</button>
			</div>
			</div>
		</form>	-->
			
		</div>
		<div class="row">
		<hr>
		<div class="col-sm-6">
			<p><strong>Subtotal:</strong></p>
		 	<p><strong>Shipping:</strong></p>
			<p><strong>Tax:</strong></p>
			<p><strong>Discounts:</strong></p>
			</div>
			<div class="col-sm-6" >
			<p id="subtotal"></p>
			<p id="shipping"></p>
			<p id="tax"></p>
			<p id="discount">$0.00</p>
			</div>
			<hr>
	
			<div class="col-sm-6">
			<p><strong>Total:</strong></p>
			</div>
			<div class="col-sm-6">
			<p id="total"></p>			
			</div>
			<hr>
			

		
		</div>
    			<button onclick="myFunction()" name="placeOrder" id="submit" class="btn btn-block btn-success" type="submit" >Place Order</button>
		</form>	
	</div>
	</div>
	</div>	
	

<script>
//var retrievedData = localStorage.getItem("cart");
//var cart = JSON.parse(retrievedData);
//alert(cart.length);
//console.log(cart);
</script>

</body>
</html>

<?php
include("config.php");
$data = json_decode($_COOKIE['products'], true);
//echo '<pre>'; 
//print_r($data); 
//echo '</pre>';
?>
<script>
	/*
	cartS = document.cookie
	console.log(cartS)
	cartV= cartS.split("; products=")[1].split("=")[0]
	cartI = cartV.lastIndexOf(";")
	cartR = cartV.substring(0,cartI);
	console.log(cartR)
	document.cookie = cartS.replace("; products="+cartR,"")
	console.log(cartS.replace("; products="+cartR.""))
	*/
	var template = document.querySelector("#Item_Template");
	let jsvar = <?php echo json_encode($data); ?>;
	console.log(jsvar)
	let subtotal = 0;

	var attach = document.querySelector("#leftCartdiv");
	for (let dogitem = 0; dogitem < jsvar.length; dogitem++) {
		var clone = template.content.cloneNode(true);
		var imgO = clone.getElementById("imgO");
		var nameO = clone.getElementById("iName");
		var priceO = clone.getElementById("price");
		var qtyO = clone.getElementById("Qty");
		//var cb = clone.getElementById("iColorBreed");
		let gIco = "" ;
		subtotal += parseFloat(jsvar[dogitem][7]);
		if(jsvar[dogitem][3] == "M"){
			gIco = "♂"
		}
		else if(jsvar[dogitem][3] == "F"){
			//console.log(jsonObj.Items[dogitem].sex + " = F")
			gIco = "♀"
		}
		var lk = clone.getElementById("linkwhenClicked")
		lk.onclick = function(){
			sessionStorage.setItem("currentDog", jsvar[dogitem][0]);
			document.cookie="currentDoginPHP=" + sessionStorage.getItem("currentDog");
		}
		
		let trashIco = clone.getElementById("remDog")
		let addIco = clone.getElementById("dupeDog")
		
		var cartS = document.cookie
		console.log(cartS)
		cartV= cartS.split("; products=")[1].split("=")[0]
		var cartR = cartV.substring(0,cartV.lastIndexOf(";"));
		//var cartTmpS = cartS.replace("; products="+cartR )
		addIco.onclick =function(){
			//This is the add to cartfunction but it can't be written in PHP as it needs to change dynamically based on the the dog being parsed . . . fuuuuck
			
			const duplicates = {};
			jsvar.forEach(function (x) { duplicates[x] = (duplicates[x] || 0) + 1; });
			
			selfCount = duplicates[jsvar[dogitem]]
			selfQuant = jsvar[dogitem][8]
			console.log(duplicates)
			console.log("quant: " + selfQuant + " Count: "+ selfCount)
			if (selfQuant <= selfCount){
				alert("You cannot add more of this stock. Current Stock: " + selfQuant + ". Your cart currently contains "+ selfCount)
				return 0;
			}
			
			let date = new Date();
        	date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
        	const expires = "expires=" + date.toUTCString();
			
			jsvar.push(jsvar[dogitem])
			let pNewS = JSON.stringify(jsvar)
			let cartNewS = cartS.replace(cartR,pNewS) +"; " + expires + "; path=/"
			//document.cookie = "products=;"
			document.cookie = "products=" +pNewS +";"
			cCount = parseInt(sessionStorage.getItem("cartCount"))
			sessionStorage.setItem("cartCount",cCount + 1)
			console.log(cCount)
			updateCartBadge()
			location.reload()
			
		}
		trashIco.onclick = function(){
			//same function but remove current item instead of appending it
			let date = new Date();
        	date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
        	const expires = "expires=" + date.toUTCString();
			
			jsvar.splice(dogitem,1)
			let pNewS = JSON.stringify(jsvar)
			let cartNewS = cartS.replace(cartR,pNewS) +"; " + expires + "; path=/"
			//document.cookie = "products=;"
			document.cookie = "products=" +pNewS +";"
			cCount = parseInt(sessionStorage.getItem("cartCount"))
			sessionStorage.setItem("cartCount",cCount - 1)
			updateCartBadge()
			location.reload()
			
		}
		
		imgO.src=jsvar[dogitem][10];
		nameO.textContent = gIco + " " + jsvar[dogitem][1];
		priceO.innerHTML = "$"+jsvar[dogitem][7]
		
		
		attach.appendChild(clone);
		
	}
	function myFunction() {
		console.log(document.cookie)
		sessionStorage.setItem("cartCount", 0);
		
		let date = new Date();
        date.setTime(date.getTime() + (30 * 24 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();

		cartS = document.cookie
		console.log(cartS)
		cartV= cartS.split("; products=")[1].split("=")[0]
		cartI = cartV.lastIndexOf(";")
		cartR = cartV.substring(0,cartI);
		console.log(cartR)
		console.log(cartS.replace("; products="+cartR).replace("undefined",""))
		document.cookie = "products=;"
		document.cookie = cartS.replace("; 	products="+cartR,"").replace("undefined","")+ expires + "; path=/;"
		console.log(document.cookie)
		sessionStorage.setItem("debug",document.cookie)
		
		

		//document.cookie = "products= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
  		//const element = document.getElementById("leftCartdiv");
  		//element.remove();
	}
	/*submit.onclick = () => {
  			restartCartBadge();
	}*/
	//my attemp at clear shopping cart. m
	
		/*submit.onclick = () => {
  			const myNode = document.getElementById("leftCartdiv");
  			myNode.innerHTML = '';
		}*/
		
		//my second attempt at clearing shopping cart, removed elements, but did not allow addition of dogs in cart.
		/*function deleteChild() {
        	var e = document.querySelector("leftCartdiv");
        
			var child = e.lastElementChild; 
			while (child) {
				e.removeChild(child);
				child = e.lastElementChild;
			}
		}
		var btn = document.getElementById(
			submit.onclick = function() {
				deleteChild();
    	}*/
	if (subtotal > 0){
		let tax = subtotal * .0825;
		let shipping = 7;
		let total = subtotal + shipping + tax;
		document.getElementById("subtotal").innerHTML = "$" + subtotal.toFixed(2);	
		document.getElementById("tax").innerHTML = "$" + tax.toFixed(2);	
		document.getElementById("shipping").innerHTML = "$" + shipping.toFixed(2);	
		document.getElementById("total").innerHTML = "$" + total.toFixed(2);	

	}
	else {
		document.getElementById("subtotal").innerHTML = "$0.00";	
		document.getElementById("tax").innerHTML = "$0.00";	
		document.getElementById("shipping").innerHTML = "$0.00";	
		document.getElementById("total").innerHTML = "$0.00";	

	}
    document.cookie="total=" + document.getElementById("total").innerHTML ;
</script>
<script>
    //let userid = window.sessionStorage.getItem('userID');
    //let email = window.sessionStorage.getItem('email');
    document.cookie="userid=" + sessionStorage.getItem("userID");
    document.cookie="em=" + sessionStorage.getItem("email");

</script>