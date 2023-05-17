function loginSession(fname, lname, userType, email) {
	window.sessionStorage.setItem("lname", lname);
	window.sessionStorage.setItem("fname", fname);
	window.sessionStorage.setItem("email", email);
	window.sessionStorage.setItem("userType", userType);

}