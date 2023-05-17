<?php 
session_start(); 
if(!isset($_SESSION["email"])){
	header("login.html");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin Home</title>
	<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $( "#header" ).load( "../files/signedinheader.php" );
	$( "#modifyDogs").load("../files/manageItems.html");
	$( "#couponCreator").load("../files/couponCreator.php")   
	$( "#salesItems").load("../files/salesItems.html")   

   });
</script>
</head>

<body>
	<div id="header"></div>
	<div class="container-fluid">
	<div class="row">
	<div class="d-flex align-items-start">
	  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		<button class="nav-link active" id="v-pills-dogs-tab" data-bs-toggle="pill" data-bs-target="#v-pills-dogs" type="button" role="tab" aria-controls="v-pills-dogs" aria-selected="true">Modify Dogs</button>
		<button class="nav-link" id="v-pills-discounts-tab" data-bs-toggle="pill" data-bs-target="#v-pills-discounts" type="button" role="tab" aria-controls="v-pills-discounts" aria-selected="false">Discount Code</button>
		<button class="nav-link" id="v-pills-sales-tab" data-bs-toggle="pill" data-bs-target="#v-pills-sales" type="button" role="tab" aria-controls="v-pills-sales" aria-selected="false">Sales Items</button>
		<button class="nav-link" id="v-pills-users-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users" type="button" role="tab" aria-controls="v-pills-users" aria-selected="false">Modify Users</button>
		<button class="nav-link" id="v-pills-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-orders" type="button" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</button>
	  </div>
	  <div class="tab-content" id="v-pills-tabContent">
		<div class="tab-pane fade show active" id="v-pills-dogs" role="tabpanel" aria-labelledby="v-pills-dogs-tab"><div id="modifyDogs"></div></div>
		<div class="tab-pane fade" id="v-pills-discounts" role="tabpanel" aria-labelledby="v-pills-discounts-tab"> <div id="couponCreator"></div></div>
		<div class="tab-pane fade" id="v-pills-sales" role="tabpanel" aria-labelledby="v-pills-sales-tab"><div id="salesItems"></div></div>
		<div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab">...</div>
		<div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">...</div>

	  </div>
	</div>
	</div>
	</div>	
	<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
