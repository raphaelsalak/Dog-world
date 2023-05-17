<?php
 echo "<html>";
?>
<?php
            include("config.php");
            if ($CN->connect_error) {
                die("Connection failed: " . $CN->connect_error);
            }
            $users = array();
            $select = "select * from user";
            $R = $CN->query($select);;

            if ($R->num_rows > 0) {
                // output data of each row
                while($row = $R->fetch_assoc()) {
                    $users[] = $row;
                    //print_r($users);
                }
            }
            else {
                echo "<p>0 results</p>";
            }
            $CN->close();
        ?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div id="uniqueIdRef7846">
<div id="header"></div>

<div class="container-fluid">
<div class="row">
    
<div class="col-sm-6">
<div>
<div class="mt-3"><h3>Edit User Information</h3></div>
<p><small>Disclaimer: Please do not use real emails or passwords. This is a school project.</small></p>
<form action="updateUsers.php" method="post">
	<div class="col-sm-4 mb-3 mt-3">
    	<label for="userID" class="col-form-label">User ID:</label>
    	<input type="text" class="form-control form-control-sm" id="userID"  name="userID" required>
  	</div>
	<div class=" col-sm-4 mb-3 mt-3">
    	<label for="fname" class="col-form-label">First Name:</label>
    	<input type="text" class="form-control form-control-sm" id="fname"  name="firstName">
  	</div>
	<div class=" col-sm-4 mb-3">
    	<label for="lname" class="col-form-label">Last Name:</label>
    	<input type="text" class="form-control form-control-sm" id="lname"  name="lastName">
  	</div>
	<div class=" col-sm-4 mb-3">
    	<label for="mobile" class="col-form-label">Phone Number:</label>
    	<input type="text" class="form-control form-control-sm" id="mobile"  name="mobile">
  	</div>
  	<div class="col-sm-4 mb-3">
   		<label for="email" class="col-form-label">Email:</label>
    	<input type="email" class="form-control form-control-sm" id="email"  name="email">
  	</div>
    <div class="col-sm-4 mb-3">
   		<label for="usertype" class="col-form-label">User Type:</label>
    	<input type="text" class="form-control form-control-sm" id="usertype"  name="usertype">
  	</div>
  	<!--<div class=" col-sm-4 mb-3">
    	<label for="pwd" class="col-form-label">Password:</label>
    	<input type="password" class="form-control form-control-sm" id="pwd"  name="password">
  	</div>
  	<div class=" col-sm-4 mb-3">
    	<label for="pwd2" class="col-form-label">Re-enter Password:</label>
    	<input type="password" class="form-control form-control-sm" id="pwd2" name="password2">
  	</div>-->
	
  	<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
    <div class="col-sm-6" id="rightDiv">
	<h1>All Users</h1>
    <template id="userTemplate">
        <table>
            <tr>
				<td>
				    <tr>
						<td id="line">id first last mobile email type</td>
					</tr>
				</td>
            </tr>
        </table>
    </template>
	</div>
</div>
</div>
</div>
<script>
			
	
	
	
	       var template = document.querySelector("#userTemplate");
	       let jsvar = <?php echo json_encode($users); ?>;
	       console.log(jsvar)
	       
	       var attach = document.querySelector("#rightDiv");
	       for (let useritem = 0; useritem < jsvar.length; useritem++) {
                var clone = template.content.cloneNode(true);
                var l = clone.getElementById("line");           
                l.textContent = jsvar[useritem]['id'] + " " + jsvar[useritem]['firstName'] + " " + jsvar[useritem]['lastName'] + " " + jsvar[useritem]['mobile'] + " " + jsvar[useritem]['email'] + " " + jsvar[useritem]['usertype'];
			   
			   
			   
			    l.onclick = function(){
					var selectors = [
					'#userID','#fname','#lname','#mobile','#email','#usertype'
					]
					var doginfo = [
						jsvar[useritem]['id'],jsvar[useritem]['firstName'],jsvar[useritem]['lastName'],jsvar[useritem]['mobile'],jsvar[useritem]['email'],jsvar[useritem]['usertype']
					]
				
					for(i=0;i<doginfo.length;i++){
						let uRef = document.querySelector( "#uniqueIdRef7846")
						let ele = uRef.querySelector(selectors[i]);
						ele.value = doginfo[i];
						ele.setAttribute("value",doginfo[i])
						console.log(doginfo[i]+"="+ele.value);
					}
					
				}
                attach.appendChild(clone);
	       }
        </script>
<?php
 echo "</body>";
 echo "</html>";
?>