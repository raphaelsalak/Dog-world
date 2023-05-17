<?php
	session_start();
    include("config.php"); 
	/*
	if(!isset($_SESSION["email"])){
		header("location: browse.php");
	}
	*/
    if ($CN->connect_error) {
        die("Connection failed: " . $CN->connect_error);
    }

    $select = "select * from dog";
    $R = $CN->query($select);
    $obj = array();

    if ($R->num_rows > 0) {
        // output data of each row
        while($row = $R->fetch_assoc()) {
            $obj[] = $row;
        }
    }
    else {
        echo "0 results";
    }
$CN->close();
?>
<!doctype html>

<script>
  let jsvar = <?php echo json_encode($obj); ?>;
  console.log(jsvar)
</script>

<html>
<head>
<meta charset="utf-8">
<title>Browse Catalog</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $( "#header" ).load( "../files/header.html" );
	var jsvar = <?php echo json_encode($obj); ?>;
  	//console.log(jsvar)
   });
</script>
<style>
	
.gItem{
	background-color: rgba(100, 100, 175, 0.8)
}
.gItem2{
	background-color: #b0d6ba;
	border: 3px solid rgba(0, 0, 0, 0.8);
	padding: 10px;
}
.grid-container {
  background-color: #c6d6c5;
  border: 1px solid #596b5e;
  padding: 10px;
}

 /* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  /*background-color: #111; /* Black*/
	background-color: #FFF; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav p {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  /*color: #818181;*/
	color: #000000;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
  transition: margin-left .5s;
  padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

	
/* Dropdown Button */
.dropbtn {
  background-color: #2BA769;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  border-radius: 2px;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #197E2B;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  /*min-width: 160px;*/
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}
	
#filterContainer {
  float: left;
  /*
  background-color: #c6d6c5;
  border: 1px solid #596b5e;
  */
  padding: 10px;
}
	
#sortContainer {
  float: right;
  /*
  background-color: #c6d6c5;
  border: 1px solid #596b5e;
  */
  padding: 10px;
}
		


/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}
</style>
</head>
<body>
	<div id="header"></div>
<div class="container-fluid">


<h1>Dogs</h1>
<!--<p>Basic Description</p>
<p>This page should allow user to veiw all  items on the website and be able to click on each one to go the item details.<br> a great deal of effort will be spent on making this page look nice</p>
<br><br>
<p> We'll probably want to make the view cart an icon on a topbar or side bar instead of a button</p>
<a href="viewCart.html"><button class="Next">View Cart</button></a> -->

<template id = "checkTemplate" nowrap>
	<nobr>
	<input type="checkbox" id="checkidChangeMe" checked onchange="parseFilter(this)" nowrap>
	 <label for="checkidChangeMe" id="labelidChangeMe" nowrap>Oof</label>
	</nobr>
	<br>
</template>

<template id="Item_Template">
	<div class="col-sm-12 col-md-6 col-lg-4 col-xl-2" >
		<a id ="linkwhenClicked" href="itemDetails.php" style="color:#000000; text-decoration:none;">
			<div class="gItem">
				<div class="gItem2">
					<table>
						<tr>
							<td><div class="thumbnail">
							<img id="imgO" src="" width="100%" height="100%" alt="Pic">
						</div></td>
						</tr><tr>
							<td>
								<tr><td id="iName">Dog</td></tr>
								<tr><td id="iColorBreed">Color Breed</td></tr>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</a>
		</div>
</template>

<br><br>
<div class="container-fluid">
	<div class="row">
		<!--
		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
			<div class="container-fluid">
				<div class="row">
			Side Filter Here
		</div>
		!-->

		<div class="col-sm-12 col-md-10 col-lg-7 col-xl-8">
			<input class="form-control me-2" id="searchBar" type="search" placeholder="Search" aria-label="Search">	
		</div>
		<div class="col-sm-4 col-md-4 col-lg-1 col-xl-1">
			<button id="btnSearch" onclick="MainSearch()" >Search</button>
		</div>
		
		<div class="row">
			<div id="filterContainer" class="col-sm-12 col-xl-5">
				<!-- <div class="dropdown">
  				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
   				Sex
  				</button>
  				<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
					
    				<li><input class="dropdown-item" type="checkbox" id="mFilter" checked onchange="parseFilter(this)"><label for="mFilter">M</label></li>
    				<li><input class="dropdown-item" type="checkbox" id="fFilter" checked onchange="parseFilter(this)">
						<label for="fFilter">F</label></li>
  				</ul>
				</div> -->
				
				 <div class="dropdown">
					<button onclick="dropFunc('sexDropDown')" class="dropbtn">Sex</button>
				  <div id="sexDropDown" class="dropdown-content">

						<nobr>
						<input type="checkbox" id="mFilter" checked onchange="parseFilter(this)">
						<label for="mFilter">M</label>
						</nobr><br>

						<nobr>
						<input type="checkbox" id="fFilter" checked onchange="parseFilter(this)">
						<label for="fFilter">F</label>
						</nobr><br>

				  </div>
				</div> 
				

				<!-- Size !-->
				<div class="dropdown">
					<button onclick="dropFunc('sizeDropDown')" class="dropbtn">Size</button>
				  <div id="sizeDropDown" class="dropdown-content">

						<nobr>
						<input type="checkbox" id="smallFilter" checked onchange="parseFilter(this)">
						<label for="smallFilter">Small</label>
						</nobr><br>

						<nobr>
						<input type="checkbox" id="medFilter" checked onchange="parseFilter(this)">
						<label for="medFilter">Medium</label>
						</nobr><br>

						 <nobr>
						<input type="checkbox" id="largeFilter" checked onchange="parseFilter(this)">
						<label for="largeFilter">Large</label>
						 </nobr><br>

						 <nobr>
						<input type="checkbox" id="nullFilter" checked onchange="parseFilter(this)">
						<label for="nullFilter">null</label>
						 </nobr><br>
	
					</div>
				</div>
				<!-- may want to use the script finder like for sex and the other buttons here !-->

				<div class="dropdown">
					<button onclick="dropFunc('colorDropDown')" class="dropbtn">Color</button>
				  <div id="colorDropDown" class="dropdown-content">
					<!-- JS Insert options here !-->
				  </div>
				</div>

				<div class="dropdown">
					<button onclick="dropFunc('breedDropDown')" class="dropbtn">Breed</button>
				  <div id="breedDropDown" class="dropdown-content">
					<!-- JS Insert options here !-->
				  </div>
				</div>

				<!-- Available !-->
				<div class="dropdown">
					<button onclick="dropFunc('availDropDown')" class="dropbtn">Availability</button>
				  <div id="availDropDown" class="dropdown-content">

						<nobr>
						<input type="checkbox" id="aFilter" checked onchange="parseFilterAvail(this)">
						<label for="aFilter">Available</label>
						</nobr><br>

						<nobr>
						<input type="checkbox" id="naFilter" checked onchange="parseFilterAvail(this)">
						<label for="naFilter">Not Available</label>
						</nobr><br>

				  </div>
				</div>
				<button id="filterReload" onclick="location.reload()">
					Filter</button>
				
			</div>
			<div id="sortContainer" class="col-sm-12 col-xl-4">
				
				<!-- This line breaks if used as any kindof text label !-->
				<table>
				<tr>
				<!--
				<td>
				<div class="sortLabel">
					<p>Sort By</p>
				</div>
				</td>
				!-->
				
				<td>
				<div class="dropdown">
					<button  onclick="dropFunc('sortDropDown')" class="dropbtn"id="sortFieldBtn" 
							>Field</button><br>
				  <div id="sortDropDown" class="dropdown-content">
					<div name="sortContents">
						<button onclick="parseSort(this, 'sortFieldBtn')" >Price</button><br>
						<button onclick="parseSort(this, 'sortFieldBtn')" >Availability</button><br>
						<button onclick="parseSort(this, 'sortFieldBtn')" >Sex</button><br>
						<button onclick="parseSort(this, 'sortFieldBtn')" >Name</button><br>
						<button onclick="parseSort(this, 'sortFieldBtn')" >Breed</button><br>
						<button onclick="parseSort(this, 'sortFieldBtn')" >Quantity</button><br>
					</div>
				  </div>
				</div>
				</td>

				<td>
				<div class="dropdown">
					<button onclick="dropFunc('sortOrderDropDown')" class="dropbtn" id="sortOrderBtn" >Descending</button>
				  <div id="sortOrderDropDown" class="dropdown-content">
					<div name="sortContents">
						<button onclick="parseSort(this, 'sortOrderBtn')" >Descending</button>
						<br>
						<button onclick="parseSort(this, 'sortOrderBtn')" >Ascending</button>
					</div>
				  </div>
				</div>
				</td>

				<td>
				<button id="SortReload" onclick="location.reload()" >Sort</button>
				</td>
				</tr>
				</table>
				
			</div>
			<br>
			<div id="clearContainer" class="col-sm-3 ">
				<button id="clearAllBtn" onclick="clearAll()">
					Clear</button>
			</div>
		</div>
	</div>
</div>
<br>
<!-- function definitions !-->
<script>
	function clearAllFilter(){
		sessionStorage.removeItem('Search');
	}
	function clearAllSort(){
		sessionStorage.removeItem('SortField');
		sessionStorage.removeItem('SortOrder');
	}
	function clearAll() {
		clearAllFilter();clearAllSort();
		location.reload();
	}
	function dropFunc(ID) {
		document.getElementById(ID).classList.toggle("show");
	}
	function parseFilterAvail(ele){
		let txt = ele.parentNode.children[1].textContent

		if (txt == "Available"){
			funcString = "GT"
		}

		if (txt == "Not Available"){
			funcString = "NOT GT"
		}

		if (ele.checked == true){
			clearFilter([funcString,"AVAILABILITY",0])
		}
		else{
			addFilter([funcString,"AVAILABILITY",0])
		}
	}
	function parseFilter(ele){
		//console.log(ele.parentNode.parentNode.id)
		switch(ele.parentNode.parentNode.id){
			case "sexDropDown":
				field = "SEX"
				break;
			case "colorDropDown":
				field = "COLOR"
				break;
			case "breedDropDown":
				field = "BREED"
				break;
			case "sizeDropDown":
				field = "SIZE"
				break;
			//should not be needed
			case "availDropDown":
				field = "AVAILABILITY"
				break;
			default:
				console.log("field not identified\n a spelling error with element IDs perhaps?\n: "+ele.parentNode.parentNode.id)
				console.log(ele.parentNode.parentNode)
				field = "fuck"
		}

		let txt = ele.parentNode.children[1].textContent

		if (ele.checked == true){
			clearFilter(["NOT IS",field,txt])
		}
		else{
			addFilter(["NOT IS",field,txt])
		}
	}
	function parseSort(ele, idS){
		
		document.querySelector("#"+idS).textContent = ele.textContent
		if( idS == "sortFieldBtn"){
			sessionStorage.setItem("SortField",ele.textContent)
		}
		else if( idS == "sortOrderBtn"){
			if(ele.textContent == "Descending"){
				var sOrder = -1
			}
			else if(ele.textContent == "Ascending"){
				var sOrder = 1
			}
			else {
				alert("sort order not recognized: "+ ele.textContent)
			}
			sessionStorage.setItem("SortOrder",sOrder)
		}
	}
	function addFilter(inputAr){
		if (sessionStorage.getItem("Search") != null){
			let s = JSON.parse(sessionStorage.getItem("Search"))
			s.push(inputAr)
			sessionStorage.setItem("Search",JSON.stringify(s))
		}
		else{
			sessionStorage.setItem("Search",JSON.stringify([inputAr]));
		}
	}
	function clearFilter(inputAr){
		if (sessionStorage.getItem("Search") != null){
			stringStorage = sessionStorage.getItem("Search")
			stringStorage = stringStorage.replace(
				","+JSON.stringify(inputAr),"" )
			stringStorage = stringStorage.replace(
				JSON.stringify(inputAr)+",","" )
			count = (stringStorage.split("[").length - 1)
			if (count == 1){
				sessionStorage.removeItem("Search")
			}
			else{
				sessionStorage.setItem("Search",stringStorage)
			}
		}
	}

	function MainSearch(){
		sBar = document.getElementById("searchBar")
		addFilter(["IN", "NAME" , sBar.value])
		//console.log(["IN", "NAME" , sBar.value])
		location.reload();
	}

	function FieldMatch(fMatch,fieldS){
		switch(fMatch){
			case "NAME":
				fVar = fieldS.name.toUpperCase()
				break;
			case "BREED":
				fVar = fieldS.breed.toUpperCase()
				break;
			case "COLOR":
				fVar = fieldS.color.toUpperCase()
				break;
			case "SEX":
				fVar = fieldS.sex.toUpperCase()
				break;
			case "SIZE":
				if (fieldS.size == null){
					fVar = "NULL"
				}
				else{
					fVar = fieldS.size.toUpperCase()
				}
				break;
			case "AVAILABILITY":
				fVar = fieldS.quantity
				break;
			default:
				console.log("Invalid Search Field")
				break;
		}
		return(fVar);
	}

	function FunctionMatch(fVar,fFunc,searchText){
		switch(fFunc){

			case "IS":
				if( fVar == searchText.toUpperCase() ){
					/*console.log("IS Match")
					console.log(fVar +" = " + searchText)*/
					return(true);
					break;
				}
				else {return(false)}
				break;

				case "IN":
				if( fVar.includes(searchText.toUpperCase() ) ){
					/*console.log("IN Match")
					console.log(fVar +" in " + searchText)*/
					return(true);
					break;
				}
				else {return(false)}
				break;

				case "GT":
				if( fVar > searchText ){
					return(true);
					break;
				}
				else {return(false)}
				break;

				case "COUNT":
					break;

				case "NOT IS":
					return( !FunctionMatch(fVar,"IS",searchText) )
					break

				case "NOT IN":
					return( !FunctionMatch(fVar,"IN",searchText) )
					break;

				case "NOT GT":
					return( !FunctionMatch(fVar,"GT",searchText) )
					break;

			default:
				console.log("Invalid Search Code")
				return (false);
				break;

		}
	}

</script>

<!-- grid html JS below will add to it !-->
<div class="container-fluid">
<div class="grid-container" id="gridC">
<div class="row" id="trueRow">		
</div></div></div>

<!-- run time !-->
<script>
try{
	//const jsonObj = JSON.parse(jsonStringData);*/
	//const jsonObj = JSON.parse(jsvar);
	const jsonObj = {"Items":jsvar};
	//var tbody = document.querySelector("#gridC");
	var tbody = document.querySelector("#trueRow");
	var template = document.querySelector('#Item_Template');
	var checkTemplate = document.querySelector('#checkTemplate');
	var colorDrop = document.querySelector('#colorDropDown')
	var breedDrop = document.querySelector('#breedDropDown')
	var isSMatch = true;
	let allColors = [];
	let allBreeds = [];
	let toBeSorted = [];
	
	if(sessionStorage.getItem("Search") == null){
		var searchString = ""
	}
	else{
		var searchString = sessionStorage.getItem("Search")
	}
	

	for (let dogitem = 0; dogitem < jsonObj.Items.length; dogitem++) {

		let c = jsonObj.Items[dogitem].color
		if (!allColors.includes(c.toUpperCase())){
			allColors.push(c.toUpperCase());
			var colorClone = checkTemplate.content.cloneNode(true);
			var lab = colorClone.getElementById("labelidChangeMe")
			var box = colorClone.getElementById("checkidChangeMe")
			lab.textContent = c;
			box.id = "color_box_" + c;
			lab.id = "color_label_" + c;
			lab.for = "color_box_" + c;
			colorClone.id = "color_container_" + c;

			searchQuery = '["NOT IS","COLOR",\"' +c+ '\"]'
			if (searchString.includes(searchQuery)){
				box.checked = false;
			}
			else {
				box.checked = true;
			}
			colorDrop.append(colorClone);
		}

		let b = jsonObj.Items[dogitem].breed
		if (!allBreeds.includes(b.toUpperCase())){

			allBreeds.push(b.toUpperCase());
			var breedClone = checkTemplate.content.cloneNode(true);
			var lab = breedClone.getElementById("labelidChangeMe")
			var box = breedClone.getElementById("checkidChangeMe")
			lab.textContent = b;
			box.id = "breed_box_" + b;
			lab.id = "breed_label_" + b;
			lab.for = "breed_box_" + b
			breedClone.id = "breed_container_" + b;
			
			searchQuery = '["NOT IS","BREED",\"' +b+ '\"]'
			if (searchString.includes(searchQuery)){
				box.checked = false;
			}
			else {
				box.checked = true;
			}
			
			breedDrop.append(breedClone);
		}

		//start filter process			
		if( sessionStorage.getItem("Search")!=null){
			sFilter = JSON.parse(sessionStorage.getItem("Search"))
			for(let i=0 ;i < Object.keys(sFilter).length; i++){
				item = sFilter[i];
				fVar = FieldMatch(item[1],jsonObj.Items[dogitem])
				fFunc = item[0];
				if (!FunctionMatch(fVar,fFunc,item[2])){
					isSMatch = false
				}
			}
		}
			// Clone the new row and insert it into the table
			//Update: is added to array for later sorting
			if( isSMatch){
				toBeSorted.push(jsonObj.Items[dogitem])
			}
			isSMatch = true;
	}
	// do the sort
	var oControl = sessionStorage.getItem("SortOrder")
	var fSortS = sessionStorage.getItem("SortField")
	
	if (oControl == null){
		oControl = -1
	}
	if (oControl == 1){
		document.querySelector('#sortOrderBtn').textContent = "Ascending"
	}
	else if(oControl == -1){
		document.querySelector('#sortOrderBtn').textContent = "Descending"
	}
	
	if (fSortS == null){
		fSortS = "Field" //no sort selected
	}

	document.querySelector('#sortFieldBtn').textContent = fSortS
	switch(fSortS){
		case "Name":
			toBeSorted.sort( (a,b) => (a.name > b.name) ? oControl:-1 * oControl);
			break;
		case "Sex":
			toBeSorted.sort( (a,b) => (a.sex > b.sex) ? oControl:-1 * oControl);
			break;
		case "Availability":
			//toBeSorted.sort( (a,b) => (a.name > b.name) ? oControl:-1 * oControl); 
			//Avilability is the same as sorting by quantity. There will be a difference when sorting by multiple critera as a Tie shouldhave a different prefference, but four our purposes this is fine
		case "Quantity":
			toBeSorted.sort( (a,b) => ( parseInt(a.quantity) > parseInt(b.quantity)) ? oControl:-1 * oControl);
			break;
		case "Breed":
			toBeSorted.sort( (a,b) => (a.breed > b.breed) ? oControl:-1 * oControl);
			break;
		case "Price":
			//Unless otherwise captured, this will compare strings which will not be the same as actually comparing costs
			toBeSorted.sort( (a,b) => ( parseFloat(a.price.replace("$","")) > parseFloat(b.price.replace("$","")) ) ? oControl:-1 * oControl); break;
		case "Field":
			console.log("no sort is selected")
			break;
		default:
			alert("Sort Field not recognized" + fSortS)
	}

	//Add dogs to grid
	for (let dogitem = 0; dogitem < toBeSorted.length; dogitem++)
	{
		var clone = template.content.cloneNode(true);
		var imgO = clone.getElementById("imgO");
		var nameO = clone.getElementById("iName");
		var cb = clone.getElementById("iColorBreed");
		var lk = clone.getElementById("linkwhenClicked")
		var gIco = ""
		if(toBeSorted[dogitem].sex == "M"){
			gIco = "♂"
		}
		else if(toBeSorted[dogitem].sex == "F"){
			//console.log(toBeSorted[dogitem].sex + " = F")
			gIco = "♀"
		}
		else {console.log("Oh no. Nope. I'm not handling this edge case. You do you and all, but I'm out")}

		imgO.src=toBeSorted[dogitem].image_path;
		nameO.textContent = gIco + " " + toBeSorted[dogitem].name;
		cb.textContent = toBeSorted[dogitem].color +" " + toBeSorted[dogitem].breed;
		lk.onclick = function(){
			sessionStorage.setItem("currentDog", toBeSorted[dogitem].id);
			document.cookie="currentDoginPHP=" + sessionStorage.getItem("currentDog");
		}
		tbody.appendChild(clone);
	}

	//sessionStorage.removeItem("Search")
}catch(e) {alert(e);}
</script>


</div>

</body>
</html>


