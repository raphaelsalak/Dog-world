function Search(){
			let sBar = document.getElementById("headerSearch")
			sessionStorage.setItem("Search", JSON.stringify( [["IN", "NAME" , sBar.value]]));
			//console.log(["IN", "NAME" , sBar.value])
			location.reload();
		}
function updateCartBadge(){
	let cartCount = window.sessionStorage.getItem("cartCount");
	if (cartCount > 0 || cartCount != ""){
		document.getElementById("cartBadge").innerHTML = cartCount;
	}
	
	
	
}
function restartCartBadge(){
	let cartCount = window.sessionStorage.getItem("cartCount");
	document.getElementById("cartBadge").innerHTML = 0;
	
	
	
	
}
