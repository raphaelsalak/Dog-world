function autofill(){
	if (sessionStorage.getItem("cDog") != null){
		console.log("yes")
		
		//let cDog = JSON.parse("["+sessionStorage.getItem("cDog")+"]")
		let cDog = sessionStorage.getItem("cDog").split(",");
		var selectors = [
		'#name','#userID','#breed','#sex','#color','#birthDt','#summary','#price','#discount','#quantity','#slug','#image_path','#size','#oldname'
		]
		var doginfo = [
			cDog[1],"?",cDog[2],cDog[3],cDog[4],cDog[5],cDog[6],cDog[7],"?",cDog[8],"?",cDog[10],cDog[11],cDog[1]
		]
		for(i=0;i<doginfo.length;i++){
			ele = document.querySelector(selectors[i]);
			ele.value = doginfo[i];
			ele.setAttribute("value",doginfo[i])
			console.log(doginfo[i]+"="+ele.value);
		}		

		//sessionStorage.removeItem("cDog");
		fA = document.querySelector('#FormA')
		console.log(fA.action);
		fA.action = "updateItems.php"
	}
	else{console.log("No")}
}// JavaScript Document