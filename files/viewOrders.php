<html>
<head>
	<style>
		
	</style>
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","dropdown.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>
	<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Sort by</option>
  <option value="1">availability</option>
  <option value="2">total</option>
  <option value="3">customer</option>
  <option value="4">oldest first</option>
  <option value="5">newest first</option>
  </select>
</form>
<br>
<div id="txtHint"><b></b></div>
</body>
</html>